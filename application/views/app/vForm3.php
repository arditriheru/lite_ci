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
                  <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Step 3</div>
              </div><hr>
              <form action="<?php echo base_url() ?>app/dataDaftar/form4" method="post">
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
                  <label for="cc-payment" class="control-label mb-1">Nama Dokter</label>
                  <input class="form-control" type="text" name="id_dokter"
                  value="<?php echo $this->session->userdata('nama_dokter'); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Untuk Tanggal</label>
                  <input class="form-control" type="text" name="booking_tanggal"
                  value="<?php echo $this->session->userdata('booking_tanggal'); ?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Jam Praktek</label>
                  <select class="form-control" type="text" name="id_sesi" required="">
                    <option value="">Pilih</option>
                    <?php
                    foreach ($datajam as $d) : ?>

                      <option value='<?php echo $d->id_sesi ?>'><?php echo $d->jam ?></option>

                    <?php endforeach ?>
                  </select>
                </div>

                <?php if($imunisasi==1){ ?>

                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Jenis Imunisasi</label>
                    <input class="form-control" type="text" name="jenis_imunisasi" placeholder="Contoh : Polio, BCG, Campak, DPT, HiB, Hepatitis B, dll" required="">
                  </div>

                <?php } ?>

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