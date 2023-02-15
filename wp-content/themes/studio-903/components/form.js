import { debounce } from 'lodash';

export default function form() {
    const forms = document.querySelectorAll('.form');

    for (const form of forms) {
        form.querySelector('.form__date').addEventListener(
            'change',
            debounce(function (event) {
                destroyHours(form);
                buildHours(form, event.target.value);
            }, 300)
        );

        form.querySelector('.form__contact-key').addEventListener('change', function (event) {
            changeContactValueLabel(form, event.target.value);
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            submit(form);
        });
    }
}

function destroyHours(form) {
    const formHourSelect = form.querySelector('.form__hour');

    formHourSelect.disabled = true;
    formHourSelect.textContent = '';
}

function buildHours(form, value) {
    const formData = new FormData(form);

    form.querySelector('.form__hour-label-loading').hidden = false;
    form.querySelector('.form__hour-error').hidden = true;
    form.querySelector('.form__date').disabled = true;

    fetch(`${form.dataset.basepath}/get-hours`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': formData.get('_wpnonce'),
        },
        body: JSON.stringify({
            date: value,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            const formHourSelect = form.querySelector('.form__hour');

            for (const hour of data) {
                const option = document.createElement('option');
                option.text = hour;
                option.value = hour;
                formHourSelect.appendChild(option);
            }

            formHourSelect.disabled = false;
        })
        .catch((error) => {
            form.querySelector('.form__hour-error').hidden = false;

            if (process.env.NODE_ENV === 'development') {
                console.error('Error:', error);
            }
        })
        .finally(() => {
            form.querySelector('.form__hour-label-loading').hidden = true;
            form.querySelector('.form__date').disabled = false;
        });
}

function changeContactValueLabel(form, value) {
    const label = form.querySelector('.form__contact-value-label');
    const input = form.querySelector('.form__contact-value');

    if (value === 'email') {
        label.textContent = label.dataset.emailLabel;
        input.setAttribute('type', 'email');
    } else {
        label.textContent = label.dataset.phoneLabel;
        input.setAttribute('type', 'tel');
    }
}

function submit(form) {
    const formData = new FormData(form);

    form.querySelector('.form__submit-loading').hidden = false;
    form.querySelector('.form__success').hidden = true;
    form.querySelector('.form__error').hidden = true;
    form.querySelector('.form__fieldset').disabled = true;
    form.querySelector('.form__button').disabled = true;

    fetch(`${form.dataset.basepath}/submit`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': formData.get('_wpnonce'),
        },
        body: JSON.stringify({
            source: formData.get('source'),
            date: formData.get('date'),
            hour: formData.get('hour'),
            name: formData.get('name'),
            contact_key: formData.get('contact-key'),
            contact_value: formData.get('contact-value'),
            details: formData.get('details'),
        }),
    })
        .then((response) => {
            if (response.ok) {
                return;
            }

            return response.json().then((data) => {
                form.querySelector('.form__success').hidden = false;
            });
        })
        .catch((error) => {
            form.querySelector('.form__error').hidden = false;

            if (process.env.NODE_ENV === 'development') {
                console.error(error);
            }
        })
        .finally(() => {
            form.querySelector('.form__submit-loading').hidden = true;
            form.querySelector('.form__fieldset').disabled = false;
            form.querySelector('.form__button').disabled = false;
        });
}
