<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes Réservations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Mes Réservations</h1>
                        <a href="{{ route('properties.index') }}" 
                           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Voir les propriétés
                        </a>
                    </div>

                    @if($bookings->count() > 0)
                        <!-- Bookings -->
                        <div class="space-y-4">
                            @foreach($bookings as $booking)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                                        <!-- Property Info -->
                                        <div class="flex items-center space-x-4 mb-4 md:mb-0">
                                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-600 rounded-lg flex items-center justify-center">
                                                <span class="text-2xl text-white">🏠</span>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-lg">{{ $booking->property->name }}</h3>
                                                <p class="text-gray-600 text-sm">
                                                    {{ $booking->start_date->format('d/m/Y') }} - {{ $booking->end_date->format('d/m/Y') }}
                                                </p>
                                                <p class="text-gray-500 text-sm">
                                                    {{ $booking->start_date->diffInDays($booking->end_date) }} nuits
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Booking Details -->
                                        <div class="flex flex-col md:items-end space-y-2">
                                            <div class="text-right">
                                                <p class="text-2xl font-bold text-primary">{{ $booking->total_price }} €</p>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                                    @if($booking->status === 'confirmed') bg-green-100 text-green-800
                                                    @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                                    @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @else bg-gray-100 text-gray-800 @endif">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </div>
                                            
                                            <div class="flex space-x-2">
                                                <a href="{{ route('bookings.show', $booking->id) }}" 
                                                   class="text-primary hover:text-blue-700 font-medium text-sm">
                                                    Voir détails
                                                </a>

                                                @if(in_array($booking->status, ['pending', 'confirmed']))
                                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" class="inline" id="cancel-form-{{ $booking->id }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="button" 
                                                                onclick="confirmCancellation('{{ $booking->id }}')"
                                                                class="text-red-600 hover:text-red-800 font-medium text-sm">
                                                            Annuler
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{-- {{ $bookings->links() }} --}}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl">📅</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucune réservation</h3>
                            <p class="text-gray-600 mb-6">Vous n'avez pas encore fait de réservation.</p>
                            <a href="{{ route('properties.index') }}" 
                               class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                Explorer les propriétés
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmCancellation(bookingId) {
            if (confirm('Êtes-vous sûr de vouloir annuler cette réservation ? Cette action est irréversible.')) {
                document.getElementById('cancel-form-' + bookingId).submit();
            }
        }
    </script>
    @endpush
</x-app-layout>
