<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;

class BookingManager extends Component
{
    public $properties;

    public function mount()
    {
        $this->properties = Property::all();
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}