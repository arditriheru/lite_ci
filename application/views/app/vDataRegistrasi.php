    
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
            <div align="center" class="card-title">
              <strong class="text-center"><?php echo $subtitle ?></strong>
            </div>
            <hr>

            <?php if(!isset($id_dokter)){ ?>

              <form action="<?php echo base_url() ?>app/dataDaftar/tampilDataRegistrasi" method="post">
               <div class="row form-group">
                <div class="col-12 col-md-12">
                  <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                  <input name="id_catatan_medik" type="text" class="form-control" required="" placeholder="Masukkan Nomor RM Anda">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-12">
                  <label for="cc-payment" class="control-label mb-1">Nama Dokter</label>
                  <select name="id_dokter" id="id_dokter" class=" form-control" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($datadokter as $d) : ?>
                      <option value="<?php echo $d->id_dokter ?>"><?php echo $d->nama_unit.' - '.$d->nama_dokter ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-12">
                  <label for="cc-payment" class="control-label mb-1">Jadwal Poli</label>
                  <input class="form-control" type="date" name="booking_tanggal" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-12">
                  <label for="cc-payment" class="control-label mb-1">Sesi Poli</label>
                  <select name="id_sesi" id="id_sesi" class=" form-control" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($datasesi as $d) : ?>
                      <option value="<?php echo $d->id_sesi ?>"><?php echo $d->nama_sesi ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                  <i class="fa fa-search fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Tampilkan</span>
                  <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
              </div>
            </form><br>

          <?php }else{ foreach ($datadaftar as $d) : ?>

           <div class="card-body">
             <?php echo $this->session->flashdata('alert') ?>
             <!-- content -->
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

        <?php endforeach; } ?>

      </div>
    </div> <!-- .card -->
  </div>
</div>

</div><!-- .animated -->
</div><!-- .content -->