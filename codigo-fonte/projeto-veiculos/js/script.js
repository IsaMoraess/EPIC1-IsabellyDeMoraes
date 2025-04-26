document.addEventListener("DOMContentLoaded", () => {
  const welcomeMessage = document.createElement("div");
  welcomeMessage.classList.add("welcome-message");
  welcomeMessage.innerText =
    "Bem-vindo ao sistema de gerenciamento de veículos!";
  document.body.prepend(welcomeMessage);

  setTimeout(() => {
    welcomeMessage.style.transition = "opacity 1s ease";
    welcomeMessage.style.opacity = 0;
  }, 5000);
});
