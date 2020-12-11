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
               <form action="<?php echo base_url() ?>app/dataDaftar/form2" method="post">
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
                <div class="row form-group">
                  <div class="col-12 col-md-12">
                    <label for="cc-payment" class="control-label mb-1">Nama Dokter</label>
                    <select name="id_dokter" id="id_dokter" class=" form-control" required="">
                      <option value="">Pilih</option>
                      <?php foreach ($datadokter as $d) : ?>
                        <option value="<?php echo $d->id_dokter ?>"><?php echo $d->nama_unit." - ".$d->nama_dokter ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                  <span id="payment-button-amount">Lanjutkan</span>
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