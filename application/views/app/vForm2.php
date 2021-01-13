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
               <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div><hr>
              <form action="<?php echo base_url() ?>app/dataDaftar/form3" method="post">
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

                <?php if($this->session->userdata('id_unit')==1){ ?>

                  <div class="form-group">
                    <label class="control-label mb-1">Jenis Pelayanan</label>
                    <select class="form-control" type="text" name="imunisasi" required="">
                      <option value="">Pilih</option>
                      <option value="0">Periksa</option>
                      <option value="1">Imunisasi</option>
                    </select>
                  </div>
                  
                <?php } ?>
                
                <div class="form-group">
                  <label class="control-label mb-1">Jadwal Tersedia</label><br>
                  <?php 
                  foreach ($datajadwal as $d){
                    $hari = $d->nama_hari;
                    $hari_jadwal = array($hari);
                    for($x=0;$x<count($hari_jadwal);$x++){
                     echo  "<span class='badge badge-success'>".$hari_jadwal[$x]." </span>  ";
                   }
                 }
                 ?>
               </div>
               <div class="form-group">
                <label class="control-label mb-1">Untuk Tanggal</label>
                <input class="form-control" type="date" name="booking_tanggal" required="">
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