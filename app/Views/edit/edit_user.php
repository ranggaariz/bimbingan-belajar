<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditMahasiswa', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="id_user" value="<?=$data_user->id_user; ?>">
                            <input type="text" class="form-control" name="nama" value="<?=$data_user->nama; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="<?=$data_user->username; ?>">
                            <small class="text-danger">
                                <?php echo form_error('username') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" value="<?= $data_user->password; ?>">
                            <small class="text-danger">
                                <?php echo form_error('password') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="periode" class="col-sm-2 col-form-label">Role</label>

                        <div class="col-sm-10">
                        <select class="form-control" name="id_role">
                            <?php foreach ($data_role as $dp) { ?>
                                <option value="<?= $dp->id_role?>" <?php if ($data_user->id_role == $dp->id_role) : echo "selected";
                                                        endif; ?>><?= $dp->nama_role ?></option>
                            <?php }
                            ?>
                        </select>
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