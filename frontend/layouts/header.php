<header class="header">
  <div class="header__logo">
    M
  </div>
  <div class="header__buttons">
    <?
    if (!isset($_SESSION['user'])) {
      echo 
      '
      <button class="button" onclick="handleRegistrationPopup()">
        Регистрация
      </button>
      <button class="button" onclick="handleAuthorizationPopup()">
        Авторизация
      </button>
      ';
    } else {
      echo
      '
      <form action="backend/logout.php">
        <button class="button">
          Выход
        </button>
      </form>
      ';
    }
    ?>
  </div>
</header>