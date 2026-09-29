(() => {
  "use strict";

  // Optional form integration. Leave empty to prepare an email without transmitting data.
  // Endpoint contract: HTTPS POST, JSON {name, email, phone, matter, message, consent}.
  // Return a successful 2xx response only when the enquiry has been accepted.
  const FORM_ENDPOINT = "";
  const CONTACT_EMAIL =
    document.querySelector("#enquiry-form")?.dataset.contactEmail ||
    "wicky.mechanier1446@gmail.com";

  const header = document.querySelector(".site-header");
  const progress = document.querySelector(".scroll-progress");
  const menu = document.querySelector("#mobile-menu");
  const menuToggle = document.querySelector(".menu-toggle");
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
  const navLinks = [...document.querySelectorAll(".desktop-nav a")];
  const navSections = navLinks
    .filter((link) => link.getAttribute("href").startsWith("#"))
    .map((link) => document.getElementById(link.hash.slice(1)))
    .filter(Boolean);
  let ticking = false;

  function updateScroll() {
    header?.classList.toggle("is-scrolled", window.scrollY > 20);
    const maxScroll =
      document.documentElement.scrollHeight - window.innerHeight;
    if (progress)
      progress.style.transform = `scaleX(${maxScroll > 0 ? Math.min(window.scrollY / maxScroll, 1) : 0})`;
    let current = navSections[0];
    for (const section of navSections) {
      if (section.getBoundingClientRect().top <= 160) current = section;
    }
    if (maxScroll > 0 && window.scrollY >= maxScroll - 10)
      current = navSections.at(-1);
    navLinks.forEach((link) => {
      if (link.getAttribute("href") === `#${current?.id}`)
        link.setAttribute("aria-current", "location");
      else if (link.hash) link.removeAttribute("aria-current");
    });
    ticking = false;
  }
  window.addEventListener(
    "scroll",
    () => {
      if (!ticking) {
        window.requestAnimationFrame(updateScroll);
        ticking = true;
      }
    },
    { passive: true },
  );
  window.addEventListener("resize", updateScroll, { passive: true });
  updateScroll();

  if (menu && menuToggle) {
    menuToggle.addEventListener("click", () => {
      if (menu.open) return;
      menu.showModal();
      document.body.classList.add("menu-is-open");
      menuToggle.setAttribute("aria-expanded", "true");
      menuToggle.setAttribute("aria-label", "Close navigation");
      menu.querySelector(".menu-close").focus();
    });
    const closeMenu = () => {
      if (menu.open) menu.close();
    };
    menu.querySelector(".menu-close").addEventListener("click", closeMenu);
    menu.addEventListener("keydown", (event) => {
      if (event.key !== "Tab") return;
      const focusable = [
        ...menu.querySelectorAll("a[href], button:not([disabled])"),
      ];
      const first = focusable[0];
      const last = focusable.at(-1);
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });
    menu.addEventListener("click", (event) => {
      if (event.target === menu) {
        const rect = menu.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right)
          closeMenu();
      }
    });
    // A modal dialog supplies focus containment and native Escape handling.
    menu.addEventListener("close", () => {
      document.body.classList.remove("menu-is-open");
      menuToggle.setAttribute("aria-expanded", "false");
      menuToggle.setAttribute("aria-label", "Open navigation");
    });
    window
      .matchMedia("(min-width: 1281px)")
      .addEventListener("change", (event) => {
        if (event.matches) closeMenu();
      });
  }

  document.addEventListener("click", (event) => {
    const anchor = event.target.closest('a[href^="#"]');
    if (
      !anchor ||
      event.ctrlKey ||
      event.metaKey ||
      event.shiftKey ||
      event.altKey
    )
      return;
    const target = document.querySelector(anchor.getAttribute("href"));
    if (!target) return;
    event.preventDefault();
    if (menu?.open) menu.close();
    const matter = anchor.dataset.matter;
    if (matter) {
      const select = document.querySelector("#matter");
      select.value = matter;
      select.dispatchEvent(new Event("change", { bubbles: true }));
    }
    try {
      history.pushState(null, "", anchor.getAttribute("href"));
    } catch {
      /* file:// still scrolls correctly */
    }
    target.scrollIntoView({
      behavior: reducedMotion.matches ? "instant" : "smooth",
      block: "start",
    });
    if (!target.hasAttribute("tabindex")) target.setAttribute("tabindex", "-1");
    target.focus({ preventScroll: true });
  });

  if ("IntersectionObserver" in window && !reducedMotion.matches) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.remove("reveal-pending");
          revealObserver.unobserve(entry.target);
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -15px 0px" },
    );
    document.querySelectorAll("[data-reveal]").forEach((element) => {
      if (element.getBoundingClientRect().top > window.innerHeight)
        element.classList.add("reveal-pending");
      revealObserver.observe(element);
    });
    reducedMotion.addEventListener("change", (event) => {
      if (event.matches) {
        revealObserver.disconnect();
        document
          .querySelectorAll(".reveal-pending")
          .forEach((element) => element.classList.remove("reveal-pending"));
      }
    });
  }

  const year = document.querySelector("#copyright-year");
  if (year) year.textContent = String(new Date().getFullYear());

  const form = document.querySelector("#enquiry-form");
  if (!form) return;
  const status = document.querySelector("#form-status");
  const fallback = document.querySelector("#email-fallback");
  const draftLink = document.querySelector("#email-draft");
  const submitButton = form.querySelector('[type="submit"]');
  // Disabled in the HTML to prevent accidental GET submissions without JavaScript.
  submitButton.disabled = false;
  const fields = ["name", "email", "phone", "matter", "message", "consent"];
  let validated = false;
  let currentDraft = "";
  let submitting = false;
  let submitController = null;
  const endpointConfigured = /^https:\/\//i.test(FORM_ENDPOINT);

  if (endpointConfigured) {
    document.querySelector("#submit-label").textContent = "Submit Enquiry";
    document.querySelector("#form-intro").textContent =
      "Share a brief overview of your matter and your contact details.";
  }

  function validateField(name) {
    const field = form.elements.namedItem(name);
    const value = field.value.trim();
    let error = "";
    if (name === "name" && value.length < 2)
      error = "Please enter your full name.";
    if (
      name === "email" &&
      (!value ||
        field.validity.typeMismatch ||
        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value))
    )
      error = "Please enter a valid email address.";
    if (
      name === "phone" &&
      value &&
      (!/^[+\d\s().-]+$/.test(value) || value.replace(/\D/g, "").length < 7)
    )
      error = "Please enter a valid phone number or leave this blank.";
    if (name === "matter" && !value)
      error = "Please select the nature of your matter.";
    if (name === "message" && value.length < 10)
      error = "Please provide a brief message of at least 10 characters.";
    if (name === "consent" && !field.checked)
      error = "Please acknowledge this statement to continue.";
    document.querySelector(`#${name}-error`).textContent = error;
    if (error) field.setAttribute("aria-invalid", "true");
    else field.removeAttribute("aria-invalid");
    return !error;
  }

  function showStatus(message) {
    status.textContent = message;
    status.hidden = false;
  }

  function invalidateDraft() {
    fallback.hidden = true;
    currentDraft = "";
    status.hidden = true;
    draftLink.href = `mailto:${CONTACT_EMAIL}`;
  }

  for (const eventType of ["input", "change"]) {
    form.addEventListener(eventType, (event) => {
      if (fields.includes(event.target.name)) {
        invalidateDraft();
        if (validated) validateField(event.target.name);
      }
    });
  }

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
    if (submitting) return;
    validated = true;
    const validity = fields.map(validateField);
    if (validity.includes(false)) {
      invalidateDraft();
      showStatus("Please review the highlighted fields before continuing.");
      form.querySelector('[aria-invalid="true"]').focus();
      return;
    }
    const data = Object.fromEntries(
      fields.map((name) => [
        name,
        name === "consent"
          ? form.elements.namedItem(name).checked
          : form.elements.namedItem(name).value.trim(),
      ]),
    );
    currentDraft = `Consultation enquiry\n\nName: ${data.name}\nEmail: ${data.email}\nPhone: ${data.phone || "Not provided"}\nNature of matter: ${data.matter}\n\n${data.message}\n\nI understand that this enquiry does not by itself create a lawyer-client relationship.`;
    draftLink.href = `mailto:${CONTACT_EMAIL}?subject=${encodeURIComponent(`Consultation enquiry — ${data.matter}`)}&body=${encodeURIComponent(currentDraft)}`;

    if (!endpointConfigured) {
      showStatus(
        "Your enquiry is ready. Nothing has been sent. Open the email draft to review and send it, or copy your enquiry into an email to the office.",
      );
      fallback.hidden = false;
      draftLink.focus({ preventScroll: true });
      fallback.scrollIntoView({
        behavior: reducedMotion.matches ? "instant" : "smooth",
        block: "nearest",
      });
      return;
    }

    submitting = true;
    submitButton.disabled = true;
    form.setAttribute("aria-busy", "true");
    showStatus("Submitting your enquiry…");
    submitController = new AbortController();
    const timeout = window.setTimeout(() => submitController.abort(), 15000);
    try {
      const response = await fetch(FORM_ENDPOINT, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(data),
        signal: submitController.signal,
        credentials: "omit",
        redirect: "error",
      });
      if (!response.ok) throw new Error("Submission not accepted");
      showStatus("Your enquiry has been submitted to the office.");
      fallback.hidden = true;
      form.reset();
      validated = false;
      currentDraft = "";
    } catch {
      showStatus(
        "We could not confirm submission. Please use the email draft below or call the office. Your details remain in the form.",
      );
      fallback.hidden = false;
    } finally {
      window.clearTimeout(timeout);
      submitting = false;
      submitButton.disabled = false;
      form.removeAttribute("aria-busy");
    }
  });

  document
    .querySelector("#copy-enquiry")
    .addEventListener("click", async () => {
      if (!currentDraft) return;
      try {
        if (navigator.clipboard && window.isSecureContext)
          await navigator.clipboard.writeText(currentDraft);
        else throw new Error("Clipboard unavailable");
        showStatus(
          `Enquiry copied. Paste it into an email to ${CONTACT_EMAIL}. Nothing has been sent.`,
        );
      } catch {
        showStatus(
          "Automatic copying is unavailable. Use Open Email Draft, or select and copy your message from the form.",
        );
      }
    });
})();
