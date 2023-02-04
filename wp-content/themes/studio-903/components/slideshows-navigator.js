export default function navigator() {
    const radios = document.getElementsByClassName('slideshows-navigator__radio');

    for (const radio of radios) {
        radio.addEventListener('change', function ({ target }) {
            const targetDiv = document.getElementById(target.value);
            let prevSibling = targetDiv.previousElementSibling;
            let nextSibling = targetDiv.nextElementSibling;

            while (prevSibling) {
                prevSibling.classList.remove('slideshows-navigator__slideshow--active');
                prevSibling = prevSibling.previousElementSibling;
            }

            while (nextSibling) {
                nextSibling.classList.remove('slideshows-navigator__slideshow--active');
                nextSibling = nextSibling.nextElementSibling;
            }

            targetDiv.classList.add('slideshows-navigator__slideshow--active');
        });
    }
}
