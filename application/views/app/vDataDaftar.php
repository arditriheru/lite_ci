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

               <div class="alert  alert-success alert-dismissible fade show" role="alert">
                Selamat Datang <?php echo $this->session->userdata('nama'); ?>
                <a href="<?php echo base_url("app/dataDaftar/auth"); ?>" onclick="javascript: return confirm('Yakin logout?')">
                  <button type="button" class="close">
                   <i class="fa fa-sign-out" aria-hidden="true"></i>
                 </button>
               </a>
             </div>


             <div class="row">
              <!-- content -->
              <div class="col">
                <section class="card">
                  <a href="<?php echo base_url() ?>app/dataDaftar/form">
                    <div class="social-box color-1">
                      <i class="fa fa-user-plus"></i>
                      <ul>
                        <span>Daftar Poliklinik</span>
                      </ul>
                    </div>
                  </a>
                </section>
              </div>

              <!-- content -->
                  <!-- <div class="col">
                    <section class="card">
                      <a href="<?php echo base_url() ?>swab/dataSwab">
                        <div class="social-box color-2">
                          <i class="fa fa-calendar-check-o"></i>
                          <ul>
                            <span>Rencana Poli</span>
                          </ul>
                        </div>
                      </a>
                    </section>
                  </div> -->

                </div>

                <div class="row">

                  <!-- content -->
                  <div class="col">
                    <section class="card">
                      <a href="<?php echo base_url() ?>app/dataDaftar/dataRegistrasi">
                        <div class="social-box color-5">
                          <i class="fa fa-address-card-o"></i>
                          <ul>
                            <span>Detail Booking</span>
                          </ul>
                        </div>
                      </a>
                    </section>
                  </div>

                  <!-- content -->
                  <div class="col">
                    <section class="card">
                      <a href="<?php echo base_url() ?>app/dataTerdaftar">
                        <div class="social-box color-4">
                          <i class="fa fa-search"></i>
                          <ul>
                            <span>Jumlah Terdaftar</span>
                          </ul>
                        </div>
                      </a>
                    </section>
                  </div>

                </div>

              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
    </div><!-- .content -->