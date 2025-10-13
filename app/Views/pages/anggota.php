<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anggota</h1>
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
                    
                    <a href="<?= base_url(route_to('admin.export')) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Export To Excel</a>
                    <hr>
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
                                <th>Umur</th>
                                <th>Tingkatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Bukti Bayar</th>
                                <?php if (session()->get('role') == 'Admin') : ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_master as $row) : ?>
                                <tr>
                                    <td><?= esc($row->nama) ?></td>
                                    <td><?= esc($row->umur) ?></td>
                                    <td><?= esc($row->tingkatan) ?></td>
                                    <td><?= esc($row->jenis_kelamin) ?></td>
                                    <td><?= esc($row->alamat) ?></td>
                                    <td><?= esc($row->no_hp) ?></td>
                                    <td>
                                        <?php if ($row->userfile != null && $row->userfile != "") :?>
                                            <a href="<?=base_url()?>/asset/upload/<?= $row->userfile ?>">File</a>
                                        <?php endif;?>
                                    </td>
                                    <?php if (session()->get('role') == 'Admin') :?> 
                                    <td>
                                        <a href="javascript:void(0);" data-id="<?= $row->id_user ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i></a>
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
