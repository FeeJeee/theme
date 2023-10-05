<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="На этой странице отображен результат тестового задания." />
    <title>Тестовое задание на должность Младший Web-разработчик</title>
    <?php wp_head(); ?>
</head>
<body>

    <?php wp_nav_menu('menu') ?>
    <?php the_content(); ?>

    <div class="container">
        <h1> Вакансия веб-программист</h1>

        <ol>
            <li>Зарегистрировать бесплатный хостинг и домен.</li>
            <li>Развернуть на бесплатном хостинге WP.</li>
            <li>	Шрифт на сайте «montserrat». Цвет #333333</li>
            <li>Создать страницу.</li>
            <li>Прописать на ней мета-теги:
                <ul class="meta_tags">
                    <li><u>Title:</u> Тестовое задание на должность Младший Web-разработчик</li>
                    <li><u>Description:</u> На этой странице отображен результат тестового задания.</li>
                    <li><u>H1:</u> Вакансия веб-программист</li>
                </ul>
            </li>
            <li>После H1 разместить текст текущего тестового задания</li>
            <li>Поставить в тексте на словосочетание  <a class="open_modal" id="open-modal">«форму обратной связи»</a> ссылку, при нажатии на которое откроется форма обратной связи в popup.</li>
            <li>Реализовать форму обратной связи в popup окне (готовые решения и плагины использовать запрещено, библиотечки можно).</li>
            <li>Внешний вид формы (
                <ul>
                    <li>Максимальная ширина 350,</li>
                    <li>цвет кнопки и текста #333333, при наведении на кнопку должна быть инверсия цвета.</li>
                    <li>поле “Телефон” должно быть обязательным, у поля “Телефон” должна быть маска.</li>
                    <li>Галочка на обработку должна быть обязательна и по умолчанию установлена.</li>
                    <li>При невыполнении условия о обязательных полях должно выводится сообщение об ошибке, или успешном заполнении – сообщение об отправке.</li>
                    )
                </ul>
            </li>
            <ul>
                <li>Реализовать на php функционал отправки данных с формы на почту.</li>
                <li>При нажатии на «крестик» форма должны закрываться.</li>
                <li>Страница и форма должны быть адаптивными.</li>
                <li>ТЗ отправить на почту ablyazova@seo.ru: ссылку на сайт, архив с сайтом. </li>
            </ul>
        </ol>
    </div>

    <div class="modal" id="my-modal">
        <div class="modal_box">
            <div class="modal_head">
                <a class="modal_close_button" id="close-modal">x</a>
                <div class="modal_label">Обратный звонок</div>
            </div>
            <div class="modal_body">
                <form class="modal_form" id="form" method="POST">
                    <label class="modal_form_input_label">Имя</label>
                    <input class="modal_form_input" id="name" type="text" name="name">

                    <label class="modal_form_input_label">Телефон</label>
                    <input class="modal_form_input" id="phone" type="text" name="phone" placeholder="+7">

                    <div class="form_checkbox">
                        <input id="accept" type="checkbox" name="accept" checked />
                        <label for="scales">Согласен на обработку персональных данных</label>
                    </div>

                    <div class="form_error" id="form-error"></div>
                    <button class="modal_button" type="submit">Отправить</button>
                </form>
                <div class="send_status" id="send-status"></div>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>