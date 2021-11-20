$(function() {

    /*
        Сменить цвец текста контейнера
    */

    // Наша функция которую мы можем использовать в любом месте скрипта
    function changeFontColor() {
        // toggleClass - меняет сначала на класс red, при повторном действии сбрасывает данный класс
        $('.container').toggleClass('red');
    }

    // Также ожно попробовать другие собития такие как
    // mouseover, mouseout, dbclick, 
    $('.changeColor').on('click', function() {
        changeFontColor();
    });


    /*
        В textarea запрещено вводить сомволы, кроме чисел
    */

    // Также ожно попробовать другие собития такие как
    // keydown, keyup, focus, blur
    $('textarea').on('keydown', function(event) {
        console.log('Код нажатого символа:', event.which);

        // Разрешаем использование Backspace - это для того, чтобы мы моги стирать написанные числа
        if(event.which == 8) {
            return true;
        }

        // Запрещаем выводит все кроме чисел
        if(event.which < 48 || event.which > 57) {
            return false;
        }
    });

    $('textarea').on('blur', function() {
        // обращаемся к контейнеру textarea и меняем background-color на #fff
        $('textarea').css('background-color', '#fff');
    });

    $('textarea').on('focus', function() {
        $('textarea').css('background-color', '#f2f2f2');
    });


    /*
        Добавление и удаление классов
    */

    // Добавление и удаление классов
    $('.button').on('click', function() {
        // удаляем класс у контейнера red
        console.log('Удалили класс red у первого текста');
        $('.red').removeClass('red');

        // Добавляем класс у контейнера red
        console.log('Добавили класс blue у второго текста');
        $('.text').addClass('blue');
    });


    /*
        Скрытие и показ элементов
    */

    // Показать скрыть контейнер
    $('.changeDisplay').on('click', function() {
        // Сохраняем в переменную наш контейнер, чтобы было проще к нему каждый раз обращаться
        let conteiner = $('.show');

        // Пишем проверку на то какое сейчас состояние у display (виден или не виден)
        if(conteiner.css('display') == 'block') {
            // Прячем
            // Тут такой момент можно и через метод css, но так как это уже реализовано под капотом hide() мы используем данный метод
            conteiner.hide();
        } else {
            // Показываем
            conteiner.show();
        }
    });


    /*
        Сбор элементов (each) и обращение к родителям и детям (parent/parents/children)
    */

    $('.getCount').click(function() {
        // Если на пальцах, то this - конфета без фантика, а $(this) - это коробка с одной конфетой.
        console.log('Это this:');
        console.log(this);
        console.log('this сожержит элемент, на котором произошел click. Т.е. непосредственно элемент.');
        console.log('Это $(this):');
        console.log($(this));
        console.log('А $(this) - это уже объект jQuery, который содержит тот элемент, на который кликнули.');
        
        // Метод each производит перебор элементов коллекции jQuery, выполняя при этом функцию для каждого из них.
        $('.count').each(function() {
            console.log(`Колличесво Like: ${$(this).text()}`);

            /*
                Делаем проверку для каждого болка с лайками, если
                колличество лайков > 20, то сделать их красными            
            */
            if($(this).text() > 20) {
                console.log('Изменили цвет колличество лайков на красный, если лайк > 20 ');
                $(this).addClass('red');
            }
        });
    });

    $('.news-text').click(function() {
        console.log('Было сделано выделение дочерних элементов (красный цвет border) объекта с классом news-text');
        $(this).parent().css('border', '1px solid red');
    });

    $('.like').click(function() {
        console.log('Было сделано выделение дочерних элементов (зеленый цвет border) объекта с классом like');
        $(this).children().css('border', '1px solid green');
    });


    /*
        Работа с DOM, изменение, добавление и удаление элементов
    */

    $('.change-first-news').click(function() {
        console.log('Была изменена первая запись в списке');
        $('.list-text').first().html('<li>Новый текст</li>');
    });
    
    $('.add-news-end').click(function() {
        // Создаем переменную, которая хранит в себе html, которая будет использована 
        let newElem = `
            <li  class="list-text">
                End
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Fugiat adipisci suscipit quaerat ipsum enim distinctio dolor,
                ducimus similique, ut accusantium doloremque soluta eveniet quo
                temporibus debitis nemo quae voluptates optio!
            </li>
        `;

        console.log('Была добавлена новая запись в конец списка');
        $('.list').append(newElem);
    });
    
    $('.add-news-first').click(function() {
        let newElem = `
            <li  class="list-text">
                First
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Fugiat adipisci suscipit quaerat ipsum enim distinctio dolor,
                ducimus similique, ut accusantium doloremque soluta eveniet quo
                temporibus debitis nemo quae voluptates optio!
            </li>
        `;
        
        console.log('Была добавлена новая запись в начало списка');
        $('.list').prepend(newElem);
    });


    /*
        Модальное окно
    */

    // Открытие Модального окна через кнопку
    $('.open-modal').click(function() {
        $('.modal').show();
    });

    // Закрытие Модально окна через Кнопку Крестик
    $('.close').click(function() {
        $('.modal').hide();
    });

    // Закрытие Модального окна нажам на любое место кроме модального окна
    $('.modal').click(function(event) {
        console.log(event.target);

        // Проверяем что мы нажали на родителя (т.е. само Модальное окно)
        // а не на то что наъодиться в нутри нее (Контент)
        if(event.target == this) {
            $(this).hide();
        }
    });

    /*
        Галерея пример 1
    */

   function nextPageSlide() {
       
   }

    let viewport = $(".viewport").width(); // сохраняем ширину всего блока с котором находится наша галерея

    // установим обработчик события resize
    $(window).resize(function(){
        viewport = $(".viewport").width();
        $(".next").click();
    });

    let slider = $("ul.slider");
    let viewSliders = $(".dot");
    let viewSlide = 0;

    $(".next").click(function () { 
        $(viewSliders[viewSlide]).removeClass('active'); // удаляем класс у первой картинки так как она больше не активная

        if (viewSlide < 4) {
            viewSlide++;
        } else {
            viewSlide = 0;
        }

        $(viewSliders[viewSlide]).addClass('active'); // добавляем активный класс для точки, чтобы понимать на какой мы картинке сейчас находимся

        slider.animate({'left': -viewSlide * viewport + "px"}, {'duration': 500})   // делаем сдвиг влево на ширину картинки
    });

    $(".prev").click(function () { 
        $(viewSliders[viewSlide]).removeClass('active');

        if (viewSlide > 0) {
            viewSlide--;
        } else {
            viewSlide = 4;
        }

        $(viewSliders[viewSlide]).addClass('active');

        slider.animate({'left': -viewSlide * viewport + "px"}, {'duration': 500})  
    });


    /*
        Галерея пример 2
    */

    // массив картинок, который хранит в своих ячейках путь к картинке, под заданнами индексами
    let images = [
        './img/bled-1899264_1280.jpg',      // index = 0
        './img/cat-1455468_1280.jpg',       // index = 1
        './img/france-2773030_1280.jpg',    // index = 2
        './img/portrait-1462944_1280.jpg',  // index = 3
        './img/woman-1948939_1280.jpg'      // index = 4
    ],
    currentImage = 0,                       // текущая картинка 
    countImage = images.length - 1;         // колличетво картинок - 1 т.к. в массиве 5 картинка стоит под 4 местом

    $('.next-v2').click(function() {
        // меняем картинку до тех пор пока не дошли до последней
        if (currentImage < 4) {
            currentImage++; // изменяем текущую картинку
            $('.g-slide').attr('src', images[currentImage]); // меняем src картинки на новую
            console.log(`Текущая картинка под index = ${currentImage}`);
        } else {
            // после того как мы добрадись до последней картинки, делае сброс на первую
            currentImage = 0;
            $('.g-slide').attr('src', images[currentImage]); // меняем src картинки на первую
        }
    });

    $('.prev-v2').click(function() {
        if (currentImage > 0) {
            currentImage--;
            $('.g-slide').attr('src', images[currentImage]);
            console.log(`Текущая картинка под index = ${currentImage}`);
        } else {
            currentImage = countImage;
            $('.g-slide').attr('src', images[currentImage]);
        }
    });


    /*
        Таймер на jQuery
    */

   let secondsRemaining, intervalHandle;

   function tick() {
       $('.time').html(secondsRemaining);

       console.log(secondsRemaining);

       // стоп если секунды упали до нуля
       if (secondsRemaining === 0) {
            alert("Done!");
            $('.timer').html('<a href="#">Ссылка</a>');
            clearInterval(intervalHandle);
        }

        // вычтите из оставшихся секунд
        secondsRemaining--;
   }
   
    function startCountdown(sec) {
        secondsRemaining = sec;

        // каждую секунду вызывайте функцию "ТИК"
        // нужно сделать это в переменную, чтобы вы могли остановить интервал позже!!!
        intervalHandle = setInterval(tick, 1000);
    }

    $('.run-timer').click(function() {
        $('.timer-container').show();
        startCountdown(15);
    });
});