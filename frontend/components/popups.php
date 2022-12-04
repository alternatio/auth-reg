<div class="popup-wrapper none">
  <!-- reg -->
  <form class="popup registration-popup none" method="post" action="backend/registration.php">
    <header class="popup__header">
      <div onclick="handleRegistrationPopup()" class="button-close">
        ⨉
      </div>
      <h3 class="popup__title">
        Registration
      </h3>
    </header>
    <label class="popup__label">
      <input class="popup__input" type="text" placeholder="Логин" name="login" required>
    </label>
    <label class="popup__label">
      <input class="popup__input" type="text" placeholder="Пароль" name="password" required>
    </label>
    <?
    if (isset($_SESSION['message'])) {
      echo '<p class="message">' . $_SESSION['message'] . '</p>';
    }
    ?>
    <button class="button" type="submit">
      Готово
    </button>
  </form>

  <!-- auth -->
  <form class="popup authorization-popup none" method="post" action="backend/authorization.php">
    <header class="popup__header">
      <div onclick="handleAuthorizationPopup()" class="button-close">
        ⨉
      </div>
      <h3 class="popup__title">
        Authorization
      </h3>
    </header>
    <label class="popup__label">
      <input class="popup__input" type="text" placeholder="Логин" name="login" required>
    </label>
    <label class="popup__label">
      <input class="popup__input" type="text" placeholder="Пароль" name="password" required>
    </label>
    <?
    if (isset($_SESSION['message'])) {
      echo '<p class="message">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
    <button class="button" type="submit">
      Готово
    </button>
  </form>
</div>