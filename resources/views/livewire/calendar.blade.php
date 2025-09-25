<div wire:ignore>
    <div id="calendar"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        const calendarEl = document.getElementById('calendar');
        
        if (calendarEl) {
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek'
                },
                events: JSON.parse('{{ json_encode($events) }}'.replace(/&quot;/g, '"')),
                eventDisplay: 'background',
                eventColor: '#ff4444',
                height: 'auto'
            });

            calendar.render();
        }
    });
</script>
@endpush