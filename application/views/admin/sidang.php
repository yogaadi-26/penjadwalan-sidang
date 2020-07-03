        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manajemen Sidang </h1>
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
          			    Pilih Siswa
          			  </div>
          			  <div class="card-body">
          			  	<form action="<?= base_url('admin/add_sidang') ?>" method="post"> 
          			  	   <div class="form-group row">
	      			  	      <label for="namasiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
	      			  	      <div class="col-sm-8 pb-3">
	      			  	        <input type="text" class="form-control" id="namasiswa" name="nama">
	      			  	      </div>
		      			  	   </div> 
		      			  	    <div class="form-group row">
		      			  	      <label for="nissiswa" class="col-sm-2 col-form-label">NIS</label>
		      			  	      <div class="col-sm-8">
		      			  	        <input type="text" class="form-control" id="nissiswa" name="nis" readonly>
		      			  	      </div>
		      			  	   </div> 
		      			  	    <div class="form-group row">
		      			  	      <label for="kelassiswa" class="col-sm-2 col-form-label">Kelas</label>
		      			  	      <div class="col-sm-8">
		      			  	        <input type="text" class="form-control" id="kelassiswa" name="kelas" readonly>
		      			  	      </div>
		      			  	   </div> 
		      			  	    <div class="form-group row">
		      			  	      <label for="statussiswa" class="col-sm-2 col-form-label">Status</label>
		      			  	      <div class="col-sm-8">
		      			  	        <input type="text" class="form-control" id="statussiswa" name="status" readonly>
		      			  	      </div>
		      			  	   </div>
		      			  	   <input type="hidden" name="id">
		      			  	   <input type="hidden" name="pembimbing"> 
	      			  	       <div class="form-group row pt-2">
	      			  	         <div class="col-sm 2"></div>
	      			  	         <div class="col-sm-10 ">
	      			  	   			<button type="submit" class="btn btn-primary">Submit</button>
	      			  	         </div>
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