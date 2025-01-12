document.addEventListener('DOMContentLoaded', function() {
    // Créer le bouton burger
    const burger = document.createElement('button');
    burger.className = 'burger-menu';
    burger.setAttribute('aria-label', 'Menu');
    burger.innerHTML = '<span></span><span></span><span></span>';

    // Insérer le bouton dans le header
    const header = document.getElementById('header');
    const menu = document.getElementById('menu');
    header.insertBefore(burger, menu);

    // Gérer le clic sur le burger
    burger.addEventListener('click', function() {
        this.classList.toggle('active');
        menu.classList.toggle('active');
    });
});