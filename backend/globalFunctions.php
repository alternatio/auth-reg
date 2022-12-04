<?

function back()
{
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function set_message(string $message)
{
  $_SESSION['message'] = $message;
}

function paint_user(array $data)
{
  echo "
    <div class='block' method='post' action='backend/edit.php'>
      <h4>ID:
        " . $data['id'] . "
      </h4>
      <p>Логин:
        " . $data['login'] . "
      </p>
      <p>Пароль:
        " . $data['password'] . "
      </p>
      <p>Роль:
        " . $data['role'] . "
      </p>
      <p>Последний вход :
        " . $data['last_auth'] . "
      </p>
    ";
  if (isset($_SESSION['users'])) {
    echo "
        <form action='edit.php' method='post'>
          <button class='edit-button' name='id' value=" . $data['id'] . ">
            Изменить
          </button>
        </form>
      </div>";
  } else {
    echo "</div>";
  }
}
?>