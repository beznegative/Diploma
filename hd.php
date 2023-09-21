<header class="header">

    <div class="flex">

        <!-- <a href="index.php" class="logo">Кафе «Олимпия»</a> -->
        <a href="index.php" class="logo"><span style="color: #2ab336">Олимпия</span>Food</a>

        <nav class="navbar">
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="#">Информация</a>
                    <ul>
                        <li><a href="about.php" onclick="event.preventDefault(); alert('Войдите на сайт, чтобы продолжить!')">О нас</a></li>
                        <li><a href="contact.php" onclick="event.preventDefault(); alert('Войдите на сайт, чтобы продолжить!')">Помощь</a></li>
                    </ul>
                </li>
                <li><a href="shop.php" onclick="event.preventDefault(); alert('Войдите на сайт, чтобы продолжить!')">Меню</a></li>
                <li><a href="orders.php" onclick="event.preventDefault(); alert('Войдите на сайт, чтобы продолжить')">Заказы</a></li>
                <li>
                    <a class="auth-link" href="#">Авторизуйтесь</a>
                     <ul>
                        <a href="login.php">Войти</a>
                 <li><a href="register.php">Регистрация</a></li>
                    </ul>
                 </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="login.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user" onclick="window.location.href='login.php'"></div>
            <a href="login.php"><i class="fas fa-heart"></i><span></span></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span></span></a>
        </div>

        
        <div class="account-box" onclick="window.location.href='login.php'">

        </div>

    </div>

</header>