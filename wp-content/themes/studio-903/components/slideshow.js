export default function slideshow() {
    const images = document.getElementsByClassName('slideshow');

    for (const image of images) {
        const radios = image.getElementsByClassName('slideshow__radio');

        for (const radio of radios) {
            radio.addEventListener('change', function ({ target }) {
                const targetImage = document.getElementById(target.value);
                let prevSibling = targetImage.previousElementSibling;
                let nextSibling = targetImage.nextElementSibling;

                while (prevSibling) {
                    prevSibling.classList.remove('slideshow__image--active');
                    prevSibling = prevSibling.previousElementSibling;
                }

                while (nextSibling) {
                    nextSibling.classList.remove('slideshow__image--active');
                    nextSibling = nextSibling.nextElementSibling;
                }

                targetImage.classList.add('slideshow__image--active');
            });
        }
    }
}
