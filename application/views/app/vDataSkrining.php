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
               <form method="post" action="<?php echo base_url() ?>app/dataDaftar/diagnosis" role="form">
                <p class="bluetext"><b>A. Gejala</b></p>
                <div class="form-group">
                  <label>1.</label> Apakah pasien (termasuk pendamping) merasa demam >38&deg;C / riwayat demam <14 hari?
                  <select class="form-control" type="text" name="a1" required="">
                    <option value="">Pilih</option>
                    <option value='1'>Ya</option>
                    <option value='0'>Tidak</option>"
                  </select>
                </div>
                <div class="form-group">
                  <label>2.</label> Apakah pasien (termasuk pendamping) merasa batuk / pilek / sakit tenggorokan / sesak nafas <14 hari?
                  <select class="form-control" type="text" name="a2" required="">
                    <option value="">Pilih</option>
                    <option value='1'>Ya</option>
                    <option value='0'>Tidak</option>"
                  </select>
                </div>
                <div class="form-group">
                  <label>3.</label> Apakah pasien (termasuk pendamping) merasakan nafas cepat / terasa berat <14 hari?<br>
                    <select class="form-control" type="text" name="a3" required="">
                      <option value="">Pilih</option>
                      <option value='1'>Ya</option>
                      <option value='0'>Tidak</option>"
                    </select>
                  </div><br>

                  <p class="bluetext"><b>B. Faktor Risiko</b></p>
                  <div class="form-group">
                    <label>1. </label> Apakah pasien (termasuk pendamping) memiliki riwayat perjalanan / tinggal di luar negeri dalam waktu 14 hari sebelum timbul gejala?
                    <select class="form-control" type="text" name="c1" required="">
                      <option value="">Pilih</option>
                      <option value='1'>Ya</option>
                      <option value='0'>Tidak</option>"
                    </select>
                  </div>
                  <div class="form-group">
                    <label>2. </label> Apakah pasien (termasuk pendamping) memiliki riwayat bepergian dari area transmisi lokal di Indonesia / dari luar kota Yogyakarta / Indogrosir Yogyakarta, dalam waktu 14 hari sebelum timbul gejala?
                    <select class="form-control" type="text" name="c2" required="">
                      <option value="">Pilih</option>
                      <option value='1'>Ya</option>
                      <option value='0'>Tidak</option>"
                    </select>
                  </div>
                  <div class="form-group">
                    <label>3. </label> Apakah pasien (termasuk pendamping) memiliki riwayat kontak erat dengan pasien yang diduga maupun yang positif COVID-19?<br>
                    <select class="form-control" type="text" name="c3" required="">
                      <option value="">Pilih</option>
                      <option value='1'>Ya</option>
                      <option value='0'>Tidak</option>"
                    </select>
                  </div><br>
                  <div>
                    <button id="diagnosa" name="diagnosa" type="submit" class="btn btn-lg btn-info btn-block">
                      <span id="search-schedule-amount">Diagnosis</span>
                      <span id="search-schedule-sending" style="display:none;">Sending…</span>
                    </button>
                  </div>
                </form><br>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
    </div><!-- .content -->