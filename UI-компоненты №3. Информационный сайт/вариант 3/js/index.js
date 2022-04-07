const btnOff = $('.header-toggle'),
	btnOn = $('.close-btn'),
    main = $('body'),
    landing = $(window);

let pagePosition = 0;

let disableScroll = function () {
    pagePosition = landing.scrollTop();
    main.addClass('disable-scroll');
}

let enableScroll = function () {
    main.removeClass('disable-scroll');
    landing.scrollTop(pagePosition);
}

// Закрытие Модально окна через Кнопку Крестик
btnOn.on('click', (e) => {
    $('.mobile-modal-menu').hide();
    enableScroll();
});

// Открытие Модального окна через кнопку
btnOff.on('click', (e) => {
    $('.mobile-modal-menu').show();
    disableScroll();
});


var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});