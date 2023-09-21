<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>О нас | Кафе «Олимпия»</title>

   <!-- шрифт awesome cdn ссылка -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- ссылка на файл css -->
   <link rel="stylesheet" href="css/style.css">

   <link type="image/png" sizes="16x16" rel="icon" href="images/icons8-мешок-муки-16.png">
   <link type="image/png" sizes="32x32" rel="icon" href="images/icons8-мешок-муки-32.png">
   <link type="image/png" sizes="96x96" rel="icon" href="images/icons8-мешок-муки-96.png">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>О нас</h3>
    <p> <a href="home.php">Главная</a> / О нас </p>
</section>

<section class="about">

    <div class="flex">

        
        <div class="content">
            <h3>Почему именно мы?</h3>
            <p>Вы должны выбрать именно это кафе, потому что оно предлагает вам высокое качество обслуживания, разнообразный выбор блюд и напитков, приятную атмосферу и доступные цены. Кафе “Олимпия” - это место, где вы можете отдохнуть от суеты, пообщаться с друзьями, насладиться музыкой и вкусной едой. Кафе “Олимпия” - это место, которое вы полюбите с первого взгляда.</p>
            <a href="shop.php" class="btn">Заказать сейчас</a>
        </div>
        
        <div class="image">
            <img src="images/a1.jpg" alt="">
        </div>
    </div>

    <div class="flex">
        
        <div class="content">
            <h3>Что мы предлагаем?</h3>
            <p>Мы заботимся о качестве наших продуктов и соблюдаем все санитарные нормы и стандарты. Наш шеф-повар готовит блюда из свежих и натуральных ингредиентов, используя лучшие рецепты мировой кухни. Вы можете выбрать любое блюдо из нашего меню по вашему вкусу. Мы также предлагаем доставку еды на дом или в офис.</p>
            <a href="contact.php" class="btn">Связаться с нами</a>
        </div>
        
        <div class="image">
            <img src="images/a2.jpg" alt="">
        </div>

    <div class="flex">

        <div class="image">
            <img src="images/a3.jpg" alt="">
        </div>

        <div class="content">
            <h3>Кто мы есть?</h3>
            <p>Мы - команда профессионалов, которые занимаются созданием, украшением и обслуживанием кафе. Мы любим свою работу и стремимся к тому, чтобы наши гости были счастливы и наслаждались вкусной едой.</p>
            <a href="#reviews" class="btn">Отзывы клиентов</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Отзывы клиентов</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Кафе “Олимпия” - это отличное место для обеда или ужина. Я был там с коллегами по работе и мы все остались довольны. Кафе просторное и светлое, музыка не громкая и не мешает разговору. Обслуживание быстрое и качественное, официанты вежливые и знают меню.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Андрей Смирнов</h3>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Я посетила это кафе с подругами на прошлой неделе и осталась очень довольна.Меню разнообразное и аппетитное, порции большие и сытные. Мы заказали салат, пиццу и напитки.Рекомендую это кафе всем, кто хочет провести приятный вечер в хорошей компании.”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Елена Иванова</h3>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Неоднократно посещал это кафе после работы.  Еда вкусная и свежая, выбор блюд большой и разнообразный.Все было приготовлено на высшем уровне. Цены адекватные для такого кафе. Я обязательно вернусь сюда еще раз и порекомендую это кафе своим друзьям.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Николай Соколов</h3>
        </div>

        <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>Отличная доставка! Заказ пришел быстро и горячий, еда вкусная и свежая, порции большие и сытные. Очень довольна сервисом и качеством. Спасибо кафе “Олимпия” за прекрасный обед!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Мария Смирнова</h3>
        </div>

        <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>Заказ приехал оперативно и ароматный, еда вкусная и аппетитная, порции щедрые и насыщенные. Очень рада сервису и качеству. Один из лучших, чтобы заказывать в обед на работу.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Сергей Кузнецов</h3>
        </div>

        <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Хорошая доставка! Заказ пришел довольно быстро и теплый, еда вкусная и свежая, порции достаточные и сытные. Единственный минус - не хватило салфеток и приборов. В целом довольна сервисом и качеством.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Елена Яшина</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>