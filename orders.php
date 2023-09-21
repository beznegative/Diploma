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
   <title>Заказы | Кафе «Олимпия»</title>

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
    <h3>Ваши заказы</h3>
    <p> <a href="home.php">Главная</a> / Заказы </p>
</section>

<section class="placed-orders">

    <h1 class="title">Размещённые заказы</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> Размещён : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> Имя : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Номер : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Почта : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Адрес : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> Способ оплаты : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> Ваши заказ: <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Общая стоимось : <span><?php echo $fetch_orders['total_price']; ?> р.</span> </p>
        <p> Статус оплаты: <span style="color:<?php if($fetch_orders['payment_status'] == 'В ожидании'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">Заказов еще нет!</p>';
    }
    ?>
    </div>

</section>







 <?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>