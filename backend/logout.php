<?
session_start();
unset($_SESSION['user']);
unset($_SESSION['users']);
header('Location: ../index.php');