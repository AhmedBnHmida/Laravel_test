<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;

class Calendar extends Component
{
    public $propertyId;
    public $events = [];

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $bookings = Booking::where('property_id', $this->propertyId)
            ->where('status', 'confirmed')
            ->get();

        $this->events = $bookings->map(function ($booking) {
            return [
                'title' => 'Réservé',
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => '#ff4444',
                'allDay' => true
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}