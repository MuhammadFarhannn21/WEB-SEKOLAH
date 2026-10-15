/* =========================================================
   SMK KOSGORO — Modern UI interactions (frontend)
   Vanilla JS, tanpa dependensi tambahan.
   ========================================================= */
(function () {
    'use strict';

    var body = document.body;

    /* Header mengecil saat scroll + tombol kembali ke atas */
    var header = document.querySelector('.m-header');
    var toTop = document.querySelector('.m-fab .top');
    function onScroll() {
        var y = window.pageYOffset || document.documentElement.scrollTop;
        if (header) header.classList.toggle('is-scrolled', y > 40);
        if (toTop) toTop.classList.toggle('show', y > 600);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    if (toTop) toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

    /* Menu aktif berdasarkan URL saat ini */
    var here = window.location.href.replace(/[#?].*$/, '').replace(/\/$/, '');
    document.querySelectorAll('.m-nav a[href], .m-drawer a[href]').forEach(function (a) {
        var raw = a.getAttribute('href') || '';
        // lewati tautan '#' dan menu induk yang punya submenu
        if (raw.indexOf('#') !== -1 || a.hasAttribute('data-sub') || (a.nextElementSibling && a.nextElementSibling.classList.contains('m-drop'))) return;
        var href = a.href.replace(/[#?].*$/, '').replace(/\/$/, '');
        var isHome = href === window.location.origin;
        // submenu yang (salah) diarahkan ke beranda jangan ikut menyorot induknya
        if (isHome && a.closest('.m-drop, .m-drawer ul ul')) return;
        if (href && href === here) {
            var li = a.closest('.m-nav > li') || a.closest('li');
            if (li) li.classList.add('active');
        }
    });

    /* Drawer menu mobile */
    function toggleDrawer(open) { body.classList.toggle('drawer-open', open); }
    document.querySelectorAll('[data-drawer-open]').forEach(function (b) { b.addEventListener('click', function () { toggleDrawer(true); }); });
    document.querySelectorAll('[data-drawer-close]').forEach(function (b) { b.addEventListener('click', function () { toggleDrawer(false); }); });
    document.querySelectorAll('.m-drawer li > a[data-sub]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            e.preventDefault();
            a.parentElement.classList.toggle('open');
        });
    });

    /* Overlay pencarian */
    var search = document.querySelector('.m-search');
    function toggleSearch(open) {
        if (!search) return;
        search.classList.toggle('open', open);
        if (open) setTimeout(function () { var i = search.querySelector('input'); if (i) i.focus(); }, 150);
    }
    document.querySelectorAll('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { toggleDrawer(false); toggleSearch(true); }); });
    document.querySelectorAll('[data-search-close]').forEach(function (b) { b.addEventListener('click', function () { toggleSearch(false); }); });
    if (search) search.addEventListener('click', function (e) { if (e.target === search) toggleSearch(false); });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { toggleSearch(false); toggleDrawer(false); }
        if (e.key === '/' && !/input|textarea|select/i.test(document.activeElement.tagName)) { e.preventDefault(); toggleSearch(true); }
    });

    /* Reveal saat elemen masuk viewport */
    var reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('in'); });
    }

    /* Animasi angka statistik */
    function animateCount(el) {
        var target = parseInt(String(el.getAttribute('data-count')).replace(/\D/g, ''), 10) || 0;
        var dur = 1600, start = null;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    var counters = document.querySelectorAll('[data-count]');
    if ('IntersectionObserver' in window) {
        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { animateCount(en.target); co.unobserve(en.target); }
            });
        }, { threshold: 0.4 });
        counters.forEach(function (el) { co.observe(el); });
    } else {
        counters.forEach(function (el) { el.textContent = el.getAttribute('data-count'); });
    }

    /* Carousel horizontal: tombol prev/next + drag mouse */
    document.querySelectorAll('[data-carousel]').forEach(function (wrap) {
        var track = wrap.querySelector('.m-track');
        if (!track) return;
        var prev = document.querySelector('[data-prev="' + wrap.id + '"]');
        var next = document.querySelector('[data-next="' + wrap.id + '"]');
        function stepSize() {
            var item = track.children[0];
            return item ? item.getBoundingClientRect().width + parseFloat(getComputedStyle(track).columnGap || 24) : 300;
        }
        function update() {
            var max = track.scrollWidth - track.clientWidth - 2;
            if (prev) prev.disabled = track.scrollLeft <= 2;
            if (next) next.disabled = track.scrollLeft >= max;
        }
        if (prev) prev.addEventListener('click', function () { track.scrollBy({ left: -stepSize(), behavior: 'smooth' }); });
        if (next) next.addEventListener('click', function () { track.scrollBy({ left: stepSize(), behavior: 'smooth' }); });
        track.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        update();

        var down = false, startX = 0, startLeft = 0, moved = false;
        track.addEventListener('mousedown', function (e) {
            down = true; moved = false; startX = e.pageX; startLeft = track.scrollLeft;
        });
        window.addEventListener('mousemove', function (e) {
            if (!down) return;
            var dx = e.pageX - startX;
            if (Math.abs(dx) > 5) { moved = true; track.classList.add('dragging'); }
            track.scrollLeft = startLeft - dx;
        });
        window.addEventListener('mouseup', function () {
            if (!down) return;
            down = false;
            setTimeout(function () { track.classList.remove('dragging'); }, 0);
        });
        track.addEventListener('click', function (e) { if (moved) { e.preventDefault(); e.stopPropagation(); } }, true);
        track.addEventListener('dragstart', function (e) { e.preventDefault(); });
    });
})();

/* =========================================================
   Tambahan v4: progress scroll + tabs (visi-misi, jurusan)
   ========================================================= */
(function () {
    'use strict';

    /* Progress bar membaca halaman */
    var bar = document.querySelector('.m-progress span');
    if (bar) {
        var ticking = false;
        var paint = function () {
            var h = document.documentElement.scrollHeight - window.innerHeight;
            bar.style.transform = 'scaleX(' + (h > 0 ? Math.min(window.pageYOffset / h, 1) : 0) + ')';
            ticking = false;
        };
        window.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; requestAnimationFrame(paint); }
        }, { passive: true });
        paint();
    }

    /* Tabs: tombol [data-tab] menampilkan panel [data-panel] di dalam [data-tabs] */
    document.querySelectorAll('[data-tabs]').forEach(function (group) {
        var buttons = group.querySelectorAll('[data-tab]');
        function activate(btn) {
            var key = btn.getAttribute('data-tab');
            buttons.forEach(function (b) {
                var on = b === btn;
                b.classList.toggle('active', on);
                b.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            group.querySelectorAll('[data-panel]').forEach(function (p) {
                p.classList.toggle('active', p.getAttribute('data-panel') === key);
            });
            // pada layar kecil, geser tombol aktif agar terlihat
            if (btn.parentElement.scrollWidth > btn.parentElement.clientWidth) {
                btn.parentElement.scrollTo({ left: btn.offsetLeft - 16, behavior: 'smooth' });
            }
        }
        buttons.forEach(function (b, i) {
            b.addEventListener('click', function () { activate(b); });
            b.addEventListener('keydown', function (e) {
                var dir = (e.key === 'ArrowRight' || e.key === 'ArrowDown') ? 1 : (e.key === 'ArrowLeft' || e.key === 'ArrowUp') ? -1 : 0;
                if (!dir) return;
                e.preventDefault();
                var next = buttons[(i + dir + buttons.length) % buttons.length];
                next.focus();
                activate(next);
            });
        });
    });
})();

/* =========================================================
   Tambahan v5: interaksi halaman dalam
   ========================================================= */
(function () {
    'use strict';

    /* Salin tautan artikel */
    document.querySelectorAll('[data-copy]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy');
            var done = function () {
                var label = btn.querySelector('em');
                var old = label ? label.textContent : '';
                btn.classList.add('copied');
                if (label) label.textContent = 'Tautan disalin!';
                setTimeout(function () { btn.classList.remove('copied'); if (label) label.textContent = old; }, 2000);
            };
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(done);
            } else {
                var t = document.createElement('textarea');
                t.value = text; document.body.appendChild(t); t.select();
                try { document.execCommand('copy'); done(); } catch (e) { /* abaikan */ }
                document.body.removeChild(t);
            }
        });
    });

    /* Filter cepat kartu: input[data-filter="#id-grid"] menyaring [data-filter-text] */
    document.querySelectorAll('input[data-filter]').forEach(function (input) {
        var grid = document.querySelector(input.getAttribute('data-filter'));
        if (!grid) return;
        var empty = grid.parentElement.querySelector('.m-filter-empty');
        input.addEventListener('input', function () {
            var q = input.value.trim().toLowerCase();
            var shown = 0;
            grid.querySelectorAll('[data-filter-text]').forEach(function (el) {
                var hit = !q || el.getAttribute('data-filter-text').indexOf(q) !== -1;
                el.classList.toggle('is-hidden', !hit);
                if (hit) { shown++; el.classList.add('in'); }
            });
            if (empty) empty.hidden = shown > 0;
        });
    });

    /* Checklist persyaratan PPDB */
    document.querySelectorAll('[data-checklist]').forEach(function (list) {
        var boxes = list.querySelectorAll('input[type=checkbox]');
        var bar = list.querySelector('.m-check-progress > span');
        var count = list.querySelector('[data-checked]');
        function update() {
            var n = Array.prototype.filter.call(boxes, function (b) { return b.checked; }).length;
            if (count) count.textContent = n;
            if (bar) bar.style.setProperty('--p', (boxes.length ? n / boxes.length * 100 : 0) + '%');
        }
        boxes.forEach(function (b) { b.addEventListener('change', update); });
        update();
    });

    /* Kartu struktur organisasi: ketuk untuk melihat detail (layar sentuh) */
    document.querySelectorAll('.m-person').forEach(function (card) {
        card.addEventListener('click', function () {
            var open = !card.classList.contains('open');
            document.querySelectorAll('.m-person.open').forEach(function (c) { c.classList.remove('open'); });
            card.classList.toggle('open', open);
        });
    });

    /* Pratinjau foto sebelum dikirim (buku tamu) */
    document.querySelectorAll('.m-photo-pick input[type=file]').forEach(function (input) {
        var wrap = input.closest('.m-photo-pick');
        var img = wrap.querySelector('img');
        input.addEventListener('change', function () {
            var file = input.files && input.files[0];
            if (!file || !img) return;
            img.src = URL.createObjectURL(file);
            img.hidden = false;
            wrap.classList.add('has-photo');
        });
    });
})();
