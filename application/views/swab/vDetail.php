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
               <p>** Mohon ditunggu beberapa saat akan kami hubungi melalui aplikasi whatsApp. Silahkan screenshot bukti reservasi ini dan tunjukkan ke petugas pada hari pelaksanaan.</p>
               <table class="table">

                <?php foreach ($data as $d) : ?>

                  <tbody>
                    <tr>
                      <td>No. Identitas</td>
                      <td>:</td>
                      <td><?php echo $d->no_identitas; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td>:</td>
                      <td><?php echo strtoupper($d->nama); ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?php echo strtoupper($d->alamat); ?></td>
                    </tr>
                    <tr>
                      <td>TTL</td>
                      <td>:</td>
                      <td><?php echo formatDateIndo($d->tgl_lahir); ?></td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td>:</td>
                      <td><?php echo $d->nama_sex; ?></td>
                    </tr>
                    <tr>
                      <td>Pelaksanaan</td>
                      <td>:</td>
                      <td><?php echo $d->hari.' ('.$d->pukul.')'; ?></td>
                    </tr>
                    <tr>
                      <td>WhatsApp</td>
                      <td>:</td>
                      <td><?php echo $d->kontak; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?php echo $d->email; ?></td>
                    </tr>
                    <tr>
                      <td>Upload KTP/KK</td>
                      <td>:</td>
                      <td>
                        <?php if(isset($d->file_identitas)){
                          echo "<i class='fa fa-check'></i>";
                        }else{
                          echo "<i class='fa fa-close'></i>";
                        } ?>

                      </td>
                    </tr>
                    <tr>
                      <td>Upload Pembayaran</td>
                      <td>:</td>
                      <td>
                        <?php if(isset($d->file_identitas)){
                          echo "<i class='fa fa-check'></i>";
                        }else{
                          echo "<i class='fa fa-close'></i>";
                        } ?>

                      </td>
                    </tr>
                    <tr>
                      <td>Reservasi</td>
                      <td>:</td>
                      <td><?php echo formatDateIndo($d->tanggal).' / '.$d->jam; ?></td>
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