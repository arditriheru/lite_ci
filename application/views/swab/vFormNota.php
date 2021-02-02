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
              <form action="<?php echo base_url("swab/dataSwab/formNotaAksi") ?>" method="post" enctype="multipart/form-data">
                <!-- Credit Card -->
                <div id="pay-invoice">
                  <div class="card-body">
                    <div class="card-title">
                      <h4 class="text-center">Upload Bukti Pembayaran<small class="text-danger"> **Wajib diisi</small></h4>
                    </div>
                    <hr>
                    <div class="form-group">
                      <input type="file" name="file_pembayaran" class="form-control-file" required="">
                    </div>
                  </div>
                </div> <!-- .card -->
                <button  id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" onclick="loading()">
                  <span>Upload</span>
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