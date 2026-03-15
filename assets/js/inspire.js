document.addEventListener("DOMContentLoaded", () => {
  const list = document.querySelector(".insp-strip__list");
  const btn = document.querySelector(".insp-strip__toggle");
  if (!list || !btn) return;

  btn.addEventListener("click", () => {
    list.classList.toggle("is-open");
    btn.textContent = list.classList.contains("is-open")
      ? "Skrýt"
      : "Zobrazit více";
  });
});
