<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= esc($title ?? 'Tambah Soal') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('pengajar/soal'); ?>">Soal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Add Soal</li>
            </ol>
        </nav>

        <?= form_open('pengajar/addSoal2/' . $id_jadwal); ?>

        <div class="card">
            <div class="card-body">
                <h4>Buat Soal</h4><hr>

                <div class="form-group">
                    <label for="soal">Tingkatan</label>
                    <select class="form-control" name="tingkatan">
                        <option value="" <?= old('tingkatan') == '' ? 'selected' : '' ?>>-- Pilih --</option>
                        <option value="SMA" <?= old('tingkatan') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                        <option value="SMP" <?= old('tingkatan') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                        <option value="SD"  <?= old('tingkatan') == 'SD' ? 'selected' : '' ?>>SD</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="soal">Soal</label>
                    <textarea class="form-control" id="soal" name="soal" rows="3" required><?= old('soal') ?></textarea>
                </div>

                <h5>Jawaban Pilihan Ganda</h5>
                <small class="text-muted">Centang salah satu jawaban yang benar.</small><br><br>

                <?php for ($i = 0; $i < 4; $i++): ?>
                    <div class="form-group row">
                        <div class="col-sm-1 text-center">
                            <input type="radio" name="benar" value="<?= $i ?>" required>
                        </div>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" name="jawaban[<?= $i ?>]" placeholder="Jawaban <?= chr(65+$i) ?>" required>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="form-group row justify-content-center mt-3">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('pengajar/soal'); ?>" class="btn btn-secondary">Batal</a>
            </div>
        </div>

        <?= form_close(); ?>
    </div>
</div>
