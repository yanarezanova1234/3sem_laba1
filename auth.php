<?php

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass =md5($pass."qwerttyu12");

$mysql = new mysqli('localhost','root','root','lodin-bd');

$result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass' ");
$user=$result->fetch_assoc();
if($result->num_rows==0) {
  echo "Такой пользователь не найден";
  exit();
}

setcookie('user', $user['name'], time() +3600 , "/");

$mysql -> close();

header('Location: /lodin/index.php');

?>
