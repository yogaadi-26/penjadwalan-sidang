<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 my-4 text-gray-800">Data Jadwal Sidang</h1>
  <hr class="sidebar-divider">

  <!-- Profile -->
  <div class="col-lg-12">
    <div class="row mb-3">
      <div class="col">
        <?php echo $this->session->flashdata('msg'); ?>
        <a href="<?php echo base_url('admin/sidang'); ?>" class="btn btn-primary">Tambah Jadwal</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-striped">
          <thead>
            <tr class="">
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Penguji 1</th>
              <th scope="col">Penguji 2</th>
              <th scope="col">More</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sidang as $row ): ?>
            <tr>
              <td><?= ++$page ?> </td>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['penguji1']; ?></td>
              <td><?= $row['penguji2']; ?></td>
              <td class="px-1"> <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/detail_sidang/') . $row['id']; ?>"> Detail </a> </td> 
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
            <div class="col">
                <?php echo $pagination; ?>
            </div>
        </div>
  </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
