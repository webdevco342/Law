/* The gallery is local to Practice; it does not alter shared navigation. */
(() => {
  'use strict';
  const gallery = document.querySelector('[data-practice-gallery]');
  if (!gallery) return;
  const viewport = gallery.querySelector('.practice-gallery-viewport');
  const slides = [...gallery.querySelectorAll('.practice-gallery-slide')];
  const dots = [...gallery.querySelectorAll('[data-gallery-go]')];
  const toggle = gallery.querySelector('[data-gallery-toggle]');
  const status = gallery.querySelector('[data-gallery-status]');
  const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const interval = 5500;
  let current = 0;
  let requested = 0;
  let timer;
  let generation = 0;
  let userPaused = motion.matches;
  let hovered = false;
  let focused = false;
  let visible = false;
  let gesture = null;
  const stop = () => window.clearTimeout(timer);
  const schedule = () => {
    stop();
    if (!userPaused && !hovered && !focused && visible && !document.hidden && !gesture) {
      timer = window.setTimeout(() => show(current + 1, false), interval);
    }
  };
  const updateToggle = () => {
    toggle.classList.toggle('is-paused', userPaused);
    toggle.setAttribute('aria-label', userPaused ? 'Start automatic image rotation' : 'Pause automatic image rotation');
    toggle.querySelector('span').textContent = userPaused ? 'Play' : 'Pause';
  };
  const show = async (index, manual = true) => {
    stop();
    requested = (index + slides.length) % slides.length;
    const target = requested;
    const request = ++generation;
    const img = slides[target].querySelector('img');
    // Decode before fading so slow connections never expose an empty slide.
    img.loading = 'eager';
    try { await img.decode(); }
    catch {
      if (request !== generation) return;
      requested = current;
      if (manual) status.textContent = 'This image could not be loaded. Please try another image.';
      userPaused = true;
      updateToggle();
      return;
    }
    if (request !== generation) return;
    current = target;
    slides.forEach((slide, i) => {
      slide.classList.toggle('is-active', i === current);
      if (i === current) slide.removeAttribute('aria-hidden');
      else slide.setAttribute('aria-hidden', 'true');
    });
    dots.forEach((dot, i) => {
      if (i === current) dot.setAttribute('aria-current', 'true');
      else dot.removeAttribute('aria-current');
    });
    gallery.querySelector('[data-gallery-count]').textContent = String(current + 1).padStart(2, '0');
    if (manual) status.textContent = `Image ${current + 1} of ${slides.length}. ${img.alt}`;
    schedule();
  };
  gallery.querySelector('[data-gallery-prev]').addEventListener('click', () => show(requested - 1));
  gallery.querySelector('[data-gallery-next]').addEventListener('click', () => show(requested + 1));
  dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
  toggle.addEventListener('click', () => {
    userPaused = !userPaused;
    updateToggle();
    status.textContent = userPaused ? 'Automatic image rotation paused.' : 'Automatic image rotation enabled. Rotation resumes when focus and pointer leave the gallery.';
    schedule();
  });
  gallery.addEventListener('keydown', event => {
    if (event.altKey || event.ctrlKey || event.metaKey) return;
    const keys = { ArrowLeft: requested - 1, ArrowRight: requested + 1, Home: 0, End: slides.length - 1 };
    if (!(event.key in keys) || !event.target.closest('.practice-gallery-tools')) return;
    event.preventDefault();
    show(keys[event.key]);
  });
  gallery.addEventListener('pointerenter', event => {
    if (event.pointerType === 'mouse') { hovered = true; stop(); }
  });
  gallery.addEventListener('pointerleave', event => {
    if (event.pointerType === 'mouse') { hovered = false; schedule(); }
  });
  gallery.addEventListener('focusin', () => { focused = true; stop(); });
  gallery.addEventListener('focusout', () => {
    queueMicrotask(() => { focused = gallery.contains(document.activeElement); schedule(); });
  });
  document.addEventListener('visibilitychange', schedule);
  motion.addEventListener('change', () => {
    if (motion.matches) { userPaused = true; updateToggle(); }
    schedule();
  });
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(([entry]) => { visible = entry.isIntersecting; schedule(); }, { threshold: 0.15 });
    observer.observe(viewport);
  } else { visible = true; }
  viewport.addEventListener('pointerdown', event => {
    if (!event.isPrimary || event.button !== 0) return;
    gesture = { id: event.pointerId, x: event.clientX, y: event.clientY };
    viewport.setPointerCapture(event.pointerId);
    stop();
  });
  viewport.addEventListener('pointerup', event => {
    if (!gesture || gesture.id !== event.pointerId) return;
    const dx = event.clientX - gesture.x;
    const dy = event.clientY - gesture.y;
    gesture = null;
    if (viewport.hasPointerCapture(event.pointerId)) viewport.releasePointerCapture(event.pointerId);
    if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy) * 1.4) show(requested + (dx < 0 ? 1 : -1));
    else schedule();
  });
  const cancelGesture = () => { gesture = null; schedule(); };
  viewport.addEventListener('pointercancel', cancelGesture);
  viewport.addEventListener('lostpointercapture', cancelGesture);
  gallery.querySelector('.practice-gallery-tools').hidden = false;
  updateToggle();
  schedule();
})();
