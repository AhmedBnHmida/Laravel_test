<div>
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8">Propriétés</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        @foreach($properties as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="block">
                <div class="bg-white rounded-lg md:rounded-xl shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-200 overflow-hidden group transform hover:-translate-y-1">
                    <!-- Image avec ratio fixe -->
                    <div class="relative pt-[60%] bg-gray-200 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                            <span class="text-4xl md:text-5xl text-white opacity-90">🏠</span>
                        </div>
                        <!-- Badge prix -->
                        <div class="absolute top-3 right-3">
                            <span class="bg-white text-blue-700 px-2 py-1 rounded-full text-sm font-bold shadow-lg">
                                {{ $property->price_per_night }} €/nuit
                            </span>
                        </div>
                    </div>
                    
                    <!-- Contenu -->
                    <div class="p-4 md:p-5">
                        <h3 class="text-base md:text-lg font-bold mb-2 text-gray-800 line-clamp-2 leading-tight">
                            {{ $property->name }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2 leading-relaxed">
                            {{ Str::limit($property->description, 80) }}
                        </p>
                        
                        <!-- Informations supplémentaires -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $property->bookings_count ?? 0 }} rés.
                            </span>
                            <span>{{ $property->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if($properties->count() === 0)
        <div class="text-center py-8 md:py-12">
            <div class="w-16 h-16 md:w-24 md:h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                <span class="text-2xl md:text-4xl">🏠</span>
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-gray-600 mb-2">Aucune propriété disponible</h3>
            <p class="text-gray-500 text-sm md:text-base">Revenez plus tard pour découvrir nos nouvelles propriétés</p>
        </div>
    @endif
</div>