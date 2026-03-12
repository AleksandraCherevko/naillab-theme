// mobile menu toggle

document.addEventListener("DOMContentLoaded", () => {
  const burger = document.querySelector(".burger");
  const menu = document.querySelector("#mobile-menu");
  const closeBtn = document.querySelector(".mobile-menu__close");

  if (!burger || !menu) return;

  const openMenu = () => {
    burger.setAttribute("aria-expanded", "true");
    menu.setAttribute("aria-hidden", "false");
    menu.classList.add("is-open");
  };

  const closeMenu = () => {
    burger.setAttribute("aria-expanded", "false");
    menu.setAttribute("aria-hidden", "true");
    menu.classList.remove("is-open");
  };

  burger.addEventListener("click", openMenu);
  closeBtn?.addEventListener("click", closeMenu);

  menu.addEventListener("click", (e) => {
    if (e.target === menu) closeMenu();
  });
});
