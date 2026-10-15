/* =========================================================
   SMK KOSGORO — Upload foto admin
   - openFileUpload(inputId, previewId): API lama tetap dipakai form
   - Area seret & lepas + tempel (Ctrl+V) untuk setiap kolom foto
   - Progress upload dan kompres otomatis foto besar dari HP
   ========================================================= */
var inputId = '';
var previewId = '';

var MAX_UPLOAD = 5 * 1024 * 1024;   // batas server (UploadController: max 5120 KB)
var MAX_SIDE = 1920;                // sisi terpanjang setelah dikompres

function fmSetLink(url) {
    var path = '';
    if (url.indexOf('/storage/') !== -1) {
        path = 'storage/' + url.split('/storage/')[1];
    } else {
        var baseUrl = window.location.origin;
        path = url.replace(baseUrl, '').replace(/^\//, '');
    }
    if (inputId) {
        document.getElementById(inputId).value = path;
    }
    if (previewId) {
        setUploadPreview(previewId, url);
    }
}

function setUploadPreview(id, url) {
    var img = document.getElementById(id);
    if (!img) return;
    img.src = url;
    img.style.display = url ? 'block' : 'none';
    var zone = img.closest('.a-drop');
    if (zone) zone.classList.toggle('has-image', !!url);
}

/* Perkecil foto JPG/WebP yang besar sebelum dikirim. PNG/GIF dibiarkan (bisa transparan/animasi). */
function compressImage(file) {
    return new Promise(function (resolve) {
        if (!/^image\/(jpeg|webp)$/.test(file.type) || file.size < 1.5 * 1024 * 1024) return resolve(file);
        var img = new Image();
        var url = URL.createObjectURL(file);
        img.onload = function () {
            URL.revokeObjectURL(url);
            var scale = Math.min(1, MAX_SIDE / Math.max(img.width, img.height));
            var canvas = document.createElement('canvas');
            canvas.width = Math.round(img.width * scale);
            canvas.height = Math.round(img.height * scale);
            canvas.getContext('2d').drawImage(img, 0, 0, canvas.width, canvas.height);
            canvas.toBlob(function (blob) {
                if (!blob || blob.size >= file.size) return resolve(file);
                var name = file.name.replace(/\.[^.]+$/, '') + '.jpg';
                resolve(new File([blob], name, { type: 'image/jpeg' }));
            }, 'image/jpeg', 0.85);
        };
        img.onerror = function () { URL.revokeObjectURL(url); resolve(file); };
        img.src = url;
    });
}

function uploadImageFile(file, inputFieldId, previewFieldId) {
    inputId = inputFieldId;
    previewId = previewFieldId;
    if (!file) return;
    if (!/^image\//.test(file.type)) {
        alert('File harus berupa gambar (JPG, PNG, GIF, atau WebP).');
        return;
    }

    var btn = document.getElementById('btn-' + inputFieldId);
    var zone = btn ? btn.closest('.form-group') && btn.closest('.form-group').querySelector('.a-drop') : null;
    var btnHtml = btn ? btn.innerHTML : '';
    function busy(on, pct) {
        if (btn) {
            btn.disabled = on;
            btn.innerHTML = on ? '<i class="mdi mdi-loading mdi-spin"></i> ' + (pct != null ? pct + '%' : 'Memproses...') : btnHtml;
        }
        if (zone) {
            zone.classList.toggle('is-uploading', on);
            var bar = zone.querySelector('.a-drop-bar span');
            if (bar) bar.style.width = (on && pct != null ? pct : 0) + '%';
        }
    }

    busy(true, null);
    compressImage(file).then(function (ready) {
        if (ready.size > MAX_UPLOAD) {
            busy(false);
            alert('Ukuran foto terlalu besar (' + (ready.size / 1048576).toFixed(1) + ' MB). Maksimal 5 MB.');
            return;
        }
        var formData = new FormData();
        formData.append('file', ready);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/admin/upload-file');
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) busy(true, Math.round(e.loaded / e.total * 100));
        };
        xhr.onload = function () {
            busy(false);
            var data = {};
            try { data = JSON.parse(xhr.responseText); } catch (err) { /* respons bukan JSON */ }
            if (xhr.status === 200 && data.success) {
                document.getElementById(inputFieldId).value = data.path;
                if (previewFieldId) setUploadPreview(previewFieldId, data.url);
            } else {
                alert('Upload gagal: ' + (data.message || ('kode ' + xhr.status)));
            }
        };
        xhr.onerror = function () {
            busy(false);
            alert('Terjadi kesalahan saat upload. Periksa koneksi internet lalu coba lagi.');
        };
        xhr.send(formData);
    });
}

// Fungsi upload langsung dari perangkat (dipanggil oleh tombol "Pilih Foto" di setiap form)
function openFileUpload(inputFieldId, previewFieldId) {
    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';
    fileInput.addEventListener('change', function () {
        uploadImageFile(this.files[0], inputFieldId, previewFieldId);
    });
    document.body.appendChild(fileInput);
    fileInput.click();
    document.body.removeChild(fileInput);
}

/* Ubah setiap kolom foto (input readonly + tombol #btn-<id> + img#preview-*) menjadi area seret & lepas */
function enhanceUploadFields(root) {
    (root || document).querySelectorAll('input[readonly][id]').forEach(function (input) {
        var btn = document.getElementById('btn-' + input.id);
        var group = input.closest('.form-group');
        if (!btn || !group || group.querySelector('.a-drop')) return;
        var img = group.querySelector('img[id^="preview-"]');
        if (!img) return;

        var zone = document.createElement('div');
        zone.className = 'a-drop';
        zone.tabIndex = 0;
        zone.setAttribute('role', 'button');
        zone.setAttribute('aria-label', 'Unggah foto');
        zone.innerHTML =
            '<div class="a-drop-empty">' +
                '<i class="mdi mdi-cloud-upload-outline"></i>' +
                '<strong>Seret & lepas foto di sini</strong>' +
                '<span>atau klik untuk memilih &middot; bisa juga tempel (Ctrl+V)</span>' +
                '<small>JPG, PNG, WebP &middot; foto besar otomatis dikecilkan</small>' +
            '</div>' +
            '<div class="a-drop-actions">' +
                '<button type="button" class="a-drop-change"><i class="mdi mdi-image-edit-outline"></i> Ganti</button>' +
                '<button type="button" class="a-drop-remove"><i class="mdi mdi-close"></i> Hapus</button>' +
            '</div>' +
            '<div class="a-drop-bar"><span></span></div>';
        var inputGroup = input.closest('.input-group') || input;
        inputGroup.parentNode.insertBefore(zone, inputGroup.nextSibling);
        zone.insertBefore(img, zone.firstChild);
        img.removeAttribute('style');
        img.style.display = img.getAttribute('src') ? 'block' : 'none';
        zone.classList.toggle('has-image', !!img.getAttribute('src'));
        img.addEventListener('error', function () { zone.classList.add('is-broken'); });
        if (img.getAttribute('src') && img.complete && img.naturalWidth === 0) zone.classList.add('is-broken');
        img.addEventListener('load', function () { zone.classList.remove('is-broken'); });

        function pick() { btn.click(); }
        function upload(file) { uploadImageFile(file, input.id, img.id); }

        zone.addEventListener('click', function (e) {
            if (e.target.closest('.a-drop-remove')) {
                e.stopPropagation();
                input.value = '';
                setUploadPreview(img.id, '');
                return;
            }
            pick();
        });
        zone.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); pick(); }
        });
        ['dragenter', 'dragover'].forEach(function (ev) {
            zone.addEventListener(ev, function (e) { e.preventDefault(); zone.classList.add('is-over'); });
        });
        ['dragleave', 'drop'].forEach(function (ev) {
            zone.addEventListener(ev, function (e) { e.preventDefault(); zone.classList.remove('is-over'); });
        });
        zone.addEventListener('drop', function (e) {
            var file = e.dataTransfer.files && e.dataTransfer.files[0];
            if (file) upload(file);
        });
        zone.addEventListener('paste', function (e) {
            var items = (e.clipboardData || {}).items || [];
            for (var i = 0; i < items.length; i++) {
                if (items[i].kind === 'file' && /^image\//.test(items[i].type)) {
                    e.preventDefault();
                    upload(items[i].getAsFile());
                    return;
                }
            }
        });
    });
}

/* Thumbnail yang filenya hilang diganti placeholder agar tabel tetap rapi */
document.addEventListener('error', function (e) {
    var img = e.target;
    if (img.tagName === 'IMG' && img.closest('table') && !img.classList.contains('a-img-missing')) {
        img.classList.add('a-img-missing');
        img.removeAttribute('src');
        img.alt = '';
    }
}, true);

document.addEventListener('DOMContentLoaded', function () { enhanceUploadFields(); });
// Form yang dimuat lewat modal (triggerFormModal) juga ikut ditingkatkan
if (window.MutationObserver) {
    new MutationObserver(function (list) {
        list.forEach(function (m) {
            m.addedNodes.forEach(function (n) { if (n.nodeType === 1) enhanceUploadFields(n); });
        });
    }).observe(document.documentElement, { childList: true, subtree: true });
}
