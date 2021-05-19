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
                <p>** Silahkan screenshot bukti pendaftaran online ini dan tunjukkan ke petugas pendaftaran saat melakukan registrasi ulang.</p>
                <table class="table">

                  <?php foreach ($datadaftar as $d) : ?>

                    <tbody>
                      <tr>
                        <td><b>Nomor RM</b></td>
                        <td><?php echo $d->id_catatan_medik; ?></td>
                      </tr>
                      <tr>
                        <td><b>Nama Pasien</b></td>
                        <td><?php echo $d->nama; ?></td>
                      </tr>
                      <tr>
                        <td><b>Nama Dokter</b></td>
                        <td><?php echo $d->nama_dokter; ?></td>
                      </tr>
                      <tr>
                        <td><b>Jadwal Poliklinik</b></td>
                        <td><?php echo formatDateIndo($d->booking_tanggal); ?></td>
                      </tr>
                      <tr>
                        <td><b>Jam Sesi</b></td>
                        <td><?php echo $jadwal_jam." WIB"." (".$d->nama_sesi.")"; ?></td>
                      </tr>
                      <tr>
                        <td><b>Reservasi</b></td>
                        <td><?php echo formatDateIndo($d->tanggal)." / ".$d->jam; ?></td>
                      </tr>
                      <tr>
                        <td><b>Keterangan</b></td>
                        <td><?php echo $d->keterangan; ?></td>
                      </tr>
                    </tbody>

                  <?php endforeach ?>

                </table>

                <div class="col-6 col-md-6">
                  <a href="<?php echo base_url("app/dataDaftar") ?>"
                    <button id="payment-button" type="button"class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-home fa-lg"></i>&nbsp;
                      <span id="payment-button-amount">Home</span>
                    </button>
                  </a>
                </div>
                <div class="col-6 col-md-6">
                  <a href="<?php echo base_url('app/dataDaftar/deleteDataRegistrasi/'.$d->id_booking) ?>" onclick="javascript: return confirm('Anda yakin batalkan jadwal poli?')">
                    <button id="payment-button" type="button" class="btn btn-lg btn-danger btn-block">
                      <i class="fa fa-trash fa-lg"></i>&nbsp;
                      <span id="payment-button-amount">Batalkan</span>
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