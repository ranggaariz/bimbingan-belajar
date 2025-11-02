<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= esc($title) ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a>User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Add User</li>
            </ol>
        </nav>

        <?= form_open_multipart('login/saveRegister'); ?>

        <!-- group 1 -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile</h4><hr>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="name" name="nama" value="<?= old('nama') ?>">
                                <?php if (isset($validation) && $validation->getError('nama')): ?>
                                    <div class="text-danger"><?= $validation->getError('nama') ?></div>
                                <?php endif; ?>
                            </div>

                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>">
                                <?php if (isset($validation) && $validation->getError('username')): ?>
                                    <div class="text-danger"><?= $validation->getError('username') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="password" value="<?= old('password') ?>">
                                <?php if (isset($validation) && $validation->getError('password')): ?>
                                    <div class="text-danger"><?= $validation->getError('password') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="name" name="email" value="<?= old('email') ?>">
                                <?php if (isset($validation) && $validation->getError('email')): ?>
                                    <div class="text-danger"><?= $validation->getError('email') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="alamat" value="<?= old('alamat') ?>">
                                <?php if (isset($validation) && $validation->getError('alamat')): ?>
                                    <div class="text-danger"><?= $validation->getError('alamat') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <label for="name" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="name" name="umur" value="<?= old('umur') ?>">
                                <?php if (isset($validation) && $validation->getError('umur')): ?>
                                    <div class="text-danger"><?= $validation->getError('umur') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="" <?= old('jenis_kelamin') == '' ? 'selected' : '' ?>>-- Pilih --</option>
                                    <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <?php if (isset($validation) && $validation->getError('jenis_kelamin')): ?>
                                    <div class="text-danger"><?= $validation->getError('jenis_kelamin') ?></div>
                                <?php endif; ?>
                            </div>

                            <label for="username" class="col-sm-2 col-form-label">No. HP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="no_hp" value="<?= old('no_hp') ?>">
                                <?php if (isset($validation) && $validation->getError('no_hp')): ?>
                                    <div class="text-danger"><?= $validation->getError('no_hp') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tingkatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tingkatan">
                                    <option value="" <?= old('tingkatan') == '' ? 'selected' : '' ?>>-- Pilih --</option>
                                    <option value="SMA" <?= old('tingkatan') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                                    <option value="SMP" <?= old('tingkatan') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                </select>
                                <?php if (isset($validation) && $validation->getError('jenis_kelamin')): ?>
                                    <div class="text-danger"><?= $validation->getError('jenis_kelamin') ?></div>
                                <?php endif; ?>
                            </div>
                            </div>

                        <div class="from-group row">
                            <label for="name" class="col-sm-2 col-form-label">Upload Bukti Bayar, Silahkan Bayar Dengan Norek Yang Tertera</label>
                            <div class="col-sm-10">
                            <label for="userfile" class="col-sm-10 col-form-label">Upload File (Norek BNI 1347528166 A.N Admin Bimbel)</label>
                            <input type="file" name="userfile" class="form-control">
                            <?php if (isset($validation) && $validation->getError('userfile')): ?>
                                 <div class="text-danger"><?= $validation->getError('userfile') ?></div>
                            <?php endif; ?>
                         </div>
                         </div>  
                            </div>
                        </div>
        

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="history.back()"> Batal</button>
            </div>
        </div>

        <?= form_close(); ?>
    </div>
</div>
