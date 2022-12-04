<?
session_start();

include('connection.php');
include('globalFunctions.php');

$login = trim($_POST['login']);
$password = sha1(trim($_POST['password']));

function authorization(mysqli $connection, string $login, string $password): void
{
  $user = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
  $user_assoc = mysqli_fetch_assoc($user);

  if (mysqli_num_rows($user) == 0) {

    set_message('Неправильный пароль или логин');
    back();
    return;

  } else {
    $id = $user_assoc['id'];
    $update_history_auth_query = "UPDATE `users` SET `last_auth` = CURRENT_TIMESTAMP WHERE `users`.`id` = '$id'";

    mysqli_query($connection, $update_history_auth_query);

    $add_auth_history_query = "INSERT INTO `auth_history` (`id`, `date`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '$id');";

    mysqli_query($connection, $add_auth_history_query);

    set_message("Добро пожаловать! '$login'");

    $_SESSION['user'] = $user_assoc;
    back();
  }
}

authorization($connection, $login, $password);