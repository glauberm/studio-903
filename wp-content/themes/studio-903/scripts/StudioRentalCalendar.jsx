import React, { useRef } from 'react';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import ptBrLocale from '@fullcalendar/core/locales/pt-br';
import { getEvents } from './StudioRental';

export default function StudioRentalCalendar() {
    const calendarRef = useRef();

    return (
        <FullCalendar
            ref={calendarRef}
            plugins={[dayGridPlugin]}
            locales={[ptBrLocale]}
            initialView="dayGridMonth"
            height="auto"
            expandRows={true}
            handleWindowResize={true}
            windowResizeDelay={500}
            hiddenDays={[0]}
            headerToolbar={{
                start: 'title',
                center: '',
                end: 'prev,next',
            }}
            displayEventEnd={true}
            displayEventTime={true}
            eventDisplay="block"
            eventBackgroundColor="#cce1e7"
            eventBorderColor="#99c3d0"
            eventTextColor="#212529"
            eventTimeFormat={{
                hour: '2-digit',
                minute: '2-digit',
                hour12: false,
            }}
            // validRange={(nowDate) => ({
            //     start: nowDate,
            // })}
            datesSet={(dates) => {
                getEvents(dates.start, dates.end).then((data) => {
                    const calendarApi = calendarRef.current.getApi();

                    const events = data.items.map((item) => ({
                        start: item.start.dateTime,
                        end: item.end.dateTime,
                    }));

                    calendarApi.removeAllEvents();

                    events.forEach((event) => {
                        calendarApi.addEvent(event);
                    });
                });
            }}
        />
    );
}
