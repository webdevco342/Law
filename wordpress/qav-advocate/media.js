document.addEventListener("click", (event) => {
  const button = event.target.closest("[data-video-play]");
  if (!button) return;
  const stage = button.closest(".video-stage");
  const url = new URL(button.dataset.videoPlay, window.location.href);
  if (!["www.youtube-nocookie.com", "player.vimeo.com"].includes(url.hostname))
    return;
  const frame = document.createElement("iframe");
  frame.src = url.href; // Deliberately no autoplay parameter.
  frame.title = button.dataset.videoTitle || "Video interview";
  frame.allow = "fullscreen; picture-in-picture; encrypted-media";
  frame.allowFullscreen = true;
  frame.referrerPolicy = "strict-origin-when-cross-origin";
  stage.replaceChildren(frame);
  stage.classList.add("is-playing");
  frame.focus();
});
