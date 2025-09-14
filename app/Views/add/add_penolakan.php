<div class="container pt-5">
    <h3><?= esc($title) ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Permohonan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Permohonan Pengajuan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open('', ['id' => 'FrmAddMahasiswa', 'method' => 'post', 'autocomplete' => 'off']) ?>
                    <div class="form-group row">
                        <label for="keterangan_penolakan" class="col-sm-2 col-form-label">Keterangan Penolakan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan_penolakan" id="keterangan_penolakan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
