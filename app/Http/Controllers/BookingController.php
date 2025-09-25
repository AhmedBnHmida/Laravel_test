<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Get all bookings for the authenticated user with property details
        $bookings = Booking::with('property')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with('property')->findOrFail($id);
        
        // Ensure the user can only see their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('bookings.show', compact('booking'));
    }

    public function cancel(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        // Authorization check
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Only allow cancellation for pending or confirmed bookings
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return redirect()->back()->with('error', 'Cette réservation ne peut pas être annulée.');
        }

        // Update booking status to cancelled
        $booking->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Réservation annulée avec succès.');
    }
}