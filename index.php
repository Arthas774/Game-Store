<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore - Магазин игр</title>
    <link rel="stylesheet" href="main1.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once "blocks/header.php" ?>

        <div class="hero container">
            <div class="hero--info">
                <h2>Лучшие игры по лучшим ценам</h2>
                <h1>Огромная коллекция игр для всех платформ</h1>
                <p>Покупайте лицензионные игры со скидками до 80%. Мгновенная доставка ключей после оплаты. Гарантия и
                    поддержка 24/7.</p>
<!--                <button class="btn">В каталог</button>-->
            </div>
        </div>

        <div class="container trending">
            <a href="#" class="see-all">ВЕСЬ КАТАЛОГ</a>
            <h3>Популярные игры</h3>

            <div class="games">
                <div class="game-card">
                    <img src="img/game1.jpg" width="250" height="500" alt="Dark Souls">
                    <h4>Dark Souls</h4>
                    <div class="price">1 999 ₽ <span class="old-price">3 499 ₽</span></div>
                    <button class="btn">В корзину</button>
                </div>
                <div class="game-card">
                    <img src="img/game2.jpg" width="250" height="500" alt="Assassin’s Creed">
                    <h4>Assassin’s Creed</h4>
                    <div class="price">899 ₽ <span class="old-price">1 499 ₽</span></div>
                    <button class="btn">В корзину</button>
                </div>
                <div class="game-card">
                    <img src="img/game3.jpg" width="250" height="500" alt="Spider-man 2">
                    <h4>Spider-man 2</h4>
                    <div class="price">2 499 ₽ <span class="old-price">3 999 ₽</span></div>
                    <button class="btn">В корзину</button>
                </div>
                <div class="game-card">
                    <img src="img/game4.jpg" width="250" height="500" alt="Sekiro">
                    <h4>Sekiro</h4>
                    <div class="price">3 299 ₽ <span class="old-price">4 599 ₽</span></div>
                    <button class="btn">В корзину</button>
                </div>
            </div>
        </div>

        <div class="container big-text">
            <p>Более 10 000 игр в нашем каталоге. Постоянные обновления и эксклюзивные предложения!</p>
        </div>

        <div class="container banner">
            <h3>Специальное предложение</h3>
            <p>Купите любые 3 игры из каталога и получите скидку 25% на весь заказ!</p>
            <img src="img/banner.jpg" alt="Акция">
        </div>
    </div>

    <div class="features">
        <div class="container">
            <h3>Почему покупают у нас?</h3>
            <p>Мы предлагаем лучшие условия для всех геймеров</p>
            <div class="info">
                <div class="block">
                    <img src="img/feature1.png" alt="Цены">
                    <p>Лучшие цены</p>
                    <p class="small">Гарантия возврата денег</p>
                </div>
                <div class="block">
                    <img src="img/feature2.png" alt="Доставка">
                    <p>Мгновенная доставка</p>
                    <p class="small">Ключи сразу после оплаты</p>
                </div>
                <div class="block">
                    <img src="img/feature3.png" alt="Поддержка">
                    <p>Поддержка 24/7</p>
                    <p class="small">Помощь в любое время</p>
                </div>
                <div class="block">
                    <img src="img/feature4.png" alt="Бонусы">
                    <p>Бонусная программа</p>
                    <p class="small">Кэшбэк до 10%</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container email">
        <h3>Подписка на новости</h3>
        <p>Получайте информацию о новых играх и специальных предложениях первыми</p>
        <div class="block">
            <div>
                <h4>Будьте в курсе</h4>
                <p>Подпишитесь и получайте эксклюзивные скидки и информацию о новых релизах</p>
            </div>
            <div>
                <input type="email" id="emailField" placeholder="Введите ваш email">
                <button onclick="checkEmail()">Подписаться</button>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2025 GameStore. Все права защищены.</p>
    </footer>

    <script>
        function checkEmail() {
            let email = document.querySelector('#emailField').value;
            if (!email.includes('@')) alert('Пожалуйста, укажите символ @ в email');
            else if (!email.includes('.')) alert('Email должен содержать точку после @');
            else alert('Спасибо за подписку! Вы получите письмо с подтверждением.');
        }
    </script>
</body>

</html>