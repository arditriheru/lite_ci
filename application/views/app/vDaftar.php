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
                    <b class="bluetext">Ketentuan Umum Pendaftaran Online</b><br><br>
                    <ol>
                      <li>Pendaftaran online sementara ini hanya berlaku bagi pasien yang telah memiliki Nomor Rekam Medis RSKIA Rachmi yang akan berobat rawat jalan.</li>
                      <li>Bagi pasien baru yang belum pernah mendaftar di RSKIA Rachmi harap datang langsung ke bagian pendaftaran dengan membawa 1 lembar FC KTP.</li>
                      <li>Pendaftaran online dapat dilakukan untuk kontrol poliklinik dengan jadwal H-30 s.d hari H jika kuota masih tersedia saat jadwal kontrol dilakukan dengan memasukkan : Nomor Rekam Medik , Tanggal Lahir, Jadwal Kontrol dan Dokter untuk poli reguler. Dokter yang ditunjuk adalah dokter DPJP (Dokter Penanggung Jawab Pelayanan).</li>
                      <li>Pasien hanya dapat mendaftar sekali pada dokter, jadwal yang sama.</li>
                      <li>Jadwal dokter dapat berubah sewaktu waktu.</li>
                      <li>Apabila Anda telah melakukan daftar online, Anda akan mendapatkan bukti pendaftaran yang dapat di (screenshot) dan ditunjukkan pada ke petugas pendaftaran pada saat daftar ulang.</li>
                      <li>Apabila Anda ingin melihat kembali detail daftar online pada sub-menu Cetak Ulang di halaman sebelumnya.</li>
                      <li>Nomor antrian periksa dokter adalah sesuai dengan urutan ketika melakukan daftar ulang.</li>
                      <li>Untuk kasus Gawat Darurat silahkan datang langsung ke UGD RSKIA Rachmi.</li>
                      <li>Bukti daftar online dibawa di bagian pendaftaran RSKIA Rachmi.</li>
                      <li>Pasien yang telah melakukan daftar online diharapkan datang tepat waktu.</li>
                    </ol>
                    <!-- <b class="bluetext">Ketentuan Khusus</b><br><br>
                    <ol>
                      <li>Pasien dari luar kota wajib membawa hasil Non-Reaktif Rapid Test.</li>
                      <li>Periksa poli anak pendamping 1 orang.</li>
                      <li>Periksa poli kandungan pendamping menunggu diluar.</li>
                      <li>Selama pandemi tidak melayani USG 4D sampai batas waktu yang belum ditentukan.</li>
                    </ol> --><hr>
                  </div>
                </div><br>
                <div class="card-body card-block">
                  <form action="<?php echo base_url() ?>app/dataDaftar/login" method="post" role="form">
                    <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Nomor Rekam Medik</label>
                      <input name="id_catatan_medik" type="text" class="form-control" required="" placeholder="Masukkan Nomor RM Anda">
                    </div>
                    <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Tanggal Lahir</label>
                      <input name="tgl_lahir" type="date" class="form-control" required="" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div>
                      <button id="registration" name="ceklogin" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-sign-in"></i>
                        <span id="search-schedule-amount">Login</span>
                        <span id="search-schedule-sending" style="display:none;">Sending…</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
  </div><!-- .content -->