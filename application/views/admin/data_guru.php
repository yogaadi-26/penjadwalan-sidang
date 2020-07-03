<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 my-4 text-gray-800">Data Guru</h1>
  <hr class="sidebar-divider">

  <!-- Profile -->
  <div class="col-lg-10">
    <div class="row mb-3">
  <?php foreach ($guru as $row ): ?>
       <div class="col-lg-6 mb-2">
         <div class="card ">
           <div class="card-body">
            <div class="row">
              <div class="col-1">
                <i class="fas fa-fw fa-address-card"></i>
              </div>
              <div class="col">
             <h5 class="card-title text-dark font-weight-bold"><?= $row['nama']; ?></h5>
             </div>
            </div> 
            <div class="row">
              <div class="col-1">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="col">
             <p class="card-text small text-primary"><?= $row['email']; ?></p>
              </div>
             </div> 
           </div>
         </div>
        </div>   
    <?php endforeach; ?>    
       </div> 
      

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->  