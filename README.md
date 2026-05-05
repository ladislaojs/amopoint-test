# Инструкция по тестовому заданию

## 1 задача: PHP

Задание: Напишите Laravel проект, в состав которого обязательно входит
1. Консольная команда, которая каждые 5 минут получает информацию от любого API на ваш выбор и сохраняет её в таблицу БД
2. Route, отдающий массив записей таблицы в формате json
Например:   https://official-joke-api.appspot.com/random_joke

Решение: представлено в данном репозитории. Для запуска нужно склонировать репозиторий, в корневой директории проекта ввести команду `composer run init-app`, затем в новом терминале так же в этой же директории ввести команду `php artisan schedule:work`, чтобы запустить планировшик, который и будет каждые 5 минут запускать консольную команду, требующуюся в задании. Эндпоинт для получения массива записей: GET /api/jokes

## 2 задача: JS

Задание: 2.Необходимо написать js код, который в зависимости от выбранного значения поля Тип отражает разный набор полей на странице   http://test.amopoint-dev.ru/testzz/testlist.html
Должны отображаться только те поля в атрибуте name которых есть значение выбранного элемента списка.
Решение должно представлять из себя файл для подключения к странице, либо сниппет для запуска в браузере в консоли.

Решение (файл с этим же кодом можно найти в данном репозитории по пути resources/js/task2.js):

```js
const inputs = document.querySelectorAll('[name^="input_"], [name^="button_"]');
const fields = Array.from(inputs).map(input => ({
    input,
    wrapper: input.closest('p')
}));
function renderFields() {
    fields.forEach(field => {
        field.input.name.split('_')[1] == e.target.value ? document.body.appendChild(field.wrapper) : field.wrapper.remove(); 
    });
}
function renderFields(type) {
    fields.forEach(field => {
        field.input.name.split('_')[1] == type ? document.body.appendChild(field.wrapper) : field.wrapper.remove(); 
    });
}
const typeSelect = document.querySelector('[name="type_val"]');
typeSelect.addEventListener('change', () => {
    renderFields(typeSelect.value);
});
renderFields(typeSelect.value);
```

## 3 задача: PHP + JS

Задание: 3.Написать счетчик посещений страницы. Решение должно состоять из двух компонентов: 
-кода на js, который подключается к любому сайту. Скрипт должен собрать необходимые данные(ip, город, устройство) и отправлять на сервер.
 -бэк часть, который хранит данные в БД(sqllite или другой на выбор) и показывает график посещений по часам(по оси х - количество уникальных посещений за час, по оси y- время), круговую диаграмму с разбиением по городам.
Оформить в виде страницы просмотра статистики с авторизацией. Решение выложить на любой хостинг для возможности проверки

Решение:
Ссылка на страницу, для которой считаются посещения: https://stiezsht.gt.tc/
Ссылка на страницу с графиками: https://stiezsht.gt.tc/stats (авторизация по Basic Auth, логин и пароль одинаковые: amopoint)