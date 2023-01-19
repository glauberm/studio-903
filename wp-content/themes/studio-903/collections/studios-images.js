export default function studiosImages() {
    const studiosImages = document.getElementsByClassName('studios-images');

    for (const studioImage of studiosImages) {
        const radios = studioImage.getElementsByClassName('studios-images__radio');
        const images = studioImage.getElementsByClassName('studios-images__image');

        for (const radio of radios) {
            radio.addEventListener('change', function ({ target }) {
                const targetImage = document.getElementById(target.value);

                for (const image of images) {
                    image.classList.remove('studios-images__image--active');
                }

                targetImage.classList.add('studios-images__image--active');
            });
        }
    }
}
