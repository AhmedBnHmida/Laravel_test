<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function show($id)
    {
        $property = Property::with('bookings')->findOrFail($id);
        
        // Propriétés similaires (même gamme de prix)
        $similarProperties = Property::where('id', '!=', $id)
            ->whereBetween('price_per_night', [
                $property->price_per_night * 0.7,
                $property->price_per_night * 1.3
            ])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        // Si pas assez de propriétés similaires, prendre d'autres propriétés
        if ($similarProperties->count() < 3) {
            $additionalProperties = Property::where('id', '!=', $id)
                ->whereNotIn('id', $similarProperties->pluck('id'))
                ->inRandomOrder()
                ->limit(3 - $similarProperties->count())
                ->get();
            
            $similarProperties = $similarProperties->merge($additionalProperties);
        }

        return view('properties.show', compact('property', 'similarProperties'));
    }
}