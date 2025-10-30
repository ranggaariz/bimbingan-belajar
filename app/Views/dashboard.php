<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php if (session()->get('role') == 'Admin'): ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$totalUser?></h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-stream"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$totalPendaftar?></h3>
                <p>Pendaftar</p>
              </div>
              <div class="icon">
                <i class="fas fa-stream"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$totalPelajar?></h3>
                <p>Pelajar</p>
              </div>
              <div class="icon">
                <i class="fas fa-stream"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <?php endif ?>
        <?php if (session()->get('role') == 'Pelajar'): ?>
          <div class="col-lg-12 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$totalPelajar?></h3>
                <p>Total Pelajar</p>
              </div>
              <div class="icon">
                <i class="fas fa-stream"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <?php endif ?>
        </div>

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Welcome (SIBEL)!
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <h1 align="center">Selamat Datang <?= session()->get('nama') ?>!</h1>
                  <h3 align="center">Sistem Informasi Bimbingan Belajar (SIBEL)</h3>
                  <h3 class="text-center">
                    <img src="<?= base_url('asset/dist/img/book.jpg') ?>" alt="GenBI" width="40%" class="brand-image" style="opacity: .8"><br>
                  </h3>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
