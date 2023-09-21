<?php

@include 'config.php';

if(isset($_POST['submit'])){

 $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
 $name = mysqli_real_escape_string($conn, $filter_name);
 $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
 $email = mysqli_real_escape_string($conn, $filter_email);
 $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
 $pass = mysqli_real_escape_string($conn, md5($filter_pass));
 $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
 $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

 $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

 if(mysqli_num_rows($select_users) > 0){
 $message[] = 'Пользователь уже существует!';
 }else{
 if($pass != $cpass){
 $message[] = 'Пароли не совпадают!';
 }else{
 mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
 $message[] = 'Успешная регистрация!';
 header('location:login.php');
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
 <title>Регистрация | Кафе «Олимпия»</title>

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
 <h3>Зарегистрироваться</h3>
 <input type="text" name="name" class="box" placeholder="Введите имя русскими буквами" pattern="[А-Яа-яЁё\s]+" required>
 <input type="email" name="email" class="box" placeholder="Введите свой email" required>
 <input type="password" name="pass" class="box" placeholder="Введите пароль от 8 символов" minlength="8" required>
 <input type="password" name="cpass" class="box" placeholder="Подтвердите пароль" minlength="8" required>
 <input type="submit" class="btn" name="submit" value="Зарегистрироваться">
 <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
 <p><a href="resetpass.php">Забыли пароль!</a></p>
 </form>

</section>

</body>
</html>
