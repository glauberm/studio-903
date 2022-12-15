import React, { useRef, useEffect, useState } from 'react';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import ptBrLocale from '@fullcalendar/core/locales/pt-br';
import dayjs from 'dayjs';

import './StudioRentalForm.scss';
import { getEvents } from './StudioRental';

function useClickOutsideDetector(ref, callback) {
    useEffect(() => {
        function handleClickOutside(event) {
            if (ref.current && !ref.current.contains(event.target)) {
                callback();
            }
        }

        document.addEventListener('mousedown', handleClickOutside);

        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [ref]);
}

export default function StudioRentalForm() {
    const [startDate, setStartDate] = useState('');
    const [isStartDateFocused, setStartDateFocused] = useState(false);
    const [startDateEvents, setStartDateEvents] = useState([]);
    const startDateRef = useRef(null);

    const onSubmit = (event) => {
        event.preventDefault();
    };

    const buildStartTimeOptions = (date) => {
        const isSaturday = dayjs(date).day() === 6;
        const openingTime = 8;
        const closingTime = isSaturday ? 14 : 22;
        const availableTimes = [];

        getEvents(date, date).then((data) => {
            setStartDateEvents(
                data.items.map((item) => ({
                    startHour: dayjs(item.start.dateTime).hour(),
                    startMinutes: dayjs(item.start.dateTime).minute(),
                    endHour: dayjs(item.end.dateTime).hour(),
                    endMinutes: dayjs(item.end.dateTime).minute(),
                }))
            );
        });

        for (let i = openingTime; i < closingTime; i++) {
            availableTimes.push(`${i}:00`);
            availableTimes.push(`${i}:30`);
        }

        return availableTimes;
    };

    useClickOutsideDetector(startDateRef, () => setStartDateFocused(false));

    return (
        <form method="post" className="StudioRentalForm" onSubmit={onSubmit}>
            <div className="StudioRentalForm__row">
                <div ref={startDateRef} className="StudioRentalForm__field">
                    <label htmlFor="calendar-start-date">Start date</label>

                    <input
                        type="text"
                        name="calendar-start-date"
                        id="calendar-start-date"
                        value={startDate}
                        onChange={({ target }) => setStartDate(target.value || '')}
                        onFocus={() => setStartDateFocused(true)}
                    />

                    {isStartDateFocused && (
                        <div className="StudioRentalForm__popover">
                            <FullCalendar
                                plugins={[dayGridPlugin, interactionPlugin]}
                                locales={[ptBrLocale]}
                                initialView="dayGridMonth"
                                height="auto"
                                handleWindowResize={true}
                                windowResizeDelay={500}
                                hiddenDays={[0]}
                                headerToolbar={{
                                    left: 'title',
                                    right: 'prev,next',
                                }}
                                validRange={(nowDate) => ({
                                    start: nowDate,
                                })}
                                selectable={true}
                                select={({ startStr }) => {
                                    setStartDate(startStr);
                                    setStartDateFocused(false);
                                }}
                            />
                        </div>
                    )}
                </div>

                <div className="StudioRentalForm__field">
                    <label htmlFor="calendar-start-time">Start time</label>
                    <select name="calendar-start-time" id="calendar-start-time" disabled={!startDate}>
                        {startDate &&
                            buildStartTimeOptions(startDate).map((time, key) => (
                                <option value={time} key={key}>
                                    {time}
                                </option>
                            ))}
                    </select>
                </div>
            </div>

            {/* <div className="StudioRentalForm__row">
                <div className="StudioRentalForm__field">
                    <label htmlFor="calendar-end-date">End date</label>
                    <input type="text" name="calendar-end-date" id="calendar-end-date" />
                    <div className="StudioRentalForm__popover">
                        <div id="calendar-end-date__popover"></div>
                    </div>
                </div>
                <div className="StudioRentalForm__field">
                    <label htmlFor="calendar-end-time">End time</label>
                    <select name="calendar-end-time" id="calendar-end-time" disabled></select>
                </div>
            </div> */}

            <div className="StudioRentalForm__field">
                <label htmlFor="calendar-title">Title</label>
                <input type="text" name="calendar-title" id="calendar-title" />
            </div>

            <div className="StudioRentalForm__field">
                <label htmlFor="calendar-message">Description</label>
                <textarea name="calendar-message" id="calendar-message"></textarea>
            </div>

            <div className="StudioRentalForm__row">
                <div className="StudioRentalForm__field">
                    <label htmlFor="calendar-contact-method">Preferred contact method</label>
                    <select name="calendar-contact-method" id="calendar-contact-method">
                        <option>WhatsApp</option>
                        <option>Email</option>
                    </select>
                </div>
                <div className="StudioRentalForm__field">
                    <label htmlFor="calendar-contact-value">Phone number</label>
                    <input type="tel" name="calendar-contact-value" id="calendar-contact-value" />
                </div>
            </div>
        </form>
    );
}
