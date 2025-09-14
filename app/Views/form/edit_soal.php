<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= esc($title ?? 'Edit Soal') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('pengajar/soal'); ?>">Soal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Soal</li>
            </ol>
        </nav>

        <?= form_open('pengajar/updateSoal/' . $soal['id_soal']); ?>

        <div class="card">
            <div class="card-body">
                <h4>Edit Soal</h4><hr>

                <div class="form-group">
                    <label for="soal">Soal</label>
                    <textarea class="form-control" id="soal" name="soal" rows="3" required><?= old('soal', $soal['soal']) ?></textarea>
                </div>

                <h5>Jawaban Pilihan Ganda</h5>
                <small class="text-muted">Centang salah satu jawaban yang benar.</small><br><br>

                <?php foreach ($jawaban as $index => $jwb): ?>
                    <div class="form-group row">
                        <div class="col-sm-1 text-center">
                            <input type="radio" name="benar" value="<?= $index ?>"
                                   <?= $jwb['benar'] == 1 ? 'checked' : '' ?>>
                        </div>
                        <div class="col-sm-11">
                            <input type="hidden" name="id_jawaban[<?= $index ?>]" value="<?= $jwb['id_jawaban'] ?>">
                            <input type="text" class="form-control" 
                                   name="jawaban[<?= $index ?>]" 
                                   value="<?= old("jawaban.$index", $jwb['jawaban']) ?>" 
                                   placeholder="Jawaban <?= chr(65+$index) ?>" required>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-group row justify-content-center mt-3">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('pengajar/soal'); ?>" class="btn btn-secondary">Batal</a>
            </div>
        </div>

        <?= form_close(); ?>
    </div>
</div>
