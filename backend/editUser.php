<?
session_start();

include('connection.php');

$id = $_POST['id'];
$login = $_POST['login'];
$is_sha = isset($_POST['sha']);
$password = $_POST['password'];
$role = $_POST['role'];
$last_auth = $_POST['last_auth'];

if($is_sha) {
  $password = sha1($password);
}

$query = "UPDATE `users` SET `login` = '$login', `password` = '$password', `role` = '$role', `last_auth` = '$last_auth' WHERE `users`.`id` = '$id'";

mysqli_query($connection, $query);
var_dump($id, $login, $password, $is_sha);
header('Location: ../index.php');