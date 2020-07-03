<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Data Siswa</h1>
  <hr class="sidebar-divider ">

  <!-- Profile -->
  <div class="col-lg-10 ">
    <div class="row">
      <div class="col">
      <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>', '</div>') ?>
      </div>
    </div>
    <div class="row">
      <div class="col">

<form action="<?php echo base_url('admin/siswa_edit'); ?>" method="post">
  <p class="font-weight-bold">Profil Siswa</p>
  <hr class="sidebar-divider"> 
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
  
    <div class="form-group form-control-sm row">
    <label for="nis" class="col-sm-2 col-form-label">NIS </label>
    <div class="col-sm-8">
      <input type="text" name="nis" class="form-control" readonly id="nis" value="<?= $user['nis']; ?>" >
    </div>
    </div>

    <div class="form-group form-control-sm row">
    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
    <div class="col-sm-8">
      <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?>" >
    </div>
    </div>
    
    <div class="form-group form-control-sm row">
    <label class="col-sm-2 col-form-label">Kelas </label>
    <div class="col-sm-8 mt-2">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="kelas" id="inlineRadio1" value="XIII-A" <?php if($user['kelas']=='XIII-A') echo 'checked'?> >
        <label class="form-check-label" for="inlineRadio1">XIII-A</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="kelas" id="inlineRadio2" value="XIII-B" <?php if($user['kelas']=='XIII-B') echo 'checked'?> >
        <label class="form-check-label" for="inlineRadio2">XIII-B</label>
      </div>
    </div>
    </div>

    <div class="form-group form-control-sm row">
    <label for="nama" class="col-sm-2 col-form-label">Pembimbing </label>
    <div class="col-sm-8">
      <select class="custom-select" name="pembimbing">
        <option value="" >-- Guru Pembimbing --</option>
        <option value="1" <?php if($user['id_pembimbing']== 1) echo 'selected = "selected"';?> >Trimans Yogiana, S.Pd</option>
        <option value="2" <?php if($user['id_pembimbing']== 2) echo 'selected = "selected"';?> >Rudi Haryadi, ST. M.Pd</option>
        <option value="3" <?php if($user['id_pembimbing']== 3) echo 'selected = "selected"';?> >Diky Ridwan, S.Kom</option>
        <option value="4" <?php if($user['id_pembimbing']== 4) echo 'selected = "selected"';?> >Dodi Permana Hidayat, S.Pd </option>
        <option value="5" <?php if($user['id_pembimbing']== 5) echo 'selected = "selected"';?> >Adi Setiadi, ST.</option>
        <option value="6" <?php if($user['id_pembimbing']== 6) echo 'selected = "selected"';?> >Antoni Budiman, S.Pd</option>
        <option value="7" <?php if($user['id_pembimbing']== 7) echo 'selected = "selected"';?> >DR. Hj. Sri Prihatiningsih, MT. </option>
        <option value="8" <?php if($user['id_pembimbing']== 8) echo 'selected = "selected"';?> >Netty Amaliyah, S.Pd</option>
      </select>
    </div>
    </div>

    <div class="form-group form-control-sm row">
    <label for="nama" class="col-sm-2 col-form-label">Status Laporan </label>
    <div class="custom-control custom-checkbox">
    <div class="col-sm-8 mt-2"> 
      <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" value="Terpenuhi" 
      <?php if($user['status']) echo 'checked = "checked"';?>>
      <label class="custom-control-label" for="customCheck1"> Disetujui</label>
    </div>
    </div>
    </div>
    <div class="form-group row pt-2">
      <div class="col-sm 2"></div>
      <div class="col-sm-10 ">
<button type="submit" class="btn btn-primary">Submit</button>
      </div>
       <div class="p small pt-3 pl-3">
         *Jika Terdapat kesalahan pada NIS siswa, hapus data ini!
       </div>
    </div>
</form> 

