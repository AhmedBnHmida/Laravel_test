@extends('layouts.app')

@section('title', 'Accueil - InnovQube Reservations')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                Trouvez votre 
                <span class="text-primary">havre de paix</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Découvrez nos propriétés exceptionnelles et réservez votre séjour en toute simplicité.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button variant="primary" href="{{ route('properties.index') }}">
                    Explorer les propriétés
                </x-button>
                @auth
                    <x-button variant="outline" href="{{ route('dashboard') }}">
                        Mon tableau de bord
                    </x-button>
                @else
                    <x-button variant="secondary" href="{{ route('register') }}">
                        Créer un compte
                    </x-button>
                @endauth
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">🔍</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Recherche facile</h3>
                <p class="text-gray-600">Trouvez la propriété parfaite en quelques clics</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">⚡</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Réservation instantanée</h3>
                <p class="text-gray-600">Réservez en temps réel sans attente</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">🛡️</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Paiement sécurisé</h3>
                <p class="text-gray-600">Transactions 100% sécurisées</p>
            </div>
        </div>

        <!-- Properties Preview -->
        @if($properties->count() > 0)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8">Nos propriétés populaires</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties->take(3) as $property)
                    <x-property-card :property="$property">
                        <x-button variant="primary" size="sm" href="{{ route('properties.index') }}">
                            Voir plus
                        </x-button>
                    </x-property-card>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@php
    // Récupérer les propriétés pour la préview
    $properties = App\Models\Property::where('is_available', true)->get();
@endphp