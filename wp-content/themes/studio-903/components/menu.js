export default function menu() {
    const menuLinks = document.querySelectorAll('.menu__nav .menu li a');
    const menuTrigger = document.querySelector('.menu__trigger-input');

    for (const menuLink of menuLinks) {
        menuLink.addEventListener('click', function () {
            menuTrigger.checked = false;
        });
    }
}
