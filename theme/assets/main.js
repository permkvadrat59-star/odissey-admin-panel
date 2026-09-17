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

  // Маска телефона: +7 всегда на месте, вводить нужно только оставшиеся цифры.
  // Backspace/Delete стирают по одной цифре с конца (а не по символу) — иначе
  // стирание залипает на закрывающей скобке и не даёт очистить номер до конца.
  document.querySelectorAll('input[type="tel"][name="phone"]').forEach(input => {
    const toDigits = raw => {
      let d = raw.replace(/\D/g, '');
      if (d.charAt(0) === '7' || d.charAt(0) === '8') d = d.slice(1);
      return d.slice(0, 10);
    };
    const format = digits => {
      let out = '+7 ';
      if (digits.length) out += '(' + digits.slice(0, 3);
      if (digits.length >= 3) out += ')';
      if (digits.length > 3) out += ' ' + digits.slice(3, 6);
      if (digits.length > 6) out += '-' + digits.slice(6, 8);
      if (digits.length > 8) out += '-' + digits.slice(8, 10);
      return out;
    };
    const setDigits = digits => {
      input.value = format(digits);
      input.setCustomValidity(digits.length === 10 ? '' : 'Введите номер телефона полностью');
    };
    if (!input.value) setDigits('');
    input.addEventListener('focus', () => { if (!input.value) setDigits(''); });
    const navKeys = ['Tab', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Home', 'End', 'Escape', 'Enter'];
    input.addEventListener('keydown', e => {
      if (e.key === 'Backspace' || e.key === 'Delete') {
        e.preventDefault();
        setDigits(toDigits(input.value).slice(0, -1));
        return;
      }
      if (navKeys.includes(e.key) || e.ctrlKey || e.metaKey) return;
      // блокируем всё, кроме цифр, уже на нажатии клавиши — иначе буква
      // на миг появляется в поле и тут же стирается перерисовкой (глюк)
      if (!/^[0-9]$/.test(e.key)) e.preventDefault();
    });
    // подстраховка на случай, если не-цифра всё же попала в значение
    // (автозаполнение браузера, нестандартная мобильная клавиатура)
    input.addEventListener('input', () => setDigits(toDigits(input.value)));
    input.addEventListener('paste', e => {
      e.preventDefault();
      // берём цифры только из вставляемого текста: в поле уже лежит наш "+7",
      // если приплюсовать его к вставке — цифры съезжают на одну позицию
      const text = (e.clipboardData || window.clipboardData).getData('text');
      setDigits(toDigits(text));
    });
  });

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
