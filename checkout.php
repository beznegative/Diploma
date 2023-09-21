<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}; 

$order_id = rand(11111,99999);

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'Кв.№ '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(' ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'Ваша корзина пуста!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'Заказ уже сделан!';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on, order_id) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on', '$order_id')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'Заказ сделан успешно!';
        $_SESSION['order_id'] = $order_id;
        if($_POST['method'] != 'Оплата при получении'){
            header("location:QR_page.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Оформление заказа | Кафе «Олимпия»</title>

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
    <h3>Оформление заказа</h3>
    <p> <a href="home.php">Главная</a> / Оформление заказа </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo ''.$fetch_cart['price'].'р'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">Ваша корзина пуста</p>';
        }
    ?>
    <div class="grand-total">К оплате : <span><?php echo $grand_total; ?> р.</span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>Разместите свой заказ</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Ваше имя :</span>
                <input type="text" name="name" placeholder="Введите свое имя" required>
            </div>
            <div class="inputBox">
                <span>Ваш номер :</span>
                <input type="text" name="number"  minlength="11" maxlength="11" placeholder="Введите свой номер" required onkeypress="return onlyNumberKey(event)"> 
            </div>
            <div class="inputBox">
                <span>Ваша почта :</span>
                <input type="email" name="email" placeholder="Введите свою почту" required>
            </div>
            <div class="inputBox">
                <span>Способ оплаты :</span>
                <select name="method">
                    <option value="Оплата при получении">Оплата при получении</option>
                    <option value="Сбербанк">Сбербанк</option>
                    <option value="СБП">СБП</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Номер квартиры и дома :</span>
                <input type="text" name="flat" placeholder="Пример: д.10 кв.1" required>
            </div>
            <div class="inputBox">
                <span>Название улицы :</span>
                <input type="text" name="street" placeholder="Пример: Пушкино" required>
            </div>
            <div class="inputBox">
                <span>Город :</span>
                <input type="text" name="city" value="Иваново" placeholder="Пример: Иваново" required>
            </div>
            <div class="inputBox">
                <span>Область :</span>
                <input type="text" name="state" value="Ивановская Область" placeholder="Пример: Ивановская Область" required> 
            </div>
            <div class="inputBox">
               <span>Страна :</span>
               <input type="text" name="country" value="Россия" placeholder="Пример: Россия" required>
            </div>
            <div class="inputBox">
                <span>Номер вашей карты :</span>
                <input type="text" name="pin_code"  minlength="16" maxlength="16" placeholder="Пример: 1234 1234 1234 1234" required onkeypress="return onlyNumberKey(event)"> 
            </div>
        </div>

        <input type="submit" name="order" value="Заказать" class="btn">

    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>