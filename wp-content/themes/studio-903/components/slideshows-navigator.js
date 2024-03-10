export default function slideshowNavigator() {
  const slideshowNavigators = document.querySelectorAll(
    ".slideshows-navigator"
  );

  for (const slideshowNavigator of slideshowNavigators) {
    const radios = slideshowNavigator.querySelectorAll(
      ".slideshows-navigator__radio"
    );

    for (const radio of radios) {
      if (radio.checked) {
        setActiveSlideshow(slideshowNavigator, radio.value);
      }

      radio.addEventListener("change", function ({ target }) {
        setActiveSlideshow(slideshowNavigator, target.value);
      });
    }
  }
}

function setActiveSlideshow(slideshowNavigator, target) {
  const previousActiveSlideshow = slideshowNavigator.querySelector(
    ".slideshows-navigator__slideshow--active"
  );
  const activeSlideshow = slideshowNavigator.querySelector(`#${target}`);

  if (previousActiveSlideshow) {
    previousActiveSlideshow.classList.remove(
      "slideshows-navigator__slideshow--active"
    );
  }

  activeSlideshow.classList.add("slideshows-navigator__slideshow--active");
}
