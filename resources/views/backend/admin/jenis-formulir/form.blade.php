<div id="content">
    <div class="modal-header bg-primary text-white" style="margin: 0px;padding-left: 20px;padding-right: 0px;padding-bottom: 10px;padding-top: 0px">
        <h5 class="modal-title  text-white" id="mediumModalLabel">{{ isset($data) != null ? "Edit" : "Tambah" }} Data</h5>
    </div>
    <form data-target="{{ url($url) }}" id="{{$action}}" onsubmit="return false;">
	    <div class="modal-body">
    		@csrf
    		<div class="card-body" style="padding: 0px 0px">
    			<div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" name="nama"  value="{{ isset($data) != null ? $data->nama : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" value="{{ isset($data) != null ? $data->tahun_ajaran : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="aktif" {{ isset($data) != null ? ($data->status == "aktif" ? "selected" : "") : "" }}>aktif</option>
                            <option value="nonaktif" {{ isset($data) != null ? ($data->status == "nonaktif" ? "selected" : "") : "" }}>nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Biaya Formulir</label>
                        <input type="number" class="form-control" name="biaya_formulir" value="{{ isset($data) != null ? $data->biaya_formulir : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Nomor Rekening</label>
                        <input type="text" class="form-control" name="no_rekening" value="{{ isset($data) != null ? $data->no_rekening : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Nama Bank Rekening</label>
                        <input type="text" class="form-control" name="nama_bank_rekening" value="{{ isset($data) != null ? $data->nama_bank_rekening : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Biaya Uang Pangkal</label>
                        <input type="number" class="form-control" name="biaya_uang_pangkal" value="{{ isset($data) != null ? $data->biaya_uang_pangkal : "" }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label">Minimal Bayar Uang Pangkal</label>
                        <input type="number" class="form-control" name="minimal_uang_pangkal" value="{{ isset($data) != null ? $data->minimal_uang_pangkal : "" }}" required>
                    </div>
                </div>
    		</div>
	    </div>
	    <div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			<button type="button" class="btn btn-secondary btn-sm clear-form" data-dismiss="modal" aria-label="Close">Kembali</button>
	    </div>
    </form>

</div>
