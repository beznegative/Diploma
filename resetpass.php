<?php

@include 'config.php';

if(isset($_POST['submit'])){

 $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
 $name = mysqli_real_escape_string($conn, $filter_name);
 $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
 $email = mysqli_real_escape_string($conn, $filter_email);

 $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND name = '$name'") or die('query failed');

 if(mysqli_num_rows($select_users) > 0){
 // Пользователь существует
 if(isset($_POST['newpass']) && isset($_POST['cnewpass'])){
 $filter_newpass = filter_var($_POST['newpass'], FILTER_SANITIZE_STRING);
 $newpass = mysqli_real_escape_string($conn, md5($filter_newpass));
 $filter_cnewpass = filter_var($_POST['cnewpass'], FILTER_SANITIZE_STRING);
 $cnewpass = mysqli_real_escape_string($conn, md5($filter_cnewpass));

 if($newpass != $cnewpass){
 $message[] = 'Пароли не совпадают!';
 }else{
 mysqli_query($conn, "UPDATE `users` SET password='$newpass' WHERE email='$email' AND name='$name'") or die('query failed');
 $message[] = 'Пароль успешно изменен!';
 header("refresh:3;url=login.php");
 }
 }
 }else{
 // Пользователь не существует
 $message[] = 'Пользователь не существует!';
 }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Сброс пароля | Кафе «Олимпия»</title>

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

 <form action="" method="post">
 <h3>Сброс пароля</h3>
 <input type="text" name="name" class="box" placeholder="Введите имя пользователя" required>
 <input type="email" name="email" class="box" placeholder="Введите свой email" required>
 <input type="password" name="newpass" class="box" placeholder="Введите новый пароль">
 <input type="password" name="cnewpass" class="box" placeholder="Подтвердите новый пароль">
 <input type="submit" class="btn" name="submit" value="Сбросить пароль">
 <p>У вас нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
 <p>У вас есть аккаунт<a href="login.php">Войти</a></p>
 </form>

</section>

</body>
</html>
