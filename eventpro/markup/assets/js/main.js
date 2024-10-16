
(() =>{

	const openNavMenu = document.querySelector(".open-nav-menu"),
	closeNavMenu = document.querySelector(".close-nav-menu"),
	navMenu = document.querySelector(".nav-menu");
	menuOverlay = document.querySelector(".menu-overlay");


	openNavMenu.addEventListener("click",toggleNav);
	closeNavMenu.addEventListener("click",toggleNav);
	menuOverlay.addEventListener("click",toggleNav);

	function toggleNav(){
		navMenu.classList.toggle("open");
		menuOverlay.classList.toggle("active");
		document.body.classList.toggle("hidden-scrolling");
	}

})();



/* mobile menu */
/* $(document).ready(function(){

    $('#menu-icon').click(function(){
        $('#menu').toggleClass('menu-open');
    });


    $('.menu-close-icon').click(function(){
        $('#menu').removeClass('menu-open');
    });

}); */