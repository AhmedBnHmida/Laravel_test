<div>
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Propriétés disponibles</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($properties as $property)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-primary mb-2">{{ $property->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($property->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-secondary">{{ $property->price_per_night }} €/nuit</span>
                        <button class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                            Voir détails
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($properties->count() === 0)
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">Aucune propriété disponible pour le moment.</p>
        </div>
    @endif
</div>