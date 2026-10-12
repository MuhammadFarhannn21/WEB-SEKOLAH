<footer class="footer">
    {{ \App\Aplikasi::first()->copyright}}
</footer>

<script>
var inputId = '';
var previewId = '';

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
        document.getElementById(previewId).src = url;
        document.getElementById(previewId).style.display = 'block';
    }
}

// Fungsi upload langsung dari perangkat
function openFileUpload(inputFieldId, previewFieldId) {
    inputId = inputFieldId;
    previewId = previewFieldId;

    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';

    fileInput.addEventListener('change', function() {
        var file = this.files[0];
        if (!file) return;

        var formData = new FormData();
        formData.append('file', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        // Tampilkan loading
        var btn = document.getElementById('btn-' + inputFieldId);
        if (btn) { btn.innerHTML = '<i class="mdi mdi-loading mdi-spin"></i> Uploading...'; btn.disabled = true; }

        fetch('/admin/upload-file', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(inputId).value = data.path;
                if (previewId) {
                    document.getElementById(previewId).src = data.url;
                    document.getElementById(previewId).style.display = 'block';
                }
            } else {
                alert('Upload gagal: ' + data.message);
            }
        })
        .catch(error => {
            alert('Terjadi kesalahan saat upload');
            console.error(error);
        })
        .finally(() => {
            if (btn) { btn.innerHTML = '<i class="mdi mdi-folder-image"></i> Pilih Foto'; btn.disabled = false; }
        });
    });

    document.body.appendChild(fileInput);
    fileInput.click();
    document.body.removeChild(fileInput);
}
</script>