<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('asset/dist/img/book.jpg') ?>" alt="GenBI" width="80%" class="brand-image" style="opacity: .8"><br>
        <!-- <span class="brand-text font-weight-light">Manajemen Karyawan</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url(strtolower(session()->get('role'))) ?>/index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if(session()->get('role') == 'Admin'): ?>
                <li class="nav-item">
                    <a href="<?= base_url('admin/user') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pelajar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(strtolower(session()->get('role'))) ?>/daftarPelajar" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Pendaftaran Pelajar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(strtolower(session()->get('role'))) ?>/pelajar" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Pelajar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url(strtolower(session()->get('role'))) ?>/jadwal" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Jadwal Pelajaran
                        </p>
                    </a>
                </li>

                <?php if(session()->get('role') == 'Pengajar'): ?>
                <li class="nav-item">
                    <a href="<?= base_url(strtolower(session()->get('role'))) ?>/soal" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Soal
                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(session()->get('role') != 'Admin'): ?>
                <li class="nav-item">
                    <a href="<?= base_url(strtolower(session()->get('role'))) ?>/materi" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Materi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(strtolower(session()->get('role'))) ?>/pretryout" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Try Out
                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                        <i class='nav-icon fas fa-sign-out-alt'></i>
                        <p>Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    $(document).ready(function () {
        $('.has-treeview > a').on('click', function (e) {
            e.preventDefault();
            var parent = $(this).parent();

            if (parent.hasClass('menu-open')) {
                parent.removeClass('menu-open');
                parent.find('.nav-treeview').slideUp();
            } else {
                parent.addClass('menu-open');
                parent.find('.nav-treeview').slideDown();
            }
        });
    });

</script>