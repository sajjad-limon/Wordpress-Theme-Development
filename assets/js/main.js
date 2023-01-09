
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


/* search_box */
function search() {
	let seach_box = document.getElementById('search_box').value.toUpperCase();

	let item = document.querySelectorAll('.col-md-4');

	let l = document.getElementsByTagName('h1');

	for(var i = 0; i<=l.length; i++) {
		let a = item[i].getElementsByTagName('h1')[0];

		let value = a.innerHTML || a.innerText || a.textContent;

		if(value.toUpperCase().indexOf(seach_box) > -1 ) {
			item[i].style.display= "";
		} else {
			item[i].style.display = "none";
		}
	}
}


/* filter category */

/* let indicator = document.querySelector('.indicator').children; */


