<?php
    @include 'config.php';
    session_start();

    $order_id = $_SESSION['order_id'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $order_id = $_POST['order_id'];

        // Обработка загруженного изображения
        if(isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $file_error = $file['error'];

            if($file_error === 0) {
                $file_destination = 'images/' . $file_name;
                move_uploaded_file($file_tmp_name, $file_destination);
            }
        }

        // Сохранение информации о платеже в базе данных
        $success = mysqli_query($conn, "INSERT INTO `payment`(order_id, name, email, image) VALUES('$order_id', '$name', '$email', '$file_destination')") or die('query failed');
        if($success){
            $message[] = 'Платеж успешно получен!';
            header("location:home.php");
        } else {
            die('query failed');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Завершеннение заказа</title>

   <!-- шрифт awesome cdn ссылка -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- ссылка на файл css -->
   <link rel="stylesheet" href="css/style.css">

   <link type="image/png" sizes="16x16" rel="icon" href="images/icons8-мешок-муки-16.png">
   <link type="image/png" sizes="32x32" rel="icon" href="images/icons8-мешок-муки-32.png">
   <link type="image/png" sizes="96x96" rel="icon" href="images/icons8-мешок-муки-96.png">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Оплатите прямо сейчас</h3>
      <h3>#<?php echo $order_id; ?></h3>
      <img src="./images/QR_img.jpg" style="height:25rem;" alt="qr">
      <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
      <h3>Загрузите скриншот завершенной транзакции</h3>
      <input type="file" name="image" class="box" placeholder="Загрузите скриншот завершенной оплаты" required>
      <input type="name" name="name" class="box" placeholder="Имя пользователя" value="<?php echo $_SESSION['user_name'] ?>" required>
      <input type="email" name="email" class="box" placeholder="Ваша почта" value="<?php echo $_SESSION['user_email'] ?>" required>
      <input type="submit" class="btn" name="submit" value="Потвердить оплатиту">
   </form>

</section>

</body>
</html>