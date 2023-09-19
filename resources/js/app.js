import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const toggler = document.getElementById('modalToggler');
console.log(toggler);
toggler.addEventListener('click', function() {
    const modal = document.getElementById('categoryModal');
    modal.style.display = 'block';
    modal.style.opacity = 1;
});