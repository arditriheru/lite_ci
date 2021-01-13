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
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div><hr>
              <p>** Silahkan screenshot bukti reservasi ini dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
              <table class="table">

                <?php foreach ($datadaftar as $d) : ?>

                  <tbody>
                    <tr>
                      <td>Nomor RM</td>
                      <td>:</td>
                      <td><?php echo $d->id_catatan_medik; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien</td>
                      <td>:</td>
                      <td><?php echo $d->nama; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Dokter</td>
                      <td>:</td>
                      <td><?php echo "dr. ".$d->nama_dokter; ?></td>
                    </tr>
                    <tr>
                      <td>Jadwal Poliklinik</td>
                      <td>:</td>
                      <td><?php echo formatDateIndo($d->booking_tanggal); ?></td>
                    </tr>
                    <tr>
                      <td>Jam Sesi</td>
                      <td>:</td>
                      <td><?php echo $jadwal_jam." WIB"." (".$d->nama_sesi.")"; ?></td>
                    </tr>
                    <tr>
                      <td>Reservasi</td>
                      <td>:</td>
                      <td><?php echo formatDateIndo($d->tanggal)." / ".$d->jam; ?></td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td><?php echo $d->keterangan; ?></td>
                    </tr>
                  </tbody>

                <?php endforeach ?>

              </table>
              <a href="<?php echo base_url() ?>"
                <button id="payment-button" type="button"class="btn btn-lg btn-info btn-block">
                  <i class="fa fa-home fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Menu Utama</span>
                </button>
              </a>
            </div>
          </div>
          
        </div>
      </div>
      <br><br>
    </div><!-- .animated -->
</div><!-- .content -->