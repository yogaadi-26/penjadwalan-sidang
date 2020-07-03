  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Administrator</h1>
                  </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                  <form class="user" method="post" action="<?= base_url('page/login_admin') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo set_value('username'); ?>" aria-describedby="emailHelp" placeholder="Enter username" autocomplete="off">
                      <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
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
                </div>
              </div>
            </div>
          </div>
            <div class="text-center">
              <p class="small mx-auto mt-auto">Copyright &copy; SMKN 1 Cimahi <?= date('Y'); ?></p>
            </div>
        </div>
      </div>

    </div>

  </div>