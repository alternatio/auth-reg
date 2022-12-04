<?
session_start();
include('backend/connection.php');
include('frontend/layouts/mainTop.php');
include('frontend/layouts/header.php');
include('backend/globalFunctions.php');
?>

<main class="main">
  <?
  if (!isset($_SESSION['user'])) {
    echo
      '<div class="description">
        Войдите в свой аккаунт чтобы просматривать свою информацию.
      </div>';
  }

  ?>

  <div class="blocks">
    <?
    if (isset($_SESSION['user'])) {

      if ($_SESSION['user']['role'] == 1) {

        $users = mysqli_query($connection, "SELECT * FROM `users`");
        $result = [];

        while ($row = mysqli_fetch_assoc($users)) {
          array_push($result, $row);
        }
        $_SESSION['users'] = $result;

        foreach ($_SESSION['users'] as $item) {
          paint_user($item);
        }

      } else if ($_SESSION['user']['role'] == 2) {
        paint_user($_SESSION['user']);
      }
    }
    ?>
  </div>

</main>

<? include('frontend/layouts/mainBottom.php') ?>