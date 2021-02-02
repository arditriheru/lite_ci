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
                <div class="card-body card-block">
                  <div class="col-md-12">
                    <b class="bluetext">Alur Pendaftaran SWAB Antigen</b><br><br>
                    <ol>
                      <li>Mengisi form identitas pasien.</li>
                      <li>
                        Melakukan pelunasan pembayaran tiap pasien sebesar Rp.250.000 (Dua Ratus Lima Puluh Ribu) via transfer ke rekening RSKIA Rachmi :<br>
                        <strong>Bank Mandiri</strong><br>
                        No.Rek : 0000000000<br>
                        an RSKIA Rachmi<br><br>
                        **Bukti pembayaran transfer diunggah bersamaan dengan pengisian data.<br><br>
                        <strong>Mohon mengisi nama lengkap di bagian keterangan saat transfer.</strong><br>
                        Pasien terdaftar reservasi jika sudah melunasi pembayaran. Jika belum akan didahulukan pasien yang sudah melakukan pelunasan pembayaran terlebih dahulu.<br>
                        Setelah pengisian dan pelunasan akan kami cek terlebih dahulu dan diberikan invoice via WhatsApp.
                      </li>
                    </ol>
                    <hr>
                  </div>
                </div><br>
                <div class="card-body card-block">
                  <a href="<?php echo base_url("swab/dataSwab/formIdentitas") ?>">
                    <button name="ceklogin" type="button" class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-sign-in"></i>
                      <span>Form Identitas</span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
  </div><!-- .content -->
