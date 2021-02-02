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
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div><hr>
              
              <form action="<?php echo base_url("swab/dataSwab/formIdentitasAksi") ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label mb-1">Nomor Identitas (KTP/KK)</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <input class="form-control" type="number" name="no_identitas" placeholder="Kartu Tanda Penduduk / Kartu Keluarga.." required="">
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Nama Lengkap</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda.." required="">
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Alamat Lengkap</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <textarea class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat Lengkap Anda.." required=""></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Tanggal Lahir</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <input class="form-control" type="date" name="tgl_lahir" placeholder="Masukkan.." required="">
                </div>
                <div class="form-group">
                  <label class=" form-control-label">Jenis Kelamin</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <select name="id_sex" class=" form-control" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($datasex as $d) : ?>
                      <option value="<?php echo $d->id_sex ?>"><?php echo $d->nama_sex ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class=" form-control-label">Jadwal Pelaksanaan</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <select name="id_jadwal_swab" class=" form-control" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($datajadwal as $d) : ?>
                      <option value="<?php echo $d->id_jadwal_swab ?>"><?php echo $d->pukul." hari ".$d->hari ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Nomor WhatsApp</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <input class="form-control" type="number" name="kontak" placeholder="Nomor WhatsApp yang dapat dihubungi.." required="">
                </div>
                <div class="form-group">
                  <label class="control-label mb-1">Email</label>
                  <small class="text-danger"> **Wajib diisi</small>
                  <input class="form-control" type="email" name="email" placeholder="Masukkan Email Anda.." required="">
                </div>
                <div id="pay-invoice">
                  <div class="card-body">
                    <div class="card-title">
                      <h4 class="text-center">Upload KTP/KK<small class="text-danger"> **Wajib diisi</small></h4>
                    </div>
                    <hr>
                    <div class="form-group">
                      <input type="file" name="file_identitas" class="form-control-file" required="">
                    </div>
                  </div>
                </div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" onclick="loading()">
                  <span>Lanjutkan</span>
                  <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
              </form>
              <b id="loading"></b>
            </div>
          </div>

        </div>
      </div>
      <br><br>
    </div><!-- .animated -->
  </div><!-- .content -->