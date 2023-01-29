export default function navigator() {
    const radios = document.getElementsByClassName('navigator__radio');

    for (const radio of radios) {
        radio.addEventListener('change', function ({ target }) {
            const targetDiv = document.getElementById(target.value);
            let prevSibling = targetDiv.previousElementSibling;
            let nextSibling = targetDiv.nextElementSibling;

            while (prevSibling) {
                prevSibling.classList.remove('navigator__div--active');
                prevSibling = prevSibling.previousElementSibling;
            }

            while (nextSibling) {
                nextSibling.classList.remove('navigator__div--active');
                nextSibling = nextSibling.nextElementSibling;
            }

            targetDiv.classList.add('navigator__div--active');
        });
    }
}
