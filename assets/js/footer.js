document.addEventListener("DOMContentLoaded", () => {
  const footerAccordions = document.querySelectorAll(".site-footer details");

  const syncFooterAccordions = () => {
    const isTabletUp = window.innerWidth >= 768;

    footerAccordions.forEach((item) => {
      if (isTabletUp) {
        item.setAttribute("open", "");
      } else {
        item.removeAttribute("open");
      }
    });
  };

  syncFooterAccordions();
  window.addEventListener("resize", syncFooterAccordions);
});
