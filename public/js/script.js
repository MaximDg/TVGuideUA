$(document).ready(function () { // Когда страница загрузится
$('.navbar-nav a').each(function () { // получаем все нужные нам ссылки
var location = window.location.href; // получаем адрес страницы
var link = this.href; // получаем адрес ссылки
if(location == link) { // при совпадении адреса ссылки и адреса окна
$(this).parent().addClass('active'); //добавляем класс
}
});
});

