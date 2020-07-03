  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image:url( <?= base_url(); ?>assets/img/image.jpg);"></div>
              <div class="col-lg-6 my-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                  </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                  <form class="user" method="post" action="<?= base_url('page/login') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nis" name="nis" value="<?php echo set_value('nis'); ?>" aria-describedby="emailHelp" placeholder="Enter your NIS" autocomplete="off">
                      <?php echo form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('page/admin') ?>">Login as Administrator?</a>
                  </div>
                </div>
              </div>
                  <p class="small mx-auto">Copyright &copy; SMKN 1 Cimahi <?= date('Y'); ?></p>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>