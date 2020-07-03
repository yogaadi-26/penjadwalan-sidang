  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SMKN 1 Cimahi <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('page/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal-->
  <div class="modal fade" id="deleteModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <form action="<?= base_url('admin/hapus_siswa') ?>" method="post">
            <div class="modal-body" id="modal-body"> 
              <input type="hidden" name="id" id="hiddenid"> 
              <p id="pesan"></p>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger" type="submit"> Delete </button> 
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Confirm OK Modal -->
  <div class="modal fade" id="confirmOKModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Status Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span class="badge badge-success">Disetujui</span>  <p class="mt-2"> Persyaratan Terpenuhi ! Siswa dapat dijadwalkan untuk sidang. </span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Confirm Failed Modal -->
  <div class="modal fade" id="confirmKOModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Status Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span class="badge badge-danger">Belum Disetujui</span>  <p class="mt-2"> Persyaratan Gagal ! Siswa tidak dapat dijadwalkan untuk sidang. </span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>

  <!-- Script Delete Modal  -->
   <script>
    $(document).ready(function() {
      $(document).on('click','#delete',function() {
        var getId = $(this).attr("data-id");
        var nama = $(this).attr("data-name");
        $('#hiddenid').val(getId);
        $('#pesan').text('Ini akan menghapus akun dan data "' + nama + '" ?');
      });
     }); 
  </script>
  
  <!-- Script Autocomplete data -->
  <script type="text/javascript">
    $(document).ready(function(){
        $( "#namasiswa" ).autocomplete({
          source: "<?php echo site_url('admin/autocomplete/?');?>",

          select: function (event, ui) {
              $('[name="nama"]').val(ui.item.nama); 
              $('[name="nis"]').val(ui.item.nis); 
              $('[name="kelas"]').val(ui.item.kelas); 
              $('[name="status"]').val(ui.item.status); 
              $('[name="id"]').val(ui.item.id); 
              $('[name="pembimbing"]').val(ui.item.pembimbing);
          }
        });
    });
  </script> 

</body>

</html>