<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Hasil Permohonan Disetujui</a></li>
            <li class="breadcrumb-item active" aria-current="page">Upload Bukti Transfer</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    echo form_open_multipart('');
                    ?>
                    <div class="form-group row">
                        <label for="bukti_tf" class="col-sm-2 col-form-label">Bukti Transfer</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="bukti_tf">
                            <small>*png</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="<?= base_url('admin/setuju')?>">Kembali</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>