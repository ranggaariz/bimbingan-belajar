<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Soal</h1>
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
                    <?php if (session()->get('role') == 'Pengajar') : ?>
                        <!-- <a class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah">Tambah Soal</a> -->
                        <a href="<?= base_url(route_to('pengajar.formSoal')) ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Soal</a>
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
                                <th>Judul</th>
                                <?php if (session()->get('role') == 'Pengajar') : ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_master as $row) : ?>
                                <tr>
                                    <td><?= esc($row->soal) ?></td>
                                    <?php if (session()->get('role') == 'Pengajar') :?> 
                                    <td>
                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?=$row->id_soal?>"><i class="fa fa-edit"></i></a>
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$row->id_soal?>" class="modal fade">
                                                 <div class="modal-dialog modal-lg">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title" id="LabelModal">Edit Jadwal</h5>
                                                             <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                                                                <span arial-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                          <div class="modal-body">
                                                                  <?php
                                                                echo form_open_multipart('pengajar/editSoal/'.$row->id_soal);
                                                                ?>
                                                                <div class="form-group row">
                                                                    <label for="nama" class="col-sm-2 col-form-label">Judul Soal</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" name="id_soal" value="<?=$row->id_soal; ?>">
                                                                        <input type="text" class="form-control" name="soal" value="<?=$row->soal; ?>">
                                                                        <small class="text-danger">
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10 offset-md-2">
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                                                                    </div>
                                                                </div>
                                                                <?php echo form_close(); ?>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                            <a href="<?= base_url(route_to('pengajar.formJawaban', $row->id_soal)) ?>" class="btn btn-primary btn-sm"><i class="fa fa-book"></i></a>
                                            <a href="javascript:void(0);" data-id="<?= $row->id_soal ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <!-- <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> -->
                 <h5 class="modal-title" id="LabelModal">Tambah Soal</h5>
                 <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
             </div>
              <div class="modal-body">
                      <?php
                    echo form_open_multipart('pengajar/addSoal');
                    ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Judul Soal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="soal" name="soal">
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
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
                url: '<?= base_url(route_to("pengajar.deleteSoal")) ?>',
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
