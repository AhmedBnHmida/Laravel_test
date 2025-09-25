<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $property->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Bouton retour -->
                    <div class="mb-6">
                        <a href="{{ route('properties.index') }}" class="inline-flex items-center text-primary hover:text-blue-700 transition duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour aux propriétés
                        </a>
                    </div>

                    <!-- Image header -->
                    <div class="relative h-64 bg-gradient-to-br from-blue-400 to-purple-600 rounded-lg mb-6 overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-8xl text-white opacity-90">🏠</span>
                        </div>
                        <div class="absolute bottom-4 left-6">
                            <span class="bg-white text-primary px-4 py-2 rounded-full text-lg font-bold shadow-lg">
                                {{ $property->price_per_night }} €/nuit
                            </span>
                        </div>
                    </div>

                    <!-- Grille principale -->
                    <div class="grid lg:grid-cols-3 gap-8">
                        <!-- Colonne gauche - Informations -->
                        <div class="lg:col-span-2">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $property->name }}</h1>
                            <p class="text-gray-600 text-lg leading-relaxed mb-6">{{ $property->description }}</p>

                            <!-- Statistiques -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                            <span class="text-2xl text-primary">💰</span>
                                        </div>
                                        <div>
                                            <p class="text-2xl font-bold text-gray-900">{{ $property->price_per_night }} €</p>
                                            <p class="text-sm text-gray-500">Prix par nuit</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-green-500 bg-opacity-10 rounded-full flex items-center justify-center">
                                            <span class="text-2xl text-green-500">📅</span>
                                        </div>
                                        <div>
                                            <p class="text-2xl font-bold text-gray-900">{{ $property->bookings->count() }}</p>
                                            <p class="text-sm text-gray-500">Réservations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Disponibilité -->
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-green-800 font-medium">Propriété disponible pour réservation</span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-4">
                                <a href="{{ route('properties.index') }}" 
                                   class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                    Réserver maintenant
                                </a>
                                <button class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition duration-200 font-semibold">
                                    Contacter le propriétaire
                                </button>
                            </div>
                        </div>

                        <!-- Colonne droite - Réservation -->
                        <div class="lg:col-span-1">
                            <div class="bg-gray-50 rounded-lg p-6 sticky top-4">
                                <h3 class="text-xl font-semibold mb-4">Réservation rapide</h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Dates de séjour</label>
                                        <div class="grid grid-cols-2 gap-2">
                                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                        </div>
                                    </div>

                                    <div class="border-t pt-4">
                                        <div class="flex justify-between text-sm mb-2">
                                            <span>{{ $property->price_per_night }} € x 2 nuits</span>
                                            <span>{{ $property->price_per_night * 2 }} €</span>
                                        </div>
                                        <div class="flex justify-between text-sm mb-2">
                                            <span>Frais de service</span>
                                            <span>Gratuit</span>
                                        </div>
                                        <div class="flex justify-between font-semibold border-t pt-2">
                                            <span>Total</span>
                                            <span class="text-primary">{{ $property->price_per_night * 2 }} €</span>
                                        </div>
                                    </div>

                                    <button class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                        Vérifier la disponibilité
                                    </button>

                                    <p class="text-xs text-gray-500 text-center">
                                        Aucun frais de réservation • Annulation gratuite sous 24h
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Propriétés similaires -->
                    @if($similarProperties->count() > 0)
                    <div class="mt-12 border-t pt-8">
                        <h3 class="text-2xl font-bold mb-6">Propriétés similaires</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($similarProperties as $similar)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300">
                                <div class="h-40 bg-gradient-to-br from-blue-400 to-purple-600 relative">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-4xl text-white opacity-80">🏠</span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm">{{ Str::limit($similar->name, 40) }}</h4>
                                    <p class="text-primary font-bold text-lg mb-2">{{ $similar->price_per_night }} €/nuit</p>
                                    <a href="{{ route('properties.show', $similar->id) }}" 
                                       class="text-primary text-sm font-medium hover:underline inline-flex items-center">
                                        Voir détails
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>