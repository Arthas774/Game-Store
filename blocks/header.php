<header class="container">
    <span class="logo">GameStore</span>
    <nav>
        <ul>
            <li ><a href="/">Главная</a></li>
<!--            <li><a href="/catalog.html">Каталог</a></li>-->
            <li><a href="about.php">О нас</a></li>


            <?php
            if(isset($_COOKIE['login']))
                echo '<li><a href="/user.php">Кабинет пользователя</a></li>';
            else
                echo '<li><a href="auth.php">Авторизация</a></li>
            <li class="btn"><a href="reg.php">Регистрация</a></li>'
              ?>
        </ul>
    </nav>
</header>