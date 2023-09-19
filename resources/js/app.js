import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const toggler = document.getElementById('modalToggler');
const bodyToggler = document.getElementById('bodyToggler');
const modal = document.getElementById('categoryModal');
const modalInput = document.getElementById('categoryInput');
var opened = false;

bodyToggler.addEventListener('click', function() {
    if (opened) {
        modal.style.top = '-7rem';
        opened = false;
    }
});
toggler.addEventListener('click', function() {
    setTimeout(() => {
        modal.style.top = '60px';
        modalInput.focus();
        opened = true;
    }, 50);
});