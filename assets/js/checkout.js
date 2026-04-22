document.addEventListener("DOMContentLoaded", () => {
  let updateTimer = null;

  const normalize = (text) =>
    text
      .toLowerCase()
      .trim()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "");

  const checkoutText = (element) => element.textContent || "";

  const shippingNotes = [
    {
      keywords: ["doruceni na vydejni misto", "z-box"],
      note: "V ceně dopravy je zahrnuto pojištění zásilky.",
    },
    {
      keywords: ["osobni odber"],
      note: "Osobní odběr je možný pouze po předchozí domluvě. Adresa slouží pouze pro vyzvednutí objednávky, nejedná se o kamennou prodejnu.",
    },
  ];

  const scheduleUpdate = () => {
    clearTimeout(updateTimer);

    updateTimer = setTimeout(() => {
      updateCheckout();
    }, 120);
  };

  const replaceCheckoutSummaryTitle = () => {
    document
      .querySelectorAll(
        ".wc-block-components-checkout-order-summary__title-text, .checkout-order-summary-block-fill-wrapper .wc-block-components-title",
      )
      .forEach((title) => {
        if (title.textContent.trim() === "Rekapitulace objednávky") {
          title.textContent = "Přehled objednávky";
        }
      });
  };

  const hideMarketingCheckbox = () => {
    document
      .querySelectorAll(".wc-block-components-checkbox")
      .forEach((checkbox) => {
        const text = normalize(checkoutText(checkbox));

        if (
          text.includes("i would like to receive exclusive emails") ||
          text.includes("discounts and product information")
        ) {
          checkbox.remove();
        }
      });
  };

  const replaceNoticeText = () => {
    document
      .querySelectorAll(
        ".wc-block-components-validation-error, .wc-block-components-notice-banner, .wc-block-components-notices",
      )
      .forEach((notice) => {
        const newText = checkoutText(notice)
          .replaceAll("telefon (volitelné)", "telefon")
          .replaceAll("Telefon (volitelné)", "Telefon")
          .replaceAll("křestní jméno", "jméno")
          .replaceAll("Křestní jméno", "Jméno");

        if (notice.textContent !== newText) {
          notice.textContent = newText;
        }
      });
  };

  const replaceCheckoutFieldLabels = () => {
    document.querySelectorAll("label").forEach((label) => {
      const text = label.textContent.trim();

      if (text === "Křestní jméno") {
        label.textContent = "Jméno";
      }

      if (text === "Telefon (volitelné)") {
        label.textContent = "Telefon";
      }
    });

    document
      .querySelectorAll(
        "#shipping-first_name, #billing-first_name, input[name='shipping_first_name'], input[name='billing_first_name']",
      )
      .forEach((input) => {
        input.setAttribute("aria-label", "Jméno");
        input.setAttribute("title", "Jméno");
        input.setAttribute("data-label", "Jméno");
      });

    document
      .querySelectorAll(
        "#shipping-phone, #billing-phone, input[name='shipping_phone'], input[name='billing_phone']",
      )
      .forEach((input) => {
        input.required = true;
        input.setAttribute("required", "required");
        input.setAttribute("aria-required", "true");
        input.setAttribute("aria-label", "Telefon");
        input.setAttribute("title", "Telefon");
        input.setAttribute("data-label", "Telefon");
        input.removeAttribute("aria-describedby");
      });

    document
      .querySelectorAll(
        "[aria-label='Křestní jméno'], [title='Křestní jméno'], [data-label='Křestní jméno']",
      )
      .forEach((element) => {
        element.setAttribute("aria-label", "Jméno");
        element.setAttribute("title", "Jméno");
        element.setAttribute("data-label", "Jméno");
      });

    document
      .querySelectorAll(
        "[aria-label='Telefon (volitelné)'], [title='Telefon (volitelné)'], [data-label='Telefon (volitelné)']",
      )
      .forEach((element) => {
        element.setAttribute("aria-label", "Telefon");
        element.setAttribute("title", "Telefon");
        element.setAttribute("data-label", "Telefon");
      });

    replaceNoticeText();
  };

  const addShippingNotes = () => {
    const options = document.querySelectorAll(
      ".wc-block-components-radio-control__option, #shipping_method li",
    );

    options.forEach((option) => {
      if (option.querySelector(".shipping-method-note")) return;

      const text = normalize(checkoutText(option));
      const match = shippingNotes.find(({ keywords }) =>
        keywords.some((keyword) => text.includes(keyword)),
      );

      if (!match) return;

      const note = document.createElement("small");
      note.className = "shipping-method-note";
      note.textContent = match.note;

      const label = option.querySelector(
        ".wc-block-components-radio-control__label, label",
      );

      if (label) {
        label.insertAdjacentElement("afterend", note);
      } else {
        option.appendChild(note);
      }
    });
  };

  const getSelectedShippingOption = () => {
    const checked = document.querySelector(
      ".wc-block-components-radio-control__input:checked, input[name^='radio-control-']:checked, #shipping_method input[type='radio']:checked",
    );

    if (!checked) return null;

    return checked.closest(".wc-block-components-radio-control__option, li");
  };

  const getSelectedShippingText = () => {
    const option = getSelectedShippingOption();

    if (!option) return "";

    return normalize(checkoutText(option));
  };

  const isHomeDeliverySelected = () => {
    const text = getSelectedShippingText();

    return (
      text.includes("doruceni na adresu") ||
      text.includes("doruceni domu") ||
      (text.includes("zasilkovna") && text.includes("adresu"))
    );
  };

  const isPickupSelected = () => {
    const text = getSelectedShippingText();

    return (
      text.includes("vydejni misto") ||
      text.includes("z-box") ||
      text.includes("osobni odber")
    );
  };

  const updateBodyShippingClass = () => {
    const isHomeDelivery = isHomeDeliverySelected();
    const isPickup = isPickupSelected();

    document.body.classList.toggle(
      "checkout-home-delivery-selected",
      isHomeDelivery,
    );

    document.body.classList.toggle(
      "checkout-pickup-selected",
      !isHomeDelivery && isPickup,
    );
  };

  const openShippingAddressForm = () => {
    const shippingFields = document.querySelector("#shipping-fields");

    if (!shippingFields) return;

    const editButton = shippingFields.querySelector(
      ".wc-block-components-address-card__edit",
    );

    if (!editButton) return;

    const isCollapsed = editButton.getAttribute("aria-expanded") === "false";

    if (isCollapsed) {
      editButton.click();
    }
  };

  const updateShippingAddressMode = () => {
    updateBodyShippingClass();

    if (
      document.body.classList.contains("checkout-pickup-selected") ||
      document.body.classList.contains("checkout-home-delivery-selected")
    ) {
      openShippingAddressForm();
    }
  };

  const updateShippingFieldRequirements = () => {
    const isPickup = document.body.classList.contains(
      "checkout-pickup-selected",
    );

    const isHomeDelivery = document.body.classList.contains(
      "checkout-home-delivery-selected",
    );

    const recipientFields = [
      "#shipping-first_name",
      "#shipping-last_name",
      "#shipping-phone",
    ];

    const addressFields = [
      "#shipping-country",
      "#shipping-address_1",
      "#shipping-address_2",
      "#shipping-city",
      "#shipping-postcode",
    ];

    recipientFields.forEach((selector) => {
      const field = document.querySelector(selector);

      if (!field) return;

      field.disabled = false;
      field.required = true;
      field.setAttribute("required", "required");
      field.setAttribute("aria-required", "true");
      field.removeAttribute("aria-invalid");
    });

    addressFields.forEach((selector) => {
      const field = document.querySelector(selector);

      if (!field) return;

      if (isPickup) {
        field.disabled = true;
        field.required = false;
        field.removeAttribute("required");
        field.removeAttribute("aria-required");
        field.removeAttribute("aria-invalid");
        return;
      }

      if (isHomeDelivery) {
        field.disabled = false;

        if (selector !== "#shipping-address_2") {
          field.required = true;
          field.setAttribute("required", "required");
          field.setAttribute("aria-required", "true");
        }

        if (selector === "#shipping-address_2") {
          field.required = false;
          field.removeAttribute("required");
          field.removeAttribute("aria-required");
        }
      }
    });
  };

  const replaceShippingAddressTitle = () => {
    const title = document.querySelector(
      "#shipping-fields .wc-block-components-title",
    );

    if (!title) return;

    const titleText = document.body.classList.contains(
      "checkout-pickup-selected",
    )
      ? "Údaje pro vyzvednutí"
      : "Údaje pro doručení";

    if (title.textContent !== titleText) {
      title.textContent = titleText;
    }
  };

  const translatePacketaButton = () => {
    document
      .querySelectorAll(".packeta-widget-button a, .packetery-widget-button a")
      .forEach((button) => {
        if (button.textContent.trim() === "Choose pickup point") {
          button.textContent = "Vybrat výdejní místo";
        }
      });
  };

  const updateCheckout = () => {
    replaceCheckoutSummaryTitle();
    hideMarketingCheckbox();
    replaceCheckoutFieldLabels();
    addShippingNotes();
    updateShippingAddressMode();
    updateShippingFieldRequirements();
    replaceShippingAddressTitle();
    translatePacketaButton();
  };

  updateCheckout();

  document.body.addEventListener("change", (event) => {
    if (event.target.matches("input[type='radio']")) {
      scheduleUpdate();
    }
  });

  document.body.addEventListener("click", (event) => {
    if (
      event.target.closest(
        "#shipping-option, #shipping-fields, #payment-method, #order-notes",
      )
    ) {
      scheduleUpdate();
    }
  });

  const observer = new MutationObserver(() => {
    scheduleUpdate();
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
});
