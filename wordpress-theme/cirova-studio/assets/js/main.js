/* ==========================================================================
   Cirova Studio — main.js  (vanilla JS, no dependencies)
   Animation system mirrors the original site:
   page loader · custom cursor · navbar blur · scroll-progress bar ·
   hero blob-follow · staggered reveals · count-up · single-open FAQ ·
   seamless marquees · testimonial auto-scroll · magnetic CTAs · 3D card tilt ·
   smooth-scroll anchors · mobile nav + services accordion · contact form.
   Honors prefers-reduced-motion and (hover:none) touch devices.
   ========================================================================== */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var noHover      = window.matchMedia('(hover: none)').matches;

  /* ---------------------------------------------------------------------
     1. PAGE LOADER — fade out shortly after load
     --------------------------------------------------------------------- */
  var loader = document.getElementById('pageLoader');
  function hideLoader() { if (loader) loader.classList.add('gone'); }
  window.addEventListener('load', function () { setTimeout(hideLoader, 400); });
  // safety net so the loader never gets stuck if 'load' already fired
  setTimeout(hideLoader, 2500);

  /* ---------------------------------------------------------------------
     2. CUSTOM CURSOR — dot follows instantly, ring lerps behind it
        (pointer devices only; skipped for touch / reduced-motion)
     --------------------------------------------------------------------- */
  var dot  = document.getElementById('cursorDot');
  var ring = document.getElementById('cursorRing');
  if (dot && ring && !noHover && !reduceMotion) {
    var mx = 0, my = 0, rx = 0, ry = 0;
    document.addEventListener('mousemove', function (e) {
      mx = e.clientX; my = e.clientY;
      dot.style.left = mx + 'px'; dot.style.top = my + 'px';
    });
    (function ringLoop() {
      rx += (mx - rx) * 0.18; ry += (my - ry) * 0.18;
      ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
      requestAnimationFrame(ringLoop);
    })();
    // grow the ring over interactive elements
    document.querySelectorAll('a, button, .card, .feature, .work, .testi, input, select, textarea')
      .forEach(function (el) {
        el.addEventListener('mouseenter', function () { ring.classList.add('hover'); });
        el.addEventListener('mouseleave', function () { ring.classList.remove('hover'); });
      });
  } else if (dot && ring) {
    dot.style.display = ring.style.display = 'none';
  }

  /* ---------------------------------------------------------------------
     3. NAVBAR blur / shadow on scroll
     --------------------------------------------------------------------- */
  var header = document.querySelector('.site-header');
  function onScroll() { if (header) header.classList.toggle('scrolled', window.scrollY > 30); }
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ---------------------------------------------------------------------
     4. SCROLL PROGRESS BAR
     --------------------------------------------------------------------- */
  var bar = document.getElementById('scrollProgress');
  if (bar) {
    var ticking = false;
    function update() {
      var max = document.documentElement.scrollHeight - window.innerHeight;
      bar.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
      ticking = false;
    }
    window.addEventListener('scroll', function () {
      if (!ticking) { requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
    update();
  }

  /* ---------------------------------------------------------------------
     5. HERO BLOB follows the cursor inside the hero
     --------------------------------------------------------------------- */
  var blob = document.querySelector('.hero__blob');
  var hero = document.querySelector('.hero');
  if (blob && hero && !reduceMotion && !noHover) {
    hero.addEventListener('mousemove', function (e) {
      var r = hero.getBoundingClientRect();
      blob.style.transform = 'translate3d(' + (e.clientX - r.left - 300) + 'px,' + (e.clientY - r.top - 300) + 'px,0)';
    });
  }

  /* ---------------------------------------------------------------------
     6. MOBILE NAV — hamburger + services accordion + body scroll lock
     --------------------------------------------------------------------- */
  var hamburger = document.querySelector('[data-nav-open]');
  var mobileNav = document.getElementById('mobileNav');
  var navClose  = document.querySelector('[data-nav-close]');
  function openNav() {
    if (!mobileNav) return;
    mobileNav.classList.add('open'); document.body.classList.add('nav-open');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'true');
    mobileNav.setAttribute('aria-hidden', 'false');
  }
  function closeNav() {
    if (!mobileNav) return;
    mobileNav.classList.remove('open'); document.body.classList.remove('nav-open');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    mobileNav.setAttribute('aria-hidden', 'true');
  }
  if (hamburger) hamburger.addEventListener('click', openNav);
  if (navClose)  navClose.addEventListener('click', closeNav);
  if (mobileNav) mobileNav.querySelectorAll('a[href]').forEach(function (a) { a.addEventListener('click', closeNav); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeNav(); });

  document.querySelectorAll('.m-acc__btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var acc = btn.closest('.m-acc');
      var panel = acc.querySelector('.m-acc__panel');
      var isOpen = acc.classList.toggle('open');
      btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      panel.style.maxHeight = isOpen ? panel.scrollHeight + 'px' : '0px';
    });
  });

  /* ---------------------------------------------------------------------
     7. REVEAL on scroll — adds .in, staggered by order in viewport
     --------------------------------------------------------------------- */
  var reveals = document.querySelectorAll('.reveal');
  if (reveals.length && !reduceMotion) {
    var rObs = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (en, i) {
        if (en.isIntersecting) {
          setTimeout(function () { en.target.classList.add('in'); }, i * 60);
          obs.unobserve(en.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    reveals.forEach(function (r) { rObs.observe(r); });
  } else {
    reveals.forEach(function (r) { r.classList.add('in'); });
  }

  /* ---------------------------------------------------------------------
     8. COUNT-UP stats via IntersectionObserver (preserves +/%/x/h/yr suffix)
     --------------------------------------------------------------------- */
  function animateCount(el) {
    var target = parseFloat(el.getAttribute('data-count')) || 0;
    var decimals = (el.getAttribute('data-count').split('.')[1] || '').length;
    var suffix = el.querySelector('em') ? el.querySelector('em').outerHTML : '';
    if (reduceMotion) { el.innerHTML = target.toFixed(decimals) + suffix; return; }
    var dur = 1600, start = null;
    function tick(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.innerHTML = (target * eased).toFixed(decimals) + suffix;
      if (p < 1) requestAnimationFrame(tick);
      else el.innerHTML = target.toFixed(decimals) + suffix;
    }
    requestAnimationFrame(tick);
  }
  var counters = document.querySelectorAll('.num[data-count]');
  if (counters.length) {
    var cObs = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { animateCount(en.target); obs.unobserve(en.target); }
      });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { cObs.observe(c); });
  }

  /* ---------------------------------------------------------------------
     9. FAQ accordion — single-open (opening one closes the others)
     --------------------------------------------------------------------- */
  var faqItems = document.querySelectorAll('.faq__item');
  document.querySelectorAll('.faq__q').forEach(function (q) {
    q.addEventListener('click', function () {
      var item = q.closest('.faq__item');
      var willOpen = !item.classList.contains('open');
      faqItems.forEach(function (it) {
        it.classList.remove('open');
        var a = it.querySelector('.faq__a'); if (a) a.style.maxHeight = '0px';
        var b = it.querySelector('.faq__q'); if (b) b.setAttribute('aria-expanded', 'false');
      });
      if (willOpen) {
        item.classList.add('open');
        var ans = item.querySelector('.faq__a');
        ans.style.maxHeight = ans.scrollHeight + 'px';
        q.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ---------------------------------------------------------------------
     10. Infinite marquees + testimonial auto-scroll (duplicate the track)
     --------------------------------------------------------------------- */
  if (!reduceMotion) {
    document.querySelectorAll('.marquee__track, .testi-track').forEach(function (track) {
      track.innerHTML += track.innerHTML;
    });
  }

  /* ---------------------------------------------------------------------
     11. MAGNETIC CTAs — buttons drift toward the cursor (pointer only)
     --------------------------------------------------------------------- */
  if (!reduceMotion && !noHover) {
    document.querySelectorAll('.btn--primary, .btn--ghost').forEach(function (btn) {
      btn.addEventListener('mousemove', function (e) {
        var r = btn.getBoundingClientRect();
        var x = e.clientX - r.left - r.width / 2;
        var y = e.clientY - r.top - r.height / 2;
        btn.style.transform = 'translate(' + (x * 0.22) + 'px,' + (y * 0.22) + 'px)';
      });
      btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
    });
  }

  /* ---------------------------------------------------------------------
     12. 3D CARD TILT on hover (pointer only)
     --------------------------------------------------------------------- */
  if (!reduceMotion && !noHover) {
    document.querySelectorAll('.card, .feature, .step, .testi, .mv__card, .method')
      .forEach(function (card) {
        card.classList.add('tilt-on-hover');
        card.addEventListener('mousemove', function (e) {
          var r = card.getBoundingClientRect();
          var x = (e.clientX - r.left) / r.width;
          var y = (e.clientY - r.top) / r.height;
          card.style.transform = 'perspective(900px) rotateX(' + ((y - 0.5) * -6) + 'deg) rotateY(' + ((x - 0.5) * 6) + 'deg) translateZ(0)';
        });
        card.addEventListener('mouseleave', function () { card.style.transform = ''; });
      });
  }

  /* ---------------------------------------------------------------------
     13. Smooth-scroll for in-page anchor links
     --------------------------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
      }
    });
  });

  /* ---------------------------------------------------------------------
     14. Contact form — preventDefault + inline success (no backend)
     --------------------------------------------------------------------- */
  var form = document.getElementById('contact-form');
  if (form) {
    // When the form posts to a real handler (WordPress admin-post.php), let it
    // submit natively after client validation. On the static demo (no action),
    // fall back to an inline success message.
    var hasServer = /admin-post\.php/.test(form.getAttribute('action') || '');
    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) { e.preventDefault(); form.reportValidity(); return; }
      if (hasServer) { return; } // native submit -> WordPress sends the email
      e.preventDefault();
      var ok = form.querySelector('.form__success');
      form.querySelectorAll('input,select,textarea,button').forEach(function (el) { el.disabled = true; });
      if (ok) { ok.classList.add('show'); ok.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' }); }
    });
  }

  /* ---------------------------------------------------------------------
     15. Footer year
     --------------------------------------------------------------------- */
  var yearEl = document.querySelector('[data-year]');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

})();
