$('.question').on('click', function() {
    console.log('this:', this);
    console.log('$(this):', $(this));
    
    if($(this).hasClass('active')) {
        $('.question').removeClass('active');
        $('.arrow').removeClass('arrow-active');
        $('.answer').slideUp();
    }
    else {
        $('.question').removeClass('active');
        $('.arrow').removeClass('arrow-active');
        $('.answer').slideUp();
        $(this).addClass('active');
        $(this).children('.title').children('.arrow').addClass('arrow-active');
        $(this).children('.answer').slideToggle('slow');
    }
});