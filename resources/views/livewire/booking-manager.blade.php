<div>
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Propriétés</h2>

    <div class="grid grid-cols-3 gap-6">
        @foreach($properties as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="block">
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer border border-gray-200 overflow-hidden group">
                <img src="{{ asset('images/default-property.jpg') }}"
                    alt="Property Image"
                    class="w-full h-40 object-cover bg-gray-200">
                <div class="p-5 flex flex-col h-40 justify-between">
                    <div>
                        <h3 class="text-lg font-bold mb-1 text-gray-800 truncate">{{ $property->name }}</h3>
                        <p class="text-gray-500 text-sm mb-2 truncate">{{ Str::limit($property->description, 60) }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-blue-700 font-bold text-lg">${{ $property->price_per_night }}</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    @if($properties->count() === 0)
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-4xl">🏠</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Aucune propriété disponible</h3>
            <p class="text-gray-500">Revenez plus tard pour découvrir nos nouvelles propriétés</p>
        </div>
    @endif
</div>
