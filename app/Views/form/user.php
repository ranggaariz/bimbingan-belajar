<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= esc($title) ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a>User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Add User</li>
            </ol>
        </nav>

        <?= form_open_multipart('admin/addUser'); ?>

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
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password" name="password" value="<?= old('password') ?>">
                                <?php if (isset($validation) && $validation->getError('password')): ?>
                                    <div class="text-danger"><?= $validation->getError('password') ?></div>
                                <?php endif; ?>
                            </div>

                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="role">
                                    <option value="" <?= old('role') == '' ? 'selected' : '' ?>>-- Pilih --</option>
                                    <option value="Admin" <?= old('role') == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="Pengajar" <?= old('role') == 'Pengajar' ? 'selected' : '' ?>>Pengajar</option>
                                    <option value="Pelajar" <?= old('role') == 'Pelajar' ? 'selected' : '' ?>>Pelajar</option>
                                </select>
                                <?php if (isset($validation) && $validation->getError('role')): ?>
                                    <div class="text-danger"><?= $validation->getError('role') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
            </div>
        </div>

        <?= form_close(); ?>
    </div>
</div>
