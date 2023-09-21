<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `payment` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_payments.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Оплата | Кафе «Олимпия»</title>

   <!-- шрифт awesome cdn ссылка -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- ссылка на файл css -->
   <link rel="stylesheet" href="css/admin_style.css">

   <link type="image/png" sizes="16x16" rel="icon" href="images/icons8-мешок-муки-16.png">
   <link type="image/png" sizes="32x32" rel="icon" href="images/icons8-мешок-муки-32.png">
   <link type="image/png" sizes="96x96" rel="icon" href="images/icons8-мешок-муки-96.png">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="placed-orders">
 
   <h1 class="title">Оплата</h1>

   <div class="box-container">

      <?php
      
      $select_orders = mysqli_query($conn, "SELECT * FROM `payment`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> Order id : <span><?php echo $fetch_orders['order_id']; ?></span> </p>
         <p> Имя : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Почта : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <img src="<?php echo $fetch_orders['image']; ?>" style="height:60rem;width:30rem;" alt="">
         <a href="admin_payments.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Удалить эту оплату?')">Удалить</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Ни один платеж еще не произведен!</p>';
      }
      ?>
   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>