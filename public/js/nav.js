
    document.addEventListener("DOMContentLoaded", function () {
        const minimumTime = 2000; 

        // Référence au loader
        const loader = document.getElementById("loader");

        const hideLoader = () => {
            loader.classList.add("hidden"); 
            setTimeout(() => {
                document.body.classList.remove("loading"); 
            }, 800);
        };

       
        window.addEventListener("load", function () {
            const startTime = performance.now();
            const remainingTime = minimumTime - (performance.now() - startTime);

       
            if (remainingTime > 0) {
                setTimeout(hideLoader, remainingTime);
            } else {
                hideLoader();
            }
        });
    });




const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const userIcon = document.getElementById('user-icon');
const dropdownMenu = document.getElementById('dropdown-menu');

menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

if (userIcon) {
    userIcon.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
}

const categorieLink = document.getElementById('categorie-link');
const submenu = document.getElementById('submenu');
const menuIcon = document.getElementById('menu-icon');

if (categorieLink) {
    categorieLink.addEventListener('click', () => {
        submenu.classList.toggle('hidden');
        menuIcon.classList.toggle('fa-chevron-down');
        menuIcon.classList.toggle('fa-chevron-up');
    });
}

const categorieLinkMobile = document.getElementById('categorie-link-mobile');
const submenuMobile = document.getElementById('submenu-mobile');
const menuIconMobile = document.getElementById('menu-icon-mobile');

if (categorieLinkMobile) {
    categorieLinkMobile.addEventListener('click', () => {
        submenuMobile.classList.toggle('hidden');
        menuIconMobile.classList.toggle('fa-chevron-down');
        menuIconMobile.classList.toggle('fa-chevron-up');
    });
}

// Fermer les sous-menus si l'utilisateur clique à l'extérieur
document.addEventListener('click', (event) => {
    const target = event.target;

    if (!categorieLink.contains(target) && !submenu.contains(target)) {
        submenu.classList.add('hidden');
        menuIcon.classList.remove('fa-chevron-up');
        menuIcon.classList.add('fa-chevron-down');
    }

    if (!categorieLinkMobile.contains(target) && !submenuMobile.contains(target)) {
        submenuMobile.classList.add('hidden');
        menuIconMobile.classList.remove('fa-chevron-up');
        menuIconMobile.classList.add('fa-chevron-down');
    }

    if (userIcon && !userIcon.contains(target) && !dropdownMenu.contains(target)) {
        dropdownMenu.classList.add('hidden');
    }
});
   // Gestion de l'affichage du menu déroulant
   document.getElementById('auth-icon').addEventListener('click', function () {
    const dropdown = document.getElementById('auth-dropdown');
    dropdown.classList.toggle('hidden');
});

// Ferme le menu déroulant lorsque l'utilisateur clique en dehors
document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('auth-dropdown');
    const icon = document.getElementById('auth-icon');
    if (!icon.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});









// Js du slide 

document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    const nextBtn = document.querySelector(".slider-btn.next");
    const prevBtn = document.querySelector(".slider-btn.prev");

    let currentIndex = 0;

    function updateSlider() {
        const slideWidth = slider.querySelector(".slide").offsetWidth;
        const totalSlides = slider.children.length;
        const visibleSlides = 3; 
        const maxIndex = totalSlides - visibleSlides;

        // Empêche de dépasser les limites
        if (currentIndex < 0) currentIndex = 0;
        if (currentIndex > maxIndex) currentIndex = maxIndex;

        // Déplace le slider
        slider.style.transform = `translateX(${-currentIndex * (slideWidth + 20)}px)`; 

        // Désactiver les boutons si on est aux extrémités
        prevBtn.disabled = currentIndex <= 0;
        nextBtn.disabled = currentIndex >= maxIndex;
    }

    nextBtn.addEventListener("click", () => {
        currentIndex++;
        updateSlider();
    });

    prevBtn.addEventListener("click", () => {
        currentIndex--;
        updateSlider();
    });

   
    updateSlider();
});


 // Gestion de l'affichage du menu
 document.querySelector('.dropdown-btn').addEventListener('click', function () {
    const dropdownContent = document.querySelector('.dropdown-content');
    dropdownContent.classList.toggle('hidden');
});

// Fermer le menu en cliquant en dehors
document.addEventListener('click', function (e) {
    const dropdown = document.querySelector('.dropdown');
    if (!dropdown.contains(e.target)) {
        document.querySelector('.dropdown-content').classList.add('hidden');
    }
});