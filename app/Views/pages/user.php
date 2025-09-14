<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->get('role') == 'Admin') : ?>
                        <a href="<?= base_url(route_to('admin.formUser')) ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User</a>
                        <hr>
                    <?php endif; ?>
                    
                    <div mb-2>
                        <!-- Display flash data (message when data is successfully saved) -->
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
                        <?php endif; ?>
                    </div>

                    <table id="tablePengguna" class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-success">
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <?php if (session()->get('role') == 'Admin') : ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_user as $row) : ?>
                                <tr>
                                    <td><?= esc($row['nama']) ?></td>
                                    <td><?= esc($row['username']) ?></td>
                                    <td><?= esc($row['role']) ?></td>
                                    <?php if (session()->get('role') == 'Admin') :?> 
                                    <td>
                                        <a href="<?= base_url(route_to('admin.formEditUser', $row['id_user'])) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0);" data-id="<?= $row['id_user'] ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal tambah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-user" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelModal">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('admin.addUser') ?>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="nama" value="<?= old('nama') ?>">
                            <div class="text-danger"><?= session('errors.nama') ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>">
                            <div class="text-danger"><?= session('errors.username') ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="text-danger"><?= session('errors.password') ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role">
                                <option value="" selected>-- Pilih --</option>
                                <option value="Admin" <?= old('role') == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="Pengajar" <?= old('role') == 'Pengajar' ? 'selected' : '' ?>>Pengajar</option>
                                <option value="Pelajar" <?= old('role') == 'Pelajar' ? 'selected' : '' ?>>Pelajar</option>
                            </select>
                            <div class="text-danger"><?= session('errors.role') ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        </div>
                    </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal dialog delete data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Alert!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btdelete">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize DataTable plugin
    $('#tablePengguna').DataTable({
        "ordering": false
    });

    // Show delete confirmation modal
    $('#tablePengguna').on('click', '.item-delete', function() {
        var id = $(this).data('id');
 
        $('#myModalDelete').modal('show');
        
        // On confirming delete, perform AJAX request
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url(route_to("admin.deleteUser")) ?>',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>
