const btnOff = $('.scroll-off'),
	btnOn = $('.scroll-on'),
    main = $('body'),
    landing = $(window);

let disableScroll = function () {
    let pagePosition = landing.scrollTop();
    main.addClass('disable-scroll');
    main.offset({top: pagePosition});
    main.css('top', -pagePosition + 'px');
}

let enableScroll = function () {
    let pagePosition = -main.offset().top;
    main.css('top', 'auto');
    main.removeClass('disable-scroll');
    landing.scrollTop(pagePosition);
}

btnOff.on('click', (e) => {
    disableScroll();
    $(e.currentTarget).css('pointerEvents', 'none');
    btnOn.css(
        {
        'pointerEvents': 'auto',
        'cursor': 'pointer'
        }
    );
});

btnOn.on('click', (e) => {
    enableScroll();
    $(e.currentTarget).css('pointerEvents', 'none');
    btnOff.css('pointerEvents', 'auto');
});