export default function studios() {
    const radios = document.getElementsByClassName('studios__radio');
    const divs = document.getElementsByClassName('studios__div');

    for (const radio of radios) {
        radio.addEventListener('change', function ({ target }) {
            const targetDiv = document.getElementById(target.value);

            for (const div of divs) {
                div.classList.remove('studios__div--active');
            }

            targetDiv.classList.add('studios__div--active');
        });
    }
}
