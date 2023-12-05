export default function cover() {
    const cover = document.getElementById('cover');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                cover.classList.add('active');
            } else {
                cover.classList.remove('active');
            }
        });
    });

    observer.observe(cover);
}
