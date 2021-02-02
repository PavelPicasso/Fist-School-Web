$(function() {
    // создаем переенные с которыми будем работать
    let 
        formElem = $('form'),
        titleElem = $('.title'),
        descriptionElem = $('.description'),
        listTasksElem = $('.list-tasks');

    // наша функция по добавлению задачки на страницу
    function addTask(title, description) {
        // подставляем данные которые пришли с формы
        let task = `
        <li class="mission">
            <div class="action">
                <h3>${title}</h3>

                <button type="button" class="delete" aria-label="удалить заметку"></button>
                <button type="button" class="arrow" aria-label="свернуть заметку"></button>
            </div>

            <p class="task-description">
                ${description}
            </p>
        </li>
        `;

        // добавляем нашу задачку и скрываем p, в котором находился текст 'Список пуст...'
        listTasksElem.append(task);
        $('.subtitle').hide();
    }

    formElem.submit(function(event) {
        // делаем так чтобы форма не отправляла данные
        event.preventDefault();

        // собираем данные с полей
        const title = titleElem.val();
        const description = descriptionElem.val();

        // приводим форму к первоночальному виду
        formElem[0].reset();

        // вызываем нашу написанную функцию и отправляем ей данные взятые из формы
        addTask(title, description);
    });

    listTasksElem.on('click', '.arrow', function(event) {
        // с помощью event.target нашли то месту куда мы нажади (т.е. на нашу карточку с заданием)
        // далее через closest (работает на подобии perents), находим блок в котором лежит кнопка сворачивания
        const note = event.target.closest('.mission');
        console.log(note);
        
        // обращаемся к последнему блоку в родителе через lastElementChild, там и лежит наше описание которе мы скрываем
        $(note.lastElementChild).slideToggle();
    });

    listTasksElem.on('click', '.delete', function(event) {
        // написать удаление при нажатие на кнопку delete
        const note = event.target.closest('.mission');

        $(note).remove();
        
        if(listTasksElem.children().length == 0) {
            $('.subtitle').show();
        }
    });
});