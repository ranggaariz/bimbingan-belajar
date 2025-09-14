<div class="content-wrapper">
    <div class="container-fluid">
        <h3><?= $title ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a>User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Upload Profile</li>
            </ol>
        </nav>

        <?php 
            if (session()->get('role') == 'Karyawan') echo form_open('karyawan/uploadProfile/' . $data_user['id_user'], ['enctype' => 'multipart/form-data']); 
            if (session()->get('role') == 'Supervisor') echo form_open('supervisor/uploadProfile/' . $data_user['id_user'], ['enctype' => 'multipart/form-data']); 
        ?>
        <?= csrf_field() ?>
        <!-- group 1 -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile</h4><hr>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required>
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
