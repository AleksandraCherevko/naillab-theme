document.addEventListener("DOMContentLoaded", () => {
  const carousels = document.querySelectorAll(".catalog-carousel");

  carousels.forEach((carousel) => {
    const track = carousel.querySelector(".catalog-row .products");
    const prevBtn = carousel.querySelector(".catalog-arrow.prev");
    const nextBtn = carousel.querySelector(".catalog-arrow.next");

    if (!track || !prevBtn || !nextBtn) return;

    const updateArrows = () => {
      const maxScroll = track.scrollWidth - track.clientWidth;

      prevBtn.classList.toggle("is-hidden", track.scrollLeft <= 4);
      nextBtn.classList.toggle("is-hidden", track.scrollLeft >= maxScroll - 4);
    };

    prevBtn.addEventListener("click", () => {
      track.scrollBy({ left: -300, behavior: "smooth" });
    });

    nextBtn.addEventListener("click", () => {
      track.scrollBy({ left: 300, behavior: "smooth" });
    });

    track.addEventListener("scroll", updateArrows);
    window.addEventListener("resize", updateArrows);

    updateArrows();

    carousel.updateArrows = updateArrows;
  });

  const moreBtn = document.querySelector(".catalog-more-btn");
  const hiddenBlock = document.querySelector(".catalog-more");

  if (moreBtn && hiddenBlock) {
    moreBtn.addEventListener("click", () => {
      const isHidden = hiddenBlock.classList.contains("is-hidden");

      hiddenBlock.classList.toggle("is-hidden");
      moreBtn.textContent = isHidden ? "Zobrazit méně" : "Zobrazit více";

      requestAnimationFrame(() => {
        document.querySelectorAll(".catalog-carousel").forEach((carousel) => {
          if (typeof carousel.updateArrows === "function") {
            carousel.updateArrows();
          }
        });

        if (!isHidden) {
          hiddenBlock.scrollIntoView({ behavior: "smooth", block: "start" });
        }
      });
    });
  }
});
