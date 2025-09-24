@extends('layouts.app')

@section('title', 'Propriétés - InnovQube Reservations')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Nos propriétés</h1>
            <p class="text-gray-600">Découvrez notre sélection de propriétés exceptionnelles</p>
        </div>

        <!-- Livewire Component -->
        @livewire('booking-manager')
    </div>
</div>
@endsection