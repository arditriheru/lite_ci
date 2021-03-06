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
               <div class="progress mb-2">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Step 5</div>
              </div><hr>
              <form action="<?php echo base_url() ?>app/dataDaftar/formAksi" method="post">
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                  <input class="form-control" type="text" name="id_catatan_medik"
                  value="<?php echo $this->session->userdata('id_catatan_medik'); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Nama Pasien</label>
                  <input class="form-control" type="text" name="nama"
                  value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Alamat Lengkap</label>
                  <input class="form-control" type="text" name="alamat"
                  value="<?php echo $this->session->userdata('alamat'); ?>" required="">
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Nomor Kontak</label>
                  <input class="form-control" type="text" name="telp"
                  value="<?php echo $this->session->userdata('telp'); ?>" required="">
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Nama Dokter</label>
                  <input class="form-control" type="text" name="id_dokter"
                  value="<?php echo $this->session->userdata('nama_dokter'); ?>" readonly>
                </div>

                <?php if(isset($jenis_imunisasi)){ ?>

                 <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Jenis Imunisasi</label>
                  <input class="form-control" type="text" name="jenis_imunisasi"
                  value="<?php echo $jenis_imunisasi; ?>" readonly>
                </div>

              <?php } ?>

              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Jadwal Poliklinik</label>
                <input class="form-control" type="text" name="booking_tanggal"
                value="<?php echo formatDateIndo($this->session->userdata('booking_tanggal')); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Jam Sesi</label>
                <input class="form-control" type="text" name="id_sesi"
                value="<?php echo $this->session->userdata('jam'); ?>" readonly>
              </div><p class="text-primary">** Pastikan data sudah terisi dengan benar. Klik tombol "Daftar Sekarang" dibawah ini untuk mendaftar.</p>
              <button id="payment-button" type="<?php echo $btntype ?>" class="btn btn-lg <?php echo $btncolor ?> btn-block">
                <span id="payment-button-amount"><?php echo $btntext ?></span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
              </button>
            </form>

          </div>
        </div>
        
      </div>
    </div>
    <br><br>
  </div><!-- .animated -->
  </div><!-- .content -->