<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Manajemen Sidang</h1>
<hr class="sidebar-divider ">
<div class="col-lg-10">
	<div class="row">
		<div class="col">
		<?php echo $this->session->flashdata('msg'); ?>	
		<?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>', '</div>') ?>
			<div class="card">
				<div class="card-header">
					Tambah Jadwal Sidang
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/proses_sidang'); ?>" method="post">
						<p class="font-weight-bold"> Siswa </p>
						<hr class="sidebar-divider">
						<input type="hidden" name="id_siswa" value="<?= $this->session->userdata('id_siswa'); ?>">
						<div class="form-group row">
						    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="nama" value="<?= $siswa['nama']; ?>" readonly>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="kelas" value="<?= $siswa['kelas']; ?>" readonly>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Pembimbing</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="kelas" value="<?= $siswa['pembimbing']; ?>" readonly>
						    </div>
						</div>
						<p class="font-weight-bold"> Penguji Sidang </p>
						<hr class="sidebar-divider">
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Penguji 1</label>
						    <div class="col-sm-8">
								<select class="custom-select" name ="penguji1">
								  <option value="" selected>-- Penguji 1 --</option>
								 <?php foreach ($penguji as $row) : ?>
								  <option value="<?= $row['id'] ?>" <?php echo set_select('penguji1', $row['id']); ?> > <?= $row['nama']; ?> </option>
								 <?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Penguji 2</label>
						    <div class="col-sm-8">
								<select class="custom-select" name ="penguji2">
								  <option value="" selected>-- Penguji 2 --</option>
								 <?php foreach ($penguji as $row) : ?>
								  <option value="<?= $row['id'] ?>" <?php echo set_select('penguji2', $row['id']); ?> > <?= $row['nama']; ?> </option>
								 <?php endforeach; ?>
								</select>
							</div>
						</div>
						<p class="font-weight-bold"> Jadwal Sidang </p>
						<hr class="sidebar-divider">
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Tanggal</label>
						    <div class="col-sm-8">
								<select class="custom-select" name ="tanggal">
								  <option value="" selected>-- Tanggal --</option>
								 <?php foreach ($tanggal as $row) : ?>
								  <option value="<?= $row['id'] ?>" <?php echo set_select('tanggal', $row['id']); ?> > <?= $row['tanggal']; ?> </option>
								 <?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Waktu</label>
						    <div class="col-sm-8">
								<select class="custom-select" name ="waktu">
								  <option value="" selected>-- Waktu --</option>
								 
								 <?php foreach ($waktu as $row) : ?>
								  <option value="<?= $row['id'] ?>" <?php echo set_select('waktu', $row['id']); ?> > <?= $row['waktu']; ?> </option>
								 <?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Ruangan</label>
						    <div class="col-sm-8">
								<select class="custom-select" name ="ruangan">
								  <option value="" selected>-- Ruangan --</option>
								  <option value="Lab Dasar" <?php echo set_select('ruangan', 'Lab Dasar'); ?> >Lab Dasar</option>
								  <option value="Lab Simulasi" <?php echo set_select('ruangan', 'Lab Simulasi'); ?> >Lab Simulasi</option>
								  <option value="Lab Aplikasi" <?php echo set_select('ruangan', 'Lab Aplikasi'); ?> >Lab Aplikasi</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
						    <div class="col-sm-2">
						    </div>	
						    <div class="col-sm-8">
						    	<button type="submit" class="btn btn-primary"> Submit </button>
						    </div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->