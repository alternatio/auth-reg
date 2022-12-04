const handleRegistrationPopup = () => {
  const popupWrapper = document.querySelector(".popup-wrapper")
  const registrationPopup = document.querySelector(".registration-popup")

  registrationPopup.classList.toggle("none")
  popupWrapper.classList.toggle("none")
}

const handleAuthorizationPopup = () => {
  const popupWrapper = document.querySelector(".popup-wrapper")
  const authorizationPopup = document.querySelector(".authorization-popup")

  authorizationPopup.classList.toggle("none")
  popupWrapper.classList.toggle("none")
}