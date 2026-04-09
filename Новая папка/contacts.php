<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore – Контакты</title>
    <link rel="stylesheet" href="contact.css">
</head>

<body>
<?php require_once "blocks/header.php" ?>

<!-- Hero блок -->
<div class="container hero-contacts">
    <h1>Свяжитесь с нами</h1>
    <p>Мы всегда открыты к вашим вопросам, предложениям и отзывам.</p>
    <img src="/img/Map.png" alt="Карта проезда">
</div>

<!-- Форма обратной связи -->
<div class="feedback">
    <div class="container">
        <h2>Напишите нам</h2>
        <p>Оставьте сообщение, и мы ответим вам в ближайшее время.</p>

        <form>
            <div class="inline">
                <div>
                    <label>Имя</label>
                    <input type="text" placeholder="Введите ваше имя">
                </div>
                <div>
                    <label>Фамилия</label>
                    <input type="text" placeholder="Введите вашу фамилию">
                </div>
            </div>
            <label>Email</label>
            <input type="email" class="one-line" placeholder="example@mail.com">

            <label>Сообщение</label>
            <textarea class="one-line" placeholder="Введите текст сообщения..."></textarea>

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>

<footer>
    <p>© 2025 GameStore. Все права защищены.</p>
</footer>
</body>
</html>
