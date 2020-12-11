    <div class="content mt-3">
      <div class="animated fadeIn">

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div align="center" class="card-header">
                <img src="<?php echo base_url() ?>assets/images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
              </div>
              <div class="card-body">
                 <?php echo $this->session->flashdata('alert') ?>
                <!-- content -->
                
              </div>
            </div>
            <div align="center">
              <p><?php echo getCopyright()." - ".getVersion() ?></p>
            </div>
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
    </div><!-- .content -->
    <nav class="nav-bottom">
      <a href="<?php echo base_url() ?>app/dataHelp" class="nav-bottom__link">
        <i class="fa fa-question-circle-o fa-2x"></i>
      </a>
      <a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
        <i class="fa fa-home fa-2x"></i>
      </a>
      <a href="javascript: history.back()" class="nav-bottom__link">
        <i class="fa fa-arrow-circle-o-left fa-2x"></i>
      </a>
    </nav>