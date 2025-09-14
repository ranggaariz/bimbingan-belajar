<div class="container pt-5">
    <h3><?= esc($title) ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Form Kuasa Pemotongan Gaji</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Penyetujuan Pemotongan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open('', ['id' => 'FrmAddMahasiswa', 'method' => 'post', 'autocomplete' => 'off']) ?>

                    <?php foreach ($permohonan as $key): ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <label for="nama" class="col-sm-9 col-form-label">: <?= esc($key->nama) ?></label>
                    </div>

                    <div class="form-group row">
                        <label for="no_anggota" class="col-sm-3 col-form-label">No. Anggota Koperasi</label>
                        <label for="no_anggota" class="col-sm-9 col-form-label">: <?= esc($key->no_anggota) ?></label>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
                        <label for="no_hp" class="col-sm-9 col-form-label">: <?= esc($key->no_hp) ?></label>
                    </div>

                    <div class="form-group row">
                        <label for="alm_rumah" class="col-sm-3 col-form-label">Alamat Rumah</label>
                        <label for="alm_rumah" class="col-sm-9 col-form-label">: <?= esc($key->alm_rumah) ?></label>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-12 col-form-label">Dengan ini memberi kuasa kepada : </label>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <label for="nama" class="col-sm-9 col-form-label">: SATIAWAN BAYU SANTOSO, S.Kom</label>
                    </div>

                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <label for="jabatan" class="col-sm-9 col-form-label">: BPP UPTD PPD Batam Centre</label>
                    </div>

                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-12 col-form-label">Untuk memotong gaji pemberi kuasa dari bulan <?= esc($key->mulai_bulan) ?> s/d bulan <?= esc($key->selesai_bulan) ?> sebesar Rp. <?= esc($key->angsuran) ?> / bulan dan untuk selanjutnya disetorkan kepada Kas Koperasi Tunas Amanah.</label>
                    </div>

                    <div class="form-group row">
                        <label for="ttd_ppgaji" class="col-sm-2 col-form-label">Tanda Tangan</label>
                        <div class="col-sm-10">
                            <div id="sig"></div><br>
                            <input type="hidden" id="signature64" name="ttd_ppgaji" value="<?= old('ttd_ppgaji') ?>">
                            <button id="clear">Hapus Tanda Tangan</button>
                        </div>
                    </div>

                    <?php endforeach; ?>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="<?= base_url('anggota/ppgaji/' . esc($id_permohonan)) ?>">Kembali</a>
                        </div>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .kbw-signature { width: 200px; height: 200px;}
    #sig canvas {
        width: 100% !important;
        height: auto;
    }
</style>

<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
