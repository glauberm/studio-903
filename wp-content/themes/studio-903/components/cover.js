export default function cover() {
    const cover = document.getElementById('cover');
    const backCover = document.querySelector('.back-cover');

    const observer = new IntersectionObserver((entries) => {
        if (entries.some((entry) => entry.isIntersecting)) {
            cover.classList.add('active');
        } else {
            cover.classList.remove('active');
        }
    });

    observer.observe(cover);
    observer.observe(backCover);
}
