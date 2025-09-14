<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= esc($title) ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a>User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit User</li>
            </ol>
        </nav>

        <?php foreach ($data_user as $row): ?>
            <?= form_open_multipart('karyawan/uploadprofile/' . $row->id_user); ?>

            <!-- group 1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Profile Picture</h4><hr>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="name" name="picture" value="<?= old('picture') ?>">
                                    <!-- Validation error handling for 'picture' field -->
                                    <?php if (isset($validation) && $validation->getError('picture')): ?>
                                        <div class="text-danger"><?= $validation->getError('picture') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-secondary" href="javascript:history.back()">Batal</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?= form_close(); ?>
        <?php endforeach; ?>
    </div>
</div>
