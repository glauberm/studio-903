export default function slideshow() {
    const slideshows = document.querySelectorAll('.slideshow');

    for (const slideshow of slideshows) {
        const thumbnailRadios = slideshow.querySelectorAll('.slideshow__radio');
        const modals = slideshow.querySelectorAll('.slideshow__modal');
        const modalRadios = slideshow.querySelectorAll('.slideshow__modal-radio');
        const modalCloseButtons = slideshow.querySelectorAll('.slideshow__modal-bg, .slideshow__modal-close');
        const modalNavButtons = slideshow.querySelectorAll('.slideshow__modal-nav');

        for (const thumbnailRadio of thumbnailRadios) {
            if (thumbnailRadio.checked) {
                setActiveImage(slideshow, thumbnailRadio.value);
            }

            thumbnailRadio.addEventListener('change', function ({ target }) {
                setActiveImage(slideshow, target.value);
            });
        }

        for (const modalRadio of modalRadios) {
            if (modalRadio.checked) {
                setActiveModal(slideshow, modalRadio.value);
            }

            modalRadio.addEventListener('change', function ({ target }) {
                if (target.checked) {
                    setActiveModal(slideshow, target.value);
                }
            });
        }

        for (const modalCloseButton of modalCloseButtons) {
            modalCloseButton.addEventListener('click', function () {
                for (const modalRadio of modalRadios) {
                    modalRadio.checked = false;
                }

                for (const modal of modals) {
                    modal.classList.remove('slideshow__modal--active');
                }
            });
        }

        for (const modalNavButton of modalNavButtons) {
            modalNavButton.addEventListener('click', function ({ target }) {
                const { thumbnailRadioId, modalRadioId } = target.dataset;
                const thumbnailRadio = slideshow.querySelector(`#${thumbnailRadioId}`);
                const modalRadio = slideshow.querySelector(`#${modalRadioId}`);

                thumbnailRadio.checked = true;
                setActiveImage(slideshow, thumbnailRadio.value);

                modalRadio.checked = true;
                setActiveModal(slideshow, modalRadio.value);
            });
        }
    }
}

function setActiveImage(slideshow, value) {
    const previousActiveImage = slideshow.querySelector('.slideshow__image--active');
    const activeImage = slideshow.querySelector(`#${value}`);

    if (previousActiveImage) {
        previousActiveImage.classList.remove('slideshow__image--active');
    }

    if (activeImage) {
        const { mediaType } = activeImage.dataset;

        if (mediaType === 'video') {
            const video = activeImage.querySelector('video');

            if (video) {
                video.setAttribute('src', video.dataset.src);
            }
        }

        activeImage.classList.add('slideshow__image--active');
    }
}

function setActiveModal(slideshow, value) {
    const previousActiveModal = slideshow.querySelector('.slideshow__modal--active');
    const activeModal = slideshow.querySelector(`#${value}`);

    if (previousActiveModal) {
        previousActiveModal.classList.remove('slideshow__modal--active');
    }

    if (activeModal) {
        const { mediaType } = activeModal.dataset;

        if (mediaType === 'video') {
            const video = activeModal.querySelector('video');

            if (video) {
                video.setAttribute('src', video.dataset.src);
            }
        }

        activeModal.classList.add('slideshow__modal--active');
    }
}
