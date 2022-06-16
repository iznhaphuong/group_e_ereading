var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 10,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    breakpoints: {
      640: {
        slidesPerView: 4,
        spaceBetween: 5,
      },
      768: {
        slidesPerView: 5,
        spaceBetween: 5,
      },
      1024: {
        slidesPerView: 7,
        spaceBetween: 0,
      },
    },
    
  });