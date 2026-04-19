document.addEventListener("DOMContentLoaded", () => {
  const replaceCheckoutSummaryTitle = () => {
    document
      .querySelectorAll(
        ".wc-block-components-checkout-order-summary__title-text",
      )
      .forEach((title) => {
        if (title.textContent.trim() === "Rekapitulace objednávky") {
          title.textContent = "Přehled objednávky";
        }
      });
  };

  replaceCheckoutSummaryTitle();

  const observer = new MutationObserver(() => {
    replaceCheckoutSummaryTitle();
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
});
