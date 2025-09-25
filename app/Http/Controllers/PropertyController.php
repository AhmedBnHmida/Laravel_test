<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    public function show($id)
    {
        $property = Property::with('bookings')->findOrFail($id);

        // Collect all booked date ranges for confirmed bookings only
        $unavailableDates = [];
        $events = []; // Initialize events array

        foreach ($property->bookings as $booking) {
            // Only consider confirmed or pending bookings for availability
            if ($booking->status === 'confirmed') {
                try {
                    $period = \Carbon\CarbonPeriod::create($booking->start_date, $booking->end_date);
                    foreach ($period as $date) {
                        $unavailableDates[] = $date->format('Y-m-d');
                    }

                    // Add to events array for calendar
                    $events[] = [
                        'title' => 'Réservé',
                        'start' => $booking->start_date,
                        'end' => Carbon::parse($booking->end_date)->addDay()->format('Y-m-d'), // Add one day for FullCalendar
                        'color' => '#ff4444',
                        'allDay' => true
                    ];
                } catch (\Exception $e) {
                    // Log error but continue
                    Log::error('Error creating period for booking: ' . $booking->id);
                }
            }

        }

        // Propriétés similaires
        $similarProperties = Property::where('id', '!=', $id)
            ->whereBetween('price_per_night', [
                $property->price_per_night * 0.7,
                $property->price_per_night * 1.3
            ])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        if ($similarProperties->count() < 3) {
            $additionalProperties = Property::where('id', '!=', $id)
                ->whereNotIn('id', $similarProperties->pluck('id'))
                ->inRandomOrder()
                ->limit(3 - $similarProperties->count())
                ->get();
            
            $similarProperties = $similarProperties->merge($additionalProperties);
        }

        return view('properties.show', compact('property', 'similarProperties', 'unavailableDates', 'events'));
    }

    public function createReservation(Request $request, $propertyId)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $property = Property::findOrFail($propertyId);

        // Check availability
        if (!$property->availableForDates($request->start_date, $request->end_date)) {
            return back()->withErrors(['dates' => 'Ces dates ne sont pas disponibles.'])->withInput();
        }

        // Calculate total price
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $nights = $start->diffInDays($end);
        $totalPrice = $nights * $property->price_per_night;

        // Create booking
        $booking = Booking::create([
            'property_id' => $property->id,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.show', $booking->id)
            ->with('success', 'Réservation créée avec succès!');
    }

    public function checkAvailability(Request $request, $propertyId)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $property = Property::findOrFail($propertyId);
        
        $available = $property->availableForDates($request->start_date, $request->end_date);
        
        if ($available) {
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);
            $nights = $start->diffInDays($end);
            $totalPrice = $nights * $property->price_per_night;

            return response()->json([
                'available' => true,
                'nights' => $nights,
                'total_price' => $totalPrice,
                'price_per_night' => $property->price_per_night
            ]);
        }

        return response()->json(['available' => false]);
    }
}