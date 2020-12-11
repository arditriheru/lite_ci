    <div class="content mt-3">
      <div class="animated fadeIn">

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div align="center" class="card-header">
                <img src="<?php echo base_url() ?>assets/images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
              </div>
              <div class="card-body">
                <div class="col-lg-6">
                  <div style="background-color: #ffffff; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                  Kosong</div>
                </div>
                <div class="col-lg-6">
                  <div style="background-color: #fa7f72; height: auto; margin: 10px 0px; padding: 5px; text-align: center; width: auto;">
                  Terpakai</div>
                </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col"><center>Kelas</center></th>
                      <th scope="col"><center>Kamar</center></th>
                      <th scope="col"><center>Bed</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($datakamar as $d) : ?>
                     <?php
                     if($d->ket_antri=='3'){ ?>
                      <tr>
                      <?php }else{ ?>
                        <tr style="background-color: #fa7f72;">
                        <?php } ?>
                        <td><center><?php echo $d->kelas ?></center></td>
                        <td><center><?php echo $d->nama_unit ?></center></td>
                        <td><center><?php echo $d->bed ?></center></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
      </div><!-- .animated -->
    </div><!-- .content -->