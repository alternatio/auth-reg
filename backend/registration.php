<?
session_start();
include('connection.php');
include('globalFunctions.php');

$login = trim($_POST['login']);
$password = sha1(trim($_POST['password']));

function registration(mysqli $connection, string $login, string $password)
{
  $count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' && `password` = '$password'");

  if (mysqli_num_rows($count) == 0) {

    $add_user_query = "INSERT INTO `users` (`id`, `login`, `password`, `role`, `last_auth`) VALUES (NULL, '$login', '$password', '2', CURRENT_TIMESTAMP)";

    $connection->query($add_user_query);

    set_message('Пользователь создан');
    back();
    return;

  } else {
    set_message('Пользователь существует');
    back();
  }
}

registration($connection, $login, $password);