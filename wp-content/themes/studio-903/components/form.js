import { debounce } from 'lodash';

export default function form() {
    const forms = document.querySelectorAll('.form');

    for (const form of forms) {
        destroyHours(form);
        form.querySelector('.form__date').value = '';
        form.querySelector('.form__contact-key').value = 'whatsapp';
        form.querySelector('.form__contact-value').value = '';

        form.querySelector('.form__date').addEventListener(
            'change',
            debounce(function (event) {
                const value = event.target.value;

                if (value) {
                    destroyHours(form);
                    buildHours(form, value);
                }
            }, 300)
        );

        form.querySelector('.form__contact-key').addEventListener('change', function (event) {
            changeContactValueLabel(form, event.target.value);
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (form.hasAttribute('data-submitting')) return;

            const token = process.env.GOOGLE_RECAPTCHA_SITE_KEY;

            grecaptcha.ready(function () {
                grecaptcha.execute(token, { action: 'submit' }).then(function (token) {
                    submit(form, token);
                });
            });
        });
    }
}

function destroyHours(form) {
    const formHourSelect = form.querySelector('.form__hour');

    formHourSelect.disabled = true;
    formHourSelect.textContent = '';
}

function buildHours(form, value) {
    form.querySelector('.form__hour-label-loading').hidden = false;
    form.querySelector('.form__hour-error').hidden = true;

    fetch(`${form.dataset.basepath}/get-hours`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            date: value,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            const formHourSelect = form.querySelector('.form__hour');

            const option = document.createElement('option');
            option.text = '';
            option.value = '';
            formHourSelect.appendChild(option);

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

function submit(form, token) {
    const formData = new FormData(form);

    form.setAttribute('data-submitting', '');

    form.querySelector('.form__submit-loading').hidden = false;
    form.querySelector('.form__success').hidden = true;
    form.querySelector('.form__error').hidden = true;
    form.querySelector('.form__fieldset').disabled = true;

    fetch(`${form.dataset.basepath}/submit`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            token: token,
            source: formData.get('source'),
            date: formData.get('date'),
            hour: formData.get('hour'),
            name: formData.get('name'),
            contact_key: formData.get('contact-key'),
            contact_value: formData.get('contact-value'),
            details: formData.get('details'),
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                form.querySelector('.form__success').hidden = false;
                form.reset();
                destroyHours(form);
            } else {
                form.querySelector('.form__error').hidden = false;

                if (process.env.NODE_ENV === 'development') {
                    console.error(data);
                }
            }
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
            form.removeAttribute('data-submitting');
        });
}
