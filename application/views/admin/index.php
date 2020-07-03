        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
          <hr class="sidebar-divider ">

      <div class="row">
      	  <div class="col-lg-10">
          	<p class="font-weight-bold"> Data User </p>
          	<hr class="sidebar-divider">
          </div>	
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
          	<a href="<?= base_url('admin/data_siswa'); ?>" style="text-decoration: none;">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Siswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
          	</a>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <a href="<?= base_url('admin/data_guru'); ?>" style="text-decoration: none;">	
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Guru</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $guru; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
             </a> 
            </div>
          </div>
      </div>

      <div class="row">
      	  <div class="col-lg-10">
          	<p class="font-weight-bold"> Status Laporan Siswa </p>
          	<hr class="sidebar-divider">
          </div>
      		<div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Terpenuhi</div>
                    <div class="h5 mb-0 font-weight-bold text-white-800"><?= $status_ok; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-check fa-2x text-white-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Belum Terpenuhi</div>
                    <div class="h5 mb-0 font-weight-bold text-white-800"><?= $status_failed; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-times fa-2x text-white-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      	<div class="row">
      		  <div class="col-lg-10">
      	    	<p class="font-weight-bold"> Data Sidang </p>
      	    	<hr class="sidebar-divider">
      	      </div>
      	      <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow h-100 py-2">
            <a href="<?= base_url('admin/jadwal_sidang'); ?>" style="text-decoration: none; color: white;">	
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jadwal Sidang</div>
                    <div class="h5 mb-0 font-weight-bold text-white-800"><?= $sidang; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
          	 </a>
            </div>
          </div>
        </div>  	

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->