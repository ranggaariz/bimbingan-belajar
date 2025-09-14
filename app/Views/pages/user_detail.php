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
                    <div mb-2>
                        <!-- Display flash data (message when data is successfully saved) -->
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="card-group">
                        <div class="card">
                        </div>
                        <div class="card card-dark text-black bg-light mb-3" style="max-width: 28rem;">
                            <div class="card-header">Profile</div>
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="<?= $picture ?>"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= esc($data_user['name']) ?></h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Employee Number</b> <p class="float-right"><?= esc($data_user['employee_number']) ?></p>
                              2      </li>
                                    <li class="list-group-item">
                                        <b>Date of Join</b> <p class="float-right"><?= esc($data_user['join_date']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Department</b> <p class="float-right"><?= esc($data_user['department']) ?></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card card-dark text-black bg-light mb-3 mr-3" style="max-width: 28rem;">
                            <div class="card-header"><i class="fa fa-user"></i> Personal Data</div>
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>ID Card Number</b> <br> <p class="float-left"><?= esc($data_user['card_number']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <br> <p class="float-left"><?= esc($data_user['gender']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Place, Date of Birth</b> <br> <p class="float-left"><?= esc($data_user['tempat_lahir']) ?>, <?= esc($data_user['tanggal_lahir']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Religion</b> <br> <p class="float-left"><?= esc($data_user['religion']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Race</b> <br> <p class="float-left"><?= esc($data_user['race']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Last Education</b> <br> <p class="float-left"><?= esc($data_user['last_education']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Blood Type</b> <br> <p class="float-left"><?= esc($data_user['blood_type']) ?></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-dark text-black bg-light mb-3 mr-3" style="max-width: 28rem;">
                            <div class="card-header"><i class="fa fa-home"></i> Address</div>
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Phone Number</b> <br> <p class="float-left"><?= esc($data_user['phone_number']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Personal E-mail</b> <br> <p class="float-left"><?= esc($data_user['email']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b> <br> <p class="float-left"><?= esc($data_user['address']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>City</b> <br> <p class="float-left"><?= esc($data_user['city']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Province</b> <br> <p class="float-left"><?= esc($data_user['province']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Postal Code</b> <br> <p class="float-left"><?= esc($data_user['postal_code']) ?></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-dark text-black bg-light mb-3 mr-3" style="max-width: 28rem;">
                            <div class="card-header"><i class="fa fa-ambulance"></i> Emergency Contact</div>
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Name</b> <br> <p class="float-left"><?= esc($data_user['contact_name']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Relationship</b> <br> <p class="float-left"><?= esc($data_user['contact_relation']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone Number</b> <br> <p class="float-left"><?= esc($data_user['contact_phone']) ?></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-dark text-black bg-light mb-3 mr-3" style="max-width: 28rem;">
                            <div class="card-header"><i class="fa fa-users"></i> Dependent</div>
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Martial Status</b> <br> <p class="float-left"><?= esc($data_user['martial_status']) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Dependent Total</b> <br> <p class="float-left"><?= esc($data_user['dependent_total']) ?></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <?php if (session()->get('role') != 'Admin') : ?> 
                    <a href="<?= base_url(strtolower(session()->get('role')) . '/openUser/' . session()->get('id_user')) ?>" class="nav-link">
                        <a href="<?= base_url(route_to(strtolower(session()->get('role')) . '.formEditUser', $data_user['id_user'])) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
                        <a href="<?= base_url(route_to(strtolower(session()->get('role')) . '.uploadPicture', $data_user['id_user'])) ?>" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload Profile Picture</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

</div>

<script>
    // Display data in table using DataTables plugin
    $('#tablePengguna').DataTable({
        "ordering": false
    });
</script>
