<?php

@include 'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Главная | Кафе «Олимпия»</title>
    
   <!-- шрифт awesome cdn ссылка -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- ссылка на файл css -->
   <link rel="stylesheet" href="css/style.css">

   <link type="image/png" sizes="16x16" rel="icon" href="images/icons8-мешок-муки-16.png">
   <link type="image/png" sizes="32x32" rel="icon" href="images/icons8-мешок-муки-32.png">
   <link type="image/png" sizes="96x96" rel="icon" href="images/icons8-мешок-муки-96.png">

</head>
<body>
   
<?php @include 'hd.php'; ?>

<section class="home">

   <div class="content">
      <h3>Добро пожаловать</h3>
      <p>Кафе “Олимпия” - это атмосферное место для отдыха и вкусной еды.</p>
      <a href="about.php" class="btn">Подробнее</a>
   </div>

</section>

<?php include 'about_section.php'; ?>

<section class="products">

   <h1 class="title">Наши лучшие блюда</h1>

   <div class="box-container">
    <?php
    $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 3") or die('query failed');
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){
            $name = explode("Состав", $fetch_products['name'])[0];
            ?>
            <form action="" method="POST" class="box">
                <div class="price"><?php echo $fetch_products['price']; ?> р.</div>
                <img src="images/<?php echo $fetch_products['image']; ?>" alt="" class="image">
                <div class="name"><?php echo $name; ?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $name; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            </form>
            <?php
        }
    }else{
        echo '<p class="empty">Продукты еще не добавлены!</p>';
    }
    ?>
</div>

   <div class="more-btn">
      <a href="login.php" class="option-btn">Посмотреть все</a>
   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>У вас есть вопросы?</h3>
      <p> Мы всегда готовы ответить на любые ваши вопросы. Надеемся, что наше письмо было вам полезно и информативно. Если вы хотите узнать больше, обращайтесь к нашей службе поддержки. Также, не стесняйтесь сообщать нам о любых трудностях или проблемах. </p>
      <a href="login.php" class="btn">Написать</a>
   </div>

</section>



<?php @include 'ft.php'; ?>


<div class="loader-container">
   <img src="images/loader.gif" alt="">        

</div>

 <script src="js/inscript.js"></script>
</body>
</html>