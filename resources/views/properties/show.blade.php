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
<div class="relative h-64 rounded-lg mb-6 overflow-hidden">
    <img src="{{ asset('images/default-property.jpg') }}" 
         alt="{{ $property->name }}" 
         class="w-full h-full object-cover"
         onerror="this.style.display='none'; this.parentElement.classList.add('bg-gradient-to-br', 'from-blue-400', 'to-purple-600');">
    
    <!-- Fallback content if image fails to load -->
    <div class="absolute inset-0 flex items-center justify-center" style="display: none;">
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
                                <a href="#reservation-form" 
                                   class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                    Réserver maintenant
                                </a>
                                <button class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition duration-200 font-semibold">
                                    Contacter le propriétaire
                                </button>
                            </div>
                            <div class="border rounded-lg p-4 mb-4">
                                
                            <!-- Special Offer -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-4 mb-4">
                                <div class="flex items-center mb-2">
                                    <span class="text-blue-500 text-lg mr-2">⭐</span>
                                    <span class="font-semibold text-blue-800">Meilleur prix garanti</span>
                                </div>
                                <p class="text-sm text-blue-700">
                                    Trouvez moins cher? Nous ajustons le prix + 10% de réduction!
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-3 text-center">
                                
                                <div class="text-xs">
                                    <div class="text-lg">💳</div>
                                    <div>Paiement sécurisé</div>
                                </div>
                                <div class="text-xs">
                                    <div class="text-lg">🛡️</div>
                                    <div>Garantie annulation</div>
                                </div>
                                <div class="text-xs">
                                    <div class="text-lg">👨‍💼</div>
                                    <div>Propriétaire vérifié</div>
                                </div>
                                <div class="text-xs">
                                    <div class="text-lg">⭐</div>
                                    <div>4.8/5 avis</div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer reviews -->
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                            <h3 class="text-lg font-semibold mb-4">Avis des clients ⭐ 4.8/5</h3>
                            <div class="space-y-4">
                                <!-- Review 1 -->
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('images/customer1.jpg') }}" alt="Jean Dupont" class="w-full h-full object-cover" onerror="this.style.display='none'; this.parentElement.innerHTML='👤';">
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="font-semibold text-gray-900">Jean Dupont</p>
                                            <span class="text-xs text-gray-500">Août 2024</span>
                                        </div>
                                        <div class="flex items-center mb-1">
                                            <span class="text-yellow-400 text-sm">★★★★★</span>
                                        </div>
                                        <p class="text-sm text-gray-600">"Superbe propriété, très propre et bien située. Nous avons passé un excellent séjour!"</p>
                                    </div>
                                </div>
                                
                                <!-- Review 2 -->
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('images/customer2.jpg') }}" alt="Marie Lambert" class="w-full h-full object-cover" onerror="this.style.display='none'; this.parentElement.innerHTML='👤';">
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="font-semibold text-gray-900">Marie Lambert</p>
                                            <span class="text-xs text-gray-500">Juillet 2024</span>
                                        </div>
                                        <div class="flex items-center mb-1">
                                            <span class="text-yellow-400 text-sm">★★★★☆</span>
                                        </div>
                                        <p class="text-sm text-gray-600">"La piscine était incroyable et la villa très spacieuse. Parfait pour nos vacances en famille!"</p>
                                    </div>
                                </div>
                                
                                <!-- Review 3 -->
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('images/customer3.jpg') }}" alt="Pierre Moreau" class="w-full h-full object-cover" onerror="this.style.display='none'; this.parentElement.innerHTML='👤';">
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="font-semibold text-gray-900">Pierre Moreau</p>
                                            <span class="text-xs text-gray-500">Juin 2024</span>
                                        </div>
                                        <div class="flex items-center mb-1">
                                            <span class="text-yellow-400 text-sm">★★★★★</span>
                                        </div>
                                        <p class="text-sm text-gray-600">"Cadre magnifique, propriétaire très accueillant. Nous reviendrons certainement l'année prochaine!"</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- View all reviews link -->
                            <div class="text-center mt-4">
                                <a href="#" class="text-primary text-sm font-medium hover:underline">Voir tous les avis (12)</a>
                            </div>
                        </div>
                        </div>

                        <!-- Colonne droite - Réservation -->
                    <div class="lg:col-span-1">
                            <!-- Calendrier compact -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold mb-3">Calendrier des disponibilités</h3>
        <div wire:ignore id="compact-calendar" class="compact-calendar"></div>
        <div class="mt-3 flex items-center justify-center space-x-4 text-xs">
            <div class="flex items-center space-x-1">
                <div class="w-3 h-3 bg-white border border-gray-300 rounded"></div>
                <span>Disponible</span>
            </div>
            <div class="flex items-center space-x-1">
                <div class="w-3 h-3 bg-red-100 border border-red-300 rounded"></div>
                <span>Réservé</span>
            </div>
        </div>
    </div>

                            <!-- Formulaire de réservation -->
                            <div id="reservation-form" class="bg-gray-50 rounded-lg p-6 sticky top-4">
                                <h3 class="text-xl font-semibold mb-4">Réservation rapide</h3>
                                
                                <form id="booking-form" action="{{ route('properties.reserve', $property->id) }}" method="POST">
                                    @csrf
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Dates de séjour</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <input type="date" name="start_date" id="start_date" 
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                                                <input type="date" name="end_date" id="end_date" 
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                                            </div>
                                            @error('dates')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Résumé du prix -->
                                        <div class="border-t pt-4">
                                            <div class="flex justify-between text-sm mb-2">
                                                <span id="price-label">{{ $property->price_per_night }} € x <span id="nights">0</span> nuits</span>
                                                <span id="subtotal">0 €</span>
                                            </div>
                                            <div class="flex justify-between text-sm mb-2">
                                                <span>Frais de service</span>
                                                <span>Gratuit</span>
                                            </div>
                                            <div class="flex justify-between font-semibold border-t pt-2">
                                                <span>Total</span>
                                                <span id="total-price" class="text-primary">0 €</span>
                                            </div>
                                        </div>

                                        <button type="submit" 
                                                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                            Réserver maintenant
                                        </button>

                                        <button type="button" id="check-availability" 
                                                class="w-full border border-primary text-primary py-3 rounded-lg hover:bg-primary hover:text-white transition duration-200 font-semibold">
                                            Vérifier la disponibilité
                                        </button>

                                        <p class="text-xs text-gray-500 text-center">
                                            Aucun frais de réservation • Annulation gratuite sous 24h
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Propriétés similaires -->
                    <!-- Propriétés similaires -->
                    @if($similarProperties->count() > 0)
                    <div class="mt-12 border-t pt-8">
                        <h3 class="text-2xl font-bold mb-6">Propriétés similaires</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($similarProperties as $similar)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300">
                                <div class="h-40 relative">
                                    <img src="{{ asset('images/default-property.jpg') }}" 
                                        alt="{{ $similar->name }}" 
                                        class="w-full h-full object-cover"
                                        onerror="this.style.display='none'; this.parentElement.classList.add('bg-gradient-to-br', 'from-blue-400', 'to-purple-600');">
                                    <div class="absolute inset-0 flex items-center justify-center" style="display: none;">
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

    @push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/fr.js"></script>

<style>
    .compact-calendar {
        font-size: 0.75rem;
        line-height: 1.2;
    }
    
    .compact-calendar .fc-header-toolbar {
        margin-bottom: 0.5rem !important;
        padding: 0.5rem;
    }
    
    .compact-calendar .fc-toolbar-title {
        font-size: 0.9rem !important;
        font-weight: 600;
    }
    
    .compact-calendar .fc-button {
        padding: 0.25rem 0.5rem !important;
        font-size: 0.7rem !important;
    }
    
    .compact-calendar .fc-col-header-cell {
        font-size: 0.7rem !important;
        padding: 0.25rem !important;
        font-weight: 600;
    }
    
    .compact-calendar .fc-daygrid-day {
        padding: 0.1rem !important;
        height: 2rem !important;
    }
    
    .compact-calendar .fc-daygrid-day-number {
        font-size: 0.7rem !important;
        padding: 0.1rem !important;
    }
    
    .compact-calendar .fc-day-today {
        background-color: #dbeafe !important;
    }
    
    /* Couleurs pour les dates réservées */
    .fc-event-reserved {
        background-color: #fecaca !important;
        border-color: #f87171 !important;
        color: #dc2626 !important;
    }
    
    .fc-event-available {
        background-color: #d1fae5 !important;
        border-color: #34d399 !important;
        color: #065f46 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('=== COMPACT CALENDAR INITIALIZATION ===');
        
        
        console.log('Debug: Starting script execution');
        const unavailableDates = <?php echo json_encode($unavailableDates ?? []); ?>;
        console.log('unavailableDates:', unavailableDates);

        const pricePerNight = <?php echo json_encode($property->price_per_night ?? 0); ?>;
        console.log('pricePerNight:', pricePerNight);

        const events = <?php echo json_encode($events ?? []); ?>;
        console.log('events:', events);

        console.log('Unavailable dates:', unavailableDates);
        console.log('Events:', events);

        // Initialize Compact Calendar
        try {
            const calendarEl = document.getElementById('compact-calendar');
            console.log('Calendar element:', calendarEl);

            if (!calendarEl) {
                console.error('Calendar element not found!');
                return;
            }

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                events: events,
                eventDisplay: 'background',
                eventColor: '#f87171',
                eventBackgroundColor: '#fecaca',
                eventBorderColor: '#f87171',
                height: 'auto',
                aspectRatio: 1.2,
                dayMaxEvents: true,
                showNonCurrentDates: false,
                fixedWeekCount: false,
                dayCellContent: function(info) {
                    // Rendre les chiffres plus petits
                    info.dayNumberText = info.dayNumberText.replace('Â', '');
                    return { html: '<div class="fc-daygrid-day-number">' + info.dayNumberText + '</div>' };
                },
                dateClick: function(info) {
                    console.log('Date clicked:', info.dateStr);
                    // Mettre à jour le formulaire quand on clique sur une date
                    const today = new Date();
                    const clickedDate = new Date(info.dateStr);
                    
                    if (clickedDate >= today) {
                        document.getElementById('start_date').value = info.dateStr;
                        // Définir la date de fin par défaut (1 nuit)
                        const endDate = new Date(clickedDate);
                        endDate.setDate(endDate.getDate() + 1);
                        document.getElementById('end_date').value = endDate.toISOString().split('T')[0];
                        
                        updatePriceCalculation(clickedDate, endDate);
                    }
                },
                eventDidMount: function(info) {
                    // Style personnalisé pour les événements
                    if (info.event.title === 'Réservé') {
                        info.el.style.backgroundColor = '#fecaca';
                        info.el.style.borderColor = '#f87171';
                        info.el.style.color = '#dc2626';
                        info.el.style.fontSize = '0.6rem';
                        info.el.style.padding = '0px 2px';
                    }
                }
            });

            calendar.render();
            console.log('Compact Calendar rendered successfully');

        } catch (error) {
            console.error('Error initializing Compact Calendar:', error);
        }

        // Reste du code JavaScript pour le formulaire...
        document.getElementById('start_date').addEventListener('change', updatePrices);
        document.getElementById('end_date').addEventListener('change', updatePrices);
        document.getElementById('check-availability').addEventListener('click', checkAvailability);

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('start_date').min = today;
        document.getElementById('end_date').min = today;

        function updatePrices() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            
            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                
                if (end > start) {
                    updatePriceCalculation(start, end);
                }
            }
        }

        function updatePriceCalculation(start, end) {
            const nights = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
            const subtotal = nights * pricePerNight;
            
            document.getElementById('nights').textContent = nights;
            document.getElementById('subtotal').textContent = subtotal.toFixed(2) + ' €';
            document.getElementById('total-price').textContent = subtotal.toFixed(2) + ' €';
            document.getElementById('price-label').textContent = pricePerNight + ' € x ' + nights + ' nuits';
        }

        function checkAvailability() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            
            if (!startDate || !endDate) {
                alert('Veuillez sélectionner des dates');
                return;
            }

            const start = new Date(startDate);
            const end = new Date(endDate);
            const today = new Date();
            
            if (start < today.setHours(0, 0, 0, 0)) {
                alert('❌ La date de début ne peut pas être dans le passé');
                return;
            }
            
            if (end <= start) {
                alert('❌ La date de fin doit être après la date de début');
                return;
            }

            fetch('{{ route("properties.check-availability", $property->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    start_date: startDate,
                    end_date: endDate
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.available) {
                    alert('✅ Ces dates sont disponibles! Prix total: ' + data.total_price + ' €');
                } else {
                    alert('❌ Ces dates ne sont pas disponibles. Veuillez choisir d\'autres dates.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erreur lors de la vérification de disponibilité');
            });
        }

        console.log('=== COMPACT CALENDAR INITIALIZATION COMPLETE ===');
    });
</script>
@endpush
</x-app-layout>