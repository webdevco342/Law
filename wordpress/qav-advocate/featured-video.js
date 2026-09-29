(() => {
  "use strict";
  const players = [...document.querySelectorAll("#hub-video .media-feature video")];
  players.forEach(video => {
    const feature = video.closest(".media-feature");
    const frame = video.closest(".media-feature-frame");
    const status = feature.querySelector(".media-feature-status");
    const play = document.createElement("button");
    play.type = "button";
    play.className = "media-feature-play";
    play.setAttribute("aria-label", `Play ${video.getAttribute("aria-label")} with sound`);
    play.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3 21 12 5 21Z"/></svg>';
    frame.append(play);
    // Without scripting, the original native controls remain available.
    video.controls = false;
    video.tabIndex = -1;
    play.addEventListener("click", async () => {
      play.disabled = true;
      status.textContent = "";
      video.controls = true;
      video.tabIndex = 0;
      video.muted = false;
      try {
        await video.play();
        play.hidden = true;
        video.focus({ preventScroll: true });
      } catch {
        play.hidden = true;
        video.focus({ preventScroll: true });
        status.textContent = "Playback could not start. Try the player controls or open the video below.";
      } finally {
        play.disabled = false;
      }
    });
    video.addEventListener("play", () => {
      play.hidden = true;
      status.textContent = "";
      players.forEach(other => { if (other !== video) other.pause(); });
    });
    video.addEventListener("error", () => {
      video.controls = true;
      video.tabIndex = 0;
      play.hidden = true;
      status.textContent = "This video could not be loaded. You can open the original file below.";
    });
  });
})();
