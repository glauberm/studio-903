export default function header() {
    const header = document.querySelector('#header');

    window.addEventListener('DOMContentLoaded', (event) => {
        makeStickyIfNotTop(header);
    });

    document.addEventListener('scroll', function () {
        makeStickyIfNotTop(header);
    });
}

function makeStickyIfNotTop(header) {
    if (document.documentElement.scrollTop > 1 || document.body.scrollTop > 1) {
        header.classList.add('header--sticky');
    } else {
        header.classList.remove('header--sticky');
    }
}
