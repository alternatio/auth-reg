<?
session_start();

include('backend/connection.php');
include('backend/globalFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <style>
    <? include('frontend/layouts/defaultStyles.php');
    ?>
  </style>
</head>

<body>
  <main class="main edit-main">
    <?
    function edit_user($connection): void
    {
      if ($_SESSION['user']['role'] == 1) {
        $id = $_POST['id'];
        $current_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$id'");
        $current_user_assoc = mysqli_fetch_assoc($current_user);
        $login = $current_user_assoc['login'];
        $password = $current_user_assoc['password'];
        $role = $current_user_assoc['role'];
        $last_auth = $current_user_assoc['last_auth'];

        echo "
        <form class='popup edit-popup' method='post' action='backend/editUser.php'>
          <div class='inputs'>
            <div class='line'>
              ID:
              <label class='popup__label'>
                <input name='id' value='$id'/>
              </label>
            </div>
            <div class='line'>
              Login:
              <label class='popup__label'>
                <input name='login' value='$login'/>
              </label>
            </div>
            <div class='line'>
              Password (change to SHA-1):
              <label class='popup__label'>
                <input name='password' value='$password'/>
              </label>
              Шифорвание:
              <label>
                <input type='checkbox' name='sha'>
              </label>
            </div>
            <div class='line'>
              Role:
              <label class='popup__label'>
                <input name='role' value='$role'/>
              </label>
            </div>
            <div class='line'>
              Last auth:
              <label class='popup__label'>
                <input name='last_auth' value='$last_auth'/>
              </label>
            </div>
          </div>
          <button class='button'>
            Готово
          </button>
        </form>  
      ";
      } else {
        echo 'Вы даже не администратор';
      }
    }

    edit_user($connection);
    ?>
  </main>
</body>

</html>