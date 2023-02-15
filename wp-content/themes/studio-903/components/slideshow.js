export default function slideshow() {
    const slideshows = document.querySelectorAll('.slideshow');

    for (const slideshow of slideshows) {
        const radios = slideshow.querySelectorAll('.slideshow__radio');

        for (const radio of radios) {
            if (radio.checked) {
                setActiveImage(slideshow, radio.value);
            }

            radio.addEventListener('change', function ({ target }) {
                setActiveImage(slideshow, target.value);
            });
        }
    }
}

function setActiveImage(slideshow, target) {
    const previousActiveImage = slideshow.querySelector('.slideshow__image--active');
    const activeImage = slideshow.querySelector(`#${target}`);

    if (previousActiveImage) {
        previousActiveImage.classList.remove('slideshow__image--active');
    }

    activeImage.classList.add('slideshow__image--active');
}
