  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Siswa</h1>
    <hr class="sidebar-divider ">
		<div class="col-lg-10">
			<div class="row">
				<div class="col">
					<div class="card">
					  <div class="card-header font-weight-bold h5">
					    <?= $siswa['nis'] ?> - <?= $siswa['nama']; ?> 
					  </div>
					  <div class="card-body">
					  	<p class="font-weight-bold">Akun Siswa</p>
					  	<hr class="sidebar-divider">
						  <div class="col-lg-6">	
						  	<table class="table table-borderless ">
						  		<tr>
					  		      <td scope="row">Username</td>
					  		      <td>:</td>
					  		      <td><?= $siswa['username']; ?></td>
					  		     </tr> 
						  	</table>
						  </div>	
					  	<p class="font-weight-bold">Profil Siswa</p>
					  	<hr class="sidebar-divider"> 
				  		  <div class="col-lg-6">	
				  		  	<table class="table table-borderless">
				  		  		<tr>
				  	  		      <td scope="row">NIS</td>
				  	  		      <td>:</td>
				  	  		      <td><?= $siswa['nis']; ?></td>
								</tr>
								<tr>
				  	  		      <td scope="row">Nama</td>
				  	  		      <td>:</td>
				  	  		      <td><?= $siswa['nama']; ?></td>
								</tr>
								<tr>
				  	  		      <td scope="row">Kelas</td>
				  	  		      <td>:</td>
				  	  		      <td><?= $siswa['username']; ?></td>
								</tr>
								<tr>
				  	  		      <td scope="row">Pembimbing</td>
				  	  		      <td>:</td>
				  	  		      <td><?= $siswa['pembimbing']; ?></td>
								</tr>
								<tr>
								  <td scope="row">Status Laporan</td>
								  <td>:</td>
								  <td><?php if ($siswa['status']) echo '<a class="badge badge-success text-white" href="#" data-toggle="modal" data-target="#confirmOKModal">Disetujui</a>'; 
								  			else echo '<a class="badge badge-danger" href="#" data-toggle="modal" data-target="#confirmKOModal">Belum Disetujui</a>' ?>
								  </td>
								</tr>
				  		  	</table>
				  		  </div>	
					  </div>
					</div>
				</div>
			</div>
		</div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->