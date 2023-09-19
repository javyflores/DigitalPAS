(function(){
    const openButton = document.querySelector('.nav__menu');
    const menu = document.querySelector('.nav__link');
    const closeMenu = document.querySelector('.nav__close');

    openButton.addEventListener('click', ()=>{
        menu.classList.add('nav__link--show');
    });

    closeMenu.addEventListener('click', ()=>{
        menu.classList.remove('nav__link--show');
    });

    /*
   	ocultarMenu: function(){
        propMenu.menu_activo = false;
        propMenu.slideMenu.className = propMenu.slideMenu.className.replace('active', '');
    };

    ocultarMenu: function() {
        let click_dentro = document.getElementsByClassName('menu-bar-movil')[0].contains(event.target);

        if (!click_dentro) {
           propMenu.menu_activo = false;
           propMenu.slideMenu.className = propMenu.slideMenu.className.replace('active', '');
        }
    },
    */

})();