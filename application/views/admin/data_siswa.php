  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-4 text-gray-800">Data Siswa</h1>
    <hr class="sidebar-divider">

    <!-- Profile -->
    <div class="col-lg-10 ">
      <div class="row mb-3">
        <div class="col">
          <?php echo $this->session->flashdata('msg'); ?>
          <a href="<?php echo base_url('admin/tambah'); ?>" class="btn btn-primary">Tambah Data Siswa</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
                <th scope="col">More</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($siswa as $row ): ?>
              <tr>
                <td><?= ++$page; ?> </td>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td class="px-1"><a href="<?= base_url('admin/edit/') . $row['id']; ?>">Edit</a>
                    <a href="#" id="delete" data-toggle="modal" data-target="#deleteModal" data-name="<?= $row['nama'];  ?>" data-id="<?= $row['id_account'];  ?>">Hapus </a>   
                </td>
                <td class="px-1"> <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/detail_siswa/') . $row['id']; ?>"> Detail </a> </td> 
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
