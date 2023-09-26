import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Modal toggle
if(document.getElementById('modalToggler')) {
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
            modal.style.top = '100px';
            modalInput.focus();
            opened = true;
        }, 50);
    });
}

// Navbar animation

const navbar = document.getElementsByTagName("nav")[0];

if(!navbar.classList.contains("bg-gray-800")) {
    window.onscroll = function () {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            navbar.style.background = "#1f2937";
            navbar.style.borderBottom = "solid 1px #374151";
        } else {
            navbar.style.background = "transparent";
            navbar.style.borderBottom = "none";
        }
    }
}
