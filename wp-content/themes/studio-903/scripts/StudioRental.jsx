import React from 'react';

import './StudioRental.scss';
import StudioRentalCalendar from './StudioRentalCalendar';
import StudioRentalForm from './StudioRentalForm';
import dayjs from 'dayjs';

export default function StudioRental() {
    return (
        <div className="StudioRental">
            <div className="StudioRental__row">
                <div className="StudioRental__calendar">
                    <StudioRentalCalendar />
                </div>
                <div className="StudioRental__form">
                    <StudioRentalForm />
                </div>
            </div>
        </div>
    );
}

export async function getEvents(timeMin, timeMax) {
    const baseUrl = 'https://www.googleapis.com/calendar/v3';
    const calendarId = 'uvk99p7ck47hvd5dlm7u9gj1qc@group.calendar.google.com';
    const apiKey = 'AIzaSyDuBI2fZ2A1SuumdnCRug8SDqtE2xs3TWU';

    const params = new URLSearchParams();

    params.append('key', apiKey);
    params.append('timeMin', dayjs(timeMin).toISOString());
    params.append('timeMax', dayjs(timeMax).add(1, 'day').toISOString());

    const response = await fetch(`${baseUrl}/calendars/${calendarId}/events?${params.toString()}`);

    return response.json();
}
