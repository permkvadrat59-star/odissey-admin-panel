/* Тема «Одиссей» — общий фронтенд-скрипт (перенос из инлайна статики). */
(() => {
  const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Интро-заставка (только там, где есть #intro — главная)
  const intro = document.getElementById('intro');
  if (intro) {
    if (reduced) { intro.remove(); }
    else {
      document.body.style.overflow = 'hidden';
      setTimeout(() => {
        intro.classList.add('out');
        intro.addEventListener('transitionend', () => {
          intro.remove();
          document.body.style.overflow = '';
          document.querySelector('video.hero-video-media')?.play();
        }, { once: true });
      }, 1900);
    }
  }

  // Слайд-шоу (герой + фото-блоки с несколькими кадрами)
  document.querySelectorAll('[data-slideshow]').forEach(box => {
    const imgs = box.querySelectorAll('img');
    if (imgs.length < 2) return;
    imgs[0].classList.add('active');
    if (reduced) return;
    let i = 0;
    setInterval(() => {
      imgs[i].classList.remove('active');
      i = (i + 1) % imgs.length;
      imgs[i].classList.add('active');
    }, 5000);
  });

  // Бургер-меню
  document.querySelector('.burger')?.addEventListener('click', e => {
    e.currentTarget.classList.toggle('open');
    document.querySelector('.nav-links')?.classList.toggle('open');
  });

  if (reduced) {
    document.querySelectorAll('video.hero-video-media, .photo-cell-video').forEach(v => v.pause());
  }

  // Прогресс-бар прокрутки
  const bar = document.getElementById('progress');
  if (bar) {
    addEventListener('scroll', () => {
      const h = document.documentElement;
      bar.style.width = (h.scrollTop / (h.scrollHeight - h.clientHeight) * 100) + '%';
    }, { passive: true });
  }

  // Появление секций + счётчики
  if (!reduced) {
    const io = new IntersectionObserver(es => es.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); }
    }), { threshold: .1 });
    document.querySelectorAll('.rv').forEach(el => io.observe(el));

    const cio = new IntersectionObserver(es => es.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target, target = +el.dataset.count, t0 = performance.now();
      const step = t => {
        const p = Math.min((t - t0) / 1200, 1);
        el.textContent = Math.round(target * (p < .5 ? 2 * p * p : 1 - Math.pow(-2 * p + 2, 2) / 2));
        if (p < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step); cio.unobserve(el);
    }), { threshold: .6 });
    document.querySelectorAll('[data-count]').forEach(el => cio.observe(el));
  } else {
    document.querySelectorAll('.rv').forEach(el => el.classList.add('on'));
  }

  // Лайтбокс сканов документов/грамот
  const lb = document.getElementById('lightboxDialog');
  const lbImg = document.getElementById('lightboxImg');
  if (lb && lbImg) {
    document.querySelectorAll('a.doc-cell, .lic-card a.shot').forEach(a => {
      a.addEventListener('click', e => {
        e.preventDefault();
        lbImg.src = a.getAttribute('href');
        lbImg.alt = a.querySelector('img') ? a.querySelector('img').alt : '';
        lb.showModal();
      });
    });
    lb.addEventListener('click', () => lb.close());
  }

  // Модалка заявки
  const cta = document.getElementById('ctaDialog');
  if (cta) {
    const sel = cta.querySelector('select');
    document.querySelectorAll('[data-cta]').forEach(btn => {
      btn.addEventListener('click', () => {
        if (sel) sel.value = btn.dataset.tema || '';
        cta.showModal();
      });
    });
    cta.querySelector('.cta-dialog-close')?.addEventListener('click', () => cta.close());
  }
})();
