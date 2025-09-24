@props(['property'])

<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
    <div class="h-48 bg-gradient-to-r from-primary to-secondary"></div>
    
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $property->name }}</h3>
        <p class="text-gray-600 mb-4 line-clamp-2">{{ $property->description }}</p>
        
        <div class="flex items-center justify-between mb-4">
            <span class="text-2xl font-bold text-primary">{{ $property->price_per_night }} €/nuit</span>
            <div class="flex items-center space-x-2">
                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-sm">
                    👥 {{ $property->guests_count }}
                </span>
                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-sm">
                    🛏️ {{ $property->bedrooms }}
                </span>
                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-sm">
                    🚿 {{ $property->bathrooms }}
                </span>
            </div>
        </div>
        
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">{{ $property->address }}</span>
            {{ $slot }}
        </div>
    </div>
</div>