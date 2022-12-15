import React from 'react';
import ReactDOM from 'react-dom/client';

import './page-studio-rental.scss';
import StudioRental from './scripts/StudioRental.jsx';

const root = ReactDOM.createRoot(document.getElementById('studio-rental-root'));

root.render(
    <React.StrictMode>
        <StudioRental />
    </React.StrictMode>
);
