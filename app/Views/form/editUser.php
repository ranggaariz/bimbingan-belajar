<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= $title ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a>User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit User</li>
            </ol>
        </nav>

        <?php 
            if (session()->get('role') == 'Pengajar') echo form_open('pengajar/editUser/' . $data_user['id_user'], ['enctype' => 'multipart/form-data']); 
            if (session()->get('role') == 'Pelajar') echo form_open('pelajar/editUser/' . $data_user['id_user'], ['enctype' => 'multipart/form-data']); 
            if (session()->get('role') == 'Admin') echo form_open('admin/editUser/' . $data_user['id_user'], ['enctype' => 'multipart/form-data']); 
        ?>

        <!-- group 1 -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile</h4><hr>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="name" name="nama" value="<?= esc($data_user['nama']) ?>">
                            </div>

                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="role">
                                    <option value="Admin" <?= $data_user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="Pengajar" <?= $data_user['role'] == 'Pengajar' ? 'selected' : '' ?>>Pengajar</option>
                                    <option value="Pelajar" <?= $data_user['role'] == 'Pelajar' ? 'selected' : '' ?>>Pelajar</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>

        </form>


    </div>
</div>
