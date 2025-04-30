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
  if ( $("body.single-unsere-zimmer")[0] ) {
    var gallerySwiper = new Swiper('.gallery-swiper', {
      slidesPerView: 1,
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      loop: true,
      effect: 'fade',
      fadeEffect: {
          crossFade: true,
      },
    });
  }
	
}, false);
