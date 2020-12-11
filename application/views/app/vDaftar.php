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
                      <li>Pendaftaran Online sementara ini hanya berlaku bagi Pasien yang telah memiliki Nomor Rekam Medis RSKIA Rachmi yang akan berobat Rawat Jalan.</li>
                      <li>Bagi pasien baru yang belum pernah mendaftar di RSKIA Rachmi harap datang langsung ke bagian pendaftaran dengan membawa 1 lembar FC KTP.</li>
                      <li>Pendaftaran Online dapat dilakukan untuk kontrol Poli dengan Jadwal H-30 s.d hari H saat jadwal kontrol dilakukan dengan memasukkan : Nomor RM , Tanggal Lahir, Pilihan Hari Kontrol dan Dokter untuk poli reguler. Dokter yang ditunjuk adalah dokter DPJP (Dokter Penanggung Jawab Pelayanan).</li>
                      <li>Pasien hanya dapat mendaftar sekali pada Dokter, Jadwal dan Sesi yang sama.</li>
                      <li>Jadwal Dokter dapat berubah sewaktu waktu.</li>
                      <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat di (screenshot) dan ditunjukkan pada saat Jadwal Kontrol.</li>
                      <li>Apabila Anda ingin melihat detail Pendaftaran Online pada sub-menu Cetak Ulang di halaman ini.</li>
                      <li>Nomor Antrian Periksa dokter adalah sesuai dengan urutan ketika melakukan registrasi ulang.</li>
                      <li>Untuk kasus Gawat Darurat silakan datang ke UGD RSKIA Rachmi.</li>
                      <li>Bukti Pendaftaran Online dibawa di loket Pendaftaran RSKIA Rachmi.</li>
                      <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu.</li>
                    </ol>
                    <b class="bluetext">Ketentuan Khusus</b><br><br>
                    <ol>
                      <li>Pasien dari luar kota wajib membawa hasil Non-Reaktif Rapid Test.</li>
                      <li>Periksa Poli Anak pendamping 1 orang.</li>
                      <li>Periksa Poli Kandungan pendamping menunggu diluar.</li>
                      <li>Selama pandemi tidak melayani USG 4D sampai batas waktu yang belum ditentukan.</li>
                    </ol><hr>
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