(() => {
  "use strict";
  const players = [...document.querySelectorAll("#hub-interviews .interview video")];
  players.forEach(video => {
    const item = video.closest(".interview");
    const frame = item.querySelector(".interview-frame");
    const status = item.querySelector(".interview-status");
    const play = document.createElement("button");
    play.type = "button";
    play.className = "interview-play";
    play.setAttribute("aria-label", `Play ${video.getAttribute("aria-label")} with sound`);
    play.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3 21 12 5 21Z"/></svg>';
    frame.append(play);
    // The HTML retains native controls when JavaScript is unavailable.
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
      } catch {
        status.textContent = "Playback could not start. Try the player controls or open the original video below.";
      } finally {
        play.hidden = true;
        play.disabled = false;
        video.focus({ preventScroll: true });
      }
    });
    video.addEventListener("play", () => {
      play.hidden = true;
      status.textContent = "";
      players.forEach(other => { if (other !== video) other.pause(); });
    });
    const failed = () => {
      video.controls = true;
      video.tabIndex = 0;
      play.hidden = true;
      status.textContent = "This video could not be loaded. You can open the original file below.";
    };
    video.addEventListener("error", failed);
    video.querySelector("source")?.addEventListener("error", failed);
  });
})();
