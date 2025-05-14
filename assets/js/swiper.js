import Swiper from 'swiper/bundle';
import { Navigation, Autoplay } from 'swiper/modules';

Swiper.use([Navigation, Autoplay]);

//wait until images, links, fonts, stylesheets, and js is loaded
window.addEventListener("load", () => {

  var amenitiesSwiper = new Swiper('.amenities-swiper', {
    slidesPerView: 2,
    spaceBetween: 20,
    speed: 3000, // how fast the transition runs
    loop: true,
    freeMode: true,
    freeModeMomentum: false,
    autoplay: {
        delay: 0, // no pause between transitions
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 5 },
        1536: { slidesPerView: 8 },
    },
});


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
      speed: 1500,
      slidesPerView: 1,
      spaceBetween: 20,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      }
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
      speed: 1500,
      autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      }
    });
  }
	
}, false);
