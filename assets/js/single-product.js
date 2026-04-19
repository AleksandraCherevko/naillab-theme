document.addEventListener("DOMContentLoaded", () => {
  const descriptionTab = document.querySelector("#tab-description");

  if (descriptionTab) {
    const collapsedHeight = 180;

    if (descriptionTab.scrollHeight > collapsedHeight) {
      descriptionTab.classList.add("is-collapsed");

      const button = document.createElement("button");
      button.type = "button";
      button.className = "product-tab-toggle";
      button.textContent = "Zobrazit více";
      button.setAttribute("aria-expanded", "false");

      const updateState = () => {
        const isCollapsed = descriptionTab.classList.contains("is-collapsed");
        button.textContent = isCollapsed ? "Zobrazit více" : "Zobrazit méně";
        button.setAttribute("aria-expanded", String(!isCollapsed));
      };

      button.addEventListener("click", () => {
        descriptionTab.classList.toggle("is-collapsed");
        updateState();
      });

      descriptionTab.insertAdjacentElement("afterend", button);
      updateState();
    }
  }

  const qtyInput = document.querySelector(
    ".single-product form.cart input.qty",
  );

  if (qtyInput) {
    qtyInput.addEventListener("input", () => {
      const min = Number(qtyInput.min) || 1;
      const max = qtyInput.max ? Number(qtyInput.max) : null;
      let value = Number(qtyInput.value) || min;

      if (value < min) value = min;
      if (max !== null && value > max) value = max;

      qtyInput.value = value;
    });
  }

  const wooNotice = document.querySelector(
    ".single-product .woocommerce-error, .single-product .woocommerce-message, .single-product .woocommerce-info",
  );

  if (wooNotice) {
    const overlay = document.createElement("div");
    overlay.className = "woo-notice-overlay";

    const closeBtn = document.createElement("button");
    closeBtn.type = "button";
    closeBtn.className = "woo-notice-close";
    closeBtn.setAttribute("aria-label", "Zavrit upozorneni");
    closeBtn.textContent = "×";

    const forwardBtn = wooNotice.querySelector(".wc-forward, .button");
    let autoCloseTimer;

    const handleEsc = (event) => {
      if (event.key === "Escape") {
        closeNotice();
      }
    };

    const closeNotice = () => {
      if (autoCloseTimer) {
        clearTimeout(autoCloseTimer);
      }

      if (document.activeElement) {
        document.activeElement.blur();
      }

      document.removeEventListener("keydown", handleEsc);
      overlay.remove();
      wooNotice.remove();
      document.body.classList.remove("woo-notice-open");
    };

    wooNotice.classList.add("woo-notice-modal");
    wooNotice.prepend(closeBtn);
    document.body.appendChild(overlay);
    document.body.classList.add("woo-notice-open");

    closeBtn.addEventListener("click", closeNotice);
    overlay.addEventListener("click", closeNotice);

    if (forwardBtn) {
      forwardBtn.addEventListener("click", closeNotice);
    }

    document.addEventListener("keydown", handleEsc);

    autoCloseTimer = setTimeout(() => {
      closeNotice();
    }, 3000);
  }
});
