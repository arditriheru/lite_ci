    <div class="content mt-3">
      <div class="animated fadeIn">

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div align="center" class="card-header">
                <img src="<?php echo base_url() ?>assets/images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
              </div>
              <div class="card-body">
                <button id="payment-button" type="button" onClick="window.location.reload()" class="btn btn-lg btn-info btn-block">
                  <i class="fa fa-refresh fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Refresh</span>
                </button>
                <p>**Silahkan tekan refresh setiap beberapa saat untuk mengupdate panggilan nomor antrian</p>
                <div class="col-md-12">
                  <div align="center" class="card">
                    <div class="card-header">
                      <strong class="card-title"><?php echo $a_nama_dokter ?></strong>
                    </div>
                    <div class="card-body">
                      <p class="card-text"><?php echo $a_tanggal." / ".$a_jam ?></p>
                      <b>Dipanggil </b>
                      <h1>A<?php echo $a_tcounter ?></h1>
                      <b>Total <?php echo $a_total ?> Pasien</b>
                    </div>
                  </div>
                  <div align="center" class="card">
                    <div class="card-header">
                      <strong class="card-title"><?php echo $b_nama_dokter ?></strong>
                    </div>
                    <div class="card-body">
                      <p class="card-text"><?php echo $b_tanggal." / ".$b_jam ?></p>
                      <b>Dipanggil </b>
                      <h1>B<?php echo $b_tcounter ?></h1>
                      <b>Total <?php echo $b_total ?> Pasien</b>
                    </div>
                  </div>
                  <div align="center" class="card">
                    <div class="card-header">
                      <strong class="card-title"><?php echo $c_nama_dokter ?></strong>
                    </div>
                    <div class="card-body">
                      <p class="card-text"><?php echo $c_tanggal." / ".$c_jam ?></p>
                      <b>Dipanggil </b>
                      <h1>C<?php echo $c_tcounter ?></h1>
                      <b>Total <?php echo $c_total ?> Pasien</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
    </div><!-- .content -->