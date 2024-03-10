export default function section() {
  const observedSections = document.querySelectorAll(".observed-section");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const activeLink = document.querySelector(
          `.menu__nav a[href='#${entry.target.id}']`
        );

        if (activeLink && entry.isIntersecting) {
          const menuLinks = document.querySelectorAll(".menu__nav a");

          for (const menuLink of menuLinks) {
            menuLink.classList.remove("active");
          }

          if (activeLink) {
            activeLink.classList.add("active");
          }
        } else if (activeLink) {
          activeLink.classList.remove("active");
        }
      });
    },
    { rootMargin: "-50%" }
  );

  for (const observedSection of observedSections) {
    observer.observe(observedSection);
  }
}
