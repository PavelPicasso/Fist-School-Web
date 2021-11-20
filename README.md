# Fist-School-Web

[git](https://git-scm.com/)

[Git для новичков (часть 1)](https://habr.com/ru/post/541258/)

# Первоначальная настройка Git
Работа с любой программой всегда начинается с её настройки. Git можно настроить один раз и менять что-то только по мере необходимости.

Установка имени пользователя, от которого будут идти коммиты.

git config --global user.name "User Name"

Установка адреса электронной почты. Обратите внимание, что адрес должен совпадать с тем, на который зарегистрирован аккаунт в Гитхабе.

git config --global user.email mail@gmail.com

С помощью команды git config --list можно посмотреть список всех установленных настроек.

# Клонирование репозитория
Для клонирования репозитория нужно ввести команду git clone и указать его адрес. Репозиторий клонируется в текущую выбранную папку в консоли.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/repository_cloning@1x.png)

# Работа с изменениями
Любая работа с изменениями начинается с получения последней версии удалённого репозитория. Получить последнюю версию можно с помощью команды git pull.
Будьте внимательны, вызов этой команды сотрёт все незафиксированные изменения.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/pull@1x.png)

После внесения любых изменений в проект можно посмотреть статус файлов с помощью команды git status.
Она покажет файлы, в которых были произведены изменения, удалённые и новые, требующие добавления.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/status@1x.png)

Чтобы добавить отслеживание новых файлов, необходимо использовать команду git add <filename> <filename> для добавления нескольких файлов по имени.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/add@1x.png)

В случае если у вас много файлов для добавления, можно воспользоваться командой git add ., которая добавляет отслеживание для всех новых файлов из текущей директории. А команда git add -A добавляет ещё и удалённые файлы, не только из текущей директории, но и из всего локального репозитория.

Помимо добавления файлов, их также необходимо удалять. Для этого существует команда git rm <filename> <filename>, которая удаляет файлы по их имени.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/rm@1x.png)

После того как добавлены все новые и удалены старые файлы, можно делать фиксацию изменений. Фиксация изменений или коммит, очень важна, так как до выполнения этой команды ваши локальные изменения никуда не запишутся.
Чтобы добавить коммит, необходимо ввести команду git commit -m "Комментарий к коммиту".

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/commit@1x.png)

Стоит отметить, что необходимо правильно разбивать изменения на коммиты и давать полные комментарии к коммитам. Подробнее на эту тему можно почитать [здесь](https://habr.com/ru/company/voximplant/blog/276695/)

Если вы внесли изменения и хотите быстро их отменить, то воспользуйтесь командой git reset, которая отменяет все незафиксированные изменения.

По умолчанию, эта команда удаляет только из индекса. А команда git reset --hard безвозвратно удаляет незафиксированные текущие изменения из локального репозитория и из индекса.

Поскольку все вышеописанные действия производятся в локальной копии репозитория, эту копию необходимо отправить на сервер, чтобы другие участники процесса смогли получить актуальную версию. Для этого есть команда git push, которая отправляет все зафиксированные изменения на удалённый репозиторий.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/reset@1x.png)

# Работа с ветками
Работая с Git, приходится постоянно создавать и перемещаться по веткам.

Команда git checkout -b branch-name создаст ветку с указанным именем и автоматически переключится на неё.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/branch_creation@1x.png)

После создания ветку можно отправить на сервер с помощью команды git push origin branch-name.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/push@1x.png)

Аналогично можно забрать себе на компьютер ветку с удалённого репозитория командой git checkout origin/branch-name -b branch-name.

Чтобы не хранить названия веток в памяти или не искать названия веток, существуют две специальные команды, которые позволяют посмотреть все существующие ветки локального репозитория git branch или все существующие ветки удалённого репозитория git branch -r.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/branch@1x.png)

Переключиться на любую локальную ветку можно с помощью команды git checkout branch-name.

![Иллюстрация к проекту](https://assets.htmlacademy.ru/content/blog/86/branch_checkout@1x.png)
