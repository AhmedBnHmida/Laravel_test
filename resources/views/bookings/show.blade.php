<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Confirmation de réservation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900">Réservation confirmée!</h1>
                        <p class="text-gray-600">Votre réservation a été créée avec succès.</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-semibold mb-2">Détails de la réservation</h3>
                            <p><strong>Propriété:</strong> {{ $booking->property->name }}</p>
                            <p><strong>Dates:</strong> {{ $booking->start_date->format('d/m/Y') }} - {{ $booking->end_date->format('d/m/Y') }}</p>
                            <p><strong>Nuits:</strong> {{ $booking->start_date->diffInDays($booking->end_date) }}</p>
                            <p><strong>Prix total:</strong> {{ $booking->total_price }} €</p>
                            <p><strong>Statut:</strong> <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm">{{ $booking->status }}</span></p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-semibold mb-2">Prochaines étapes</h3>
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Confirmation par email
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Paiement sécurisé
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('properties.show', $booking->property_id) }}" 
                           class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Voir la propriété
                        </a>
                        <a href="{{ route('dashboard') }}" 
                           class="border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition duration-200">
                            Tableau de bord
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>