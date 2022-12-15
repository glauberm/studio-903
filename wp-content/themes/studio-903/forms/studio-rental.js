import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import ptBrLocale from '@fullcalendar/core/locales/pt-br';

export default function studioRentalForm() {
    const startDate = document.getElementById('calendar-start-date');
    const startDatePopover = document.getElementById('calendar-start-date__popover');
    const startDatePopoverInner = document.getElementById('calendar-start-date__popover-inner');
    const startTime = document.getElementById('calendar-start-time');
    const endDate = document.getElementById('calendar-start-date');
    const endDatePopover = document.getElementById('calendar-end-date__popover');
    const endTime = document.getElementById('calendar-start-time');

    startDate.addEventListener('focus', (event) => {
        startDatePopover.classList.add('form__popover--show');

        const startDateCalendar = new Calendar(startDatePopoverInner, {
            plugins: [dayGridPlugin, interactionPlugin],
            locales: [ptBrLocale],
            initialView: 'dayGridMonth',
            height: 'auto',
            handleWindowResize: true,
            windowResizeDelay: 500,
            hiddenDays: [0],
            headerToolbar: {
                left: 'title',
                right: 'prev,next',
            },
            validRange: (nowDate) => ({
                start: nowDate,
            }),
            selectable: true,
            select: ({ startStr }) => {
                startDate.value = startStr;
                startDateCalendar.destroy();
                startDatePopover.classList.remove('form__popover--show');
            },
        });

        startDateCalendar.render();
    });

    // startDate.addEventListener('blur', (event) => {
    //     startDatePopover.classList.remove('form__popover--show');
    // });

    startDate.addEventListener('input', ({ target }) => {
        console.log('aaa');
        if (target.value) {
            startTime.removeAttribute('disabled');
        }
    });
}
