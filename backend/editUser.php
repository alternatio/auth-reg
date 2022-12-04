<?
session_start();

include('connection.php');

$id = $_POST['id'];
$login = $_POST['login'];
$password = sha1($_POST['password']);
$role = $_POST['role'];
$last_auth = $_POST['last_auth'];

$query = "UPDATE `users` SET `login` = '$login', `password` = '$password', `role` = '$role', `last_auth` = '$last_auth' WHERE `users`.`id` = '$id'";

mysqli_query($connection, $query);
var_dump($id, $login, $password, $role);
header('Location: ../index.php');