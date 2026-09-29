(() => {
  "use strict";
  const links = [...document.querySelectorAll(".selected-media [data-photo-viewer]")];
  if (!links.length || typeof HTMLDialogElement === "undefined") return;

  const dialog = document.createElement("dialog");
  dialog.className = "selected-media-viewer";
  dialog.setAttribute("aria-label", "Selected Media — photograph viewer");
  dialog.innerHTML = `
    <div class="selected-media-viewer-header">
      <span class="selected-media-viewer-title">Selected Media</span>
      <button type="button" data-photo-close aria-label="Close photograph viewer" autofocus>Close <span aria-hidden="true">×</span></button>
    </div>
    <img class="selected-media-viewer-image" alt="" />
    <div class="selected-media-viewer-controls">
      <button type="button" data-photo-previous aria-label="Previous photograph"><span aria-hidden="true">←</span> Previous</button>
      <div class="selected-media-viewer-status" role="status" aria-live="polite" aria-atomic="true"></div>
      <button type="button" data-photo-next aria-label="Next photograph">Next <span aria-hidden="true">→</span></button>
    </div>`;
  document.body.append(dialog);
  const image = dialog.querySelector("img");
  const status = dialog.querySelector("[role=status]");
  const close = dialog.querySelector("[data-photo-close]");
  let active = 0;
  let opener = null;
  let previousOverflow = "";

  function show(index) {
    active = (index + links.length) % links.length;
    const link = links[active];
    const preview = link.querySelector("img");
    image.alt = preview.alt;
    image.width = Number(preview.getAttribute("width"));
    image.height = Number(preview.getAttribute("height"));
    image.src = link.href;
    status.textContent = `Image ${active + 1} of ${links.length}`;
    const caption = link.closest("figure").querySelector("figcaption");
    if (caption) {
      const text = document.createElement("span");
      text.className = "selected-media-viewer-caption";
      text.textContent = caption.textContent;
      status.append(text);
    }
  }

  links.forEach((link, index) => {
    link.setAttribute("aria-haspopup", "dialog");
    link.addEventListener("click", event => {
      if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
      event.preventDefault();
      opener = link;
      show(index);
      previousOverflow = document.documentElement.style.overflow;
      document.documentElement.style.overflow = "hidden";
      dialog.showModal();
      close.focus();
    });
  });
  close.addEventListener("click", () => dialog.close());
  dialog.querySelector("[data-photo-previous]").addEventListener("click", () => show(active - 1));
  dialog.querySelector("[data-photo-next]").addEventListener("click", () => show(active + 1));
  dialog.addEventListener("keydown", event => {
    if (event.key === "ArrowRight" || event.key === "ArrowLeft") {
      event.preventDefault();
      show(active + (event.key === "ArrowRight" ? 1 : -1));
    }
    if (event.key === "Tab") {
      const buttons = [...dialog.querySelectorAll("button")];
      if (event.shiftKey && document.activeElement === buttons[0]) { event.preventDefault(); buttons.at(-1).focus(); }
      else if (!event.shiftKey && document.activeElement === buttons.at(-1)) { event.preventDefault(); buttons[0].focus(); }
    }
  });
  dialog.addEventListener("close", () => {
    document.documentElement.style.overflow = previousOverflow;
    opener?.focus({ preventScroll: true });
    image.removeAttribute("src");
  });
})();
