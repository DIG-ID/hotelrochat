import Swiper from 'swiper/bundle';

//wait until images, links, fonts, stylesheets, and js is loaded
window.addEventListener("load", () => {

	if ( $(".home")[0] ) {
		var eventsSwiper = new Swiper('.events-swiper', {
            loop: true,
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            slidesPerView: 1,
            spaceBetween: 20,
          });
          
	}
	
}, false);
