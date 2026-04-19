document.addEventListener("DOMContentLoaded", () => {
  const notice = document.querySelector(
    "body.woocommerce-account .woocommerce-notices-wrapper .woocommerce-message, body.woocommerce-account .woocommerce-notices-wrapper .woocommerce-error, body.woocommerce-account .woocommerce-notices-wrapper .woocommerce-info",
  );

  if (!notice || notice.classList.contains("woo-account-notice-modal")) return;

  const overlay = document.createElement("div");
  overlay.className = "woo-account-notice-overlay";

  const closeBtn = document.createElement("button");
  closeBtn.type = "button";
  closeBtn.className = "woo-account-notice-close";
  closeBtn.setAttribute("aria-label", "Zavřít upozornění");
  closeBtn.textContent = "×";

  let autoCloseTimer;

  const closeNotice = () => {
    if (autoCloseTimer) {
      clearTimeout(autoCloseTimer);
    }

    document.removeEventListener("keydown", handleEsc);
    overlay.remove();
    notice.remove();
    document.body.classList.remove("woo-account-notice-open");
  };

  const handleEsc = (event) => {
    if (event.key === "Escape") {
      closeNotice();
    }
  };

  notice.classList.add("woo-account-notice-modal");
  notice.prepend(closeBtn);
  document.body.appendChild(overlay);
  document.body.classList.add("woo-account-notice-open");

  closeBtn.addEventListener("click", closeNotice);
  overlay.addEventListener("click", closeNotice);
  document.addEventListener("keydown", handleEsc);

  autoCloseTimer = setTimeout(closeNotice, 3500);
});
