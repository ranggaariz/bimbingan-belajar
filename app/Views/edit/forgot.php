<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
        </ol>
    </nav>
                    <!-- <?php $data = $this->session->userdata(); ?> -->
                    <?php if ($this->session->flashdata('password')) :
                            echo $this->session->flashdata('password');
                        endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditMahasiswa', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>  
                     <!-- <form action="<?= base_url('admin/save_password'); ?>" method="POST">   -->

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Masukkan NIP anda</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="nip" maxlength="100" placeholder="Masukkan NIP anda" required>
                            <small class="text-danger">
                                <?php echo form_error('old') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="new" maxlength="100" placeholder="Masukkan password baru anda" value="<?= set_value('new'); ?>"required>
                            <small class="text-danger">
                                <?php echo form_error('new') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Masukkan Kembali Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="re_new" maxlength="100" placeholder="Masukkan kembali password baru anda" value="<?= set_value('re_new'); ?>"required>
                            <small class="text-danger">
                                 <?php echo form_error('re_new') ?> 
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>