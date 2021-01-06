    
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div align="center" class="card-header">
                        <img src="<?php echo base_url() ?>assets/images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
                    </div>
                    <div class="card-body">
                        <div align="center" class="card-title">
                            <strong class="text-center"><?php echo $subtitle ?></strong>
                        </div>
                        <hr>

                        <?php if(!isset($id_dokter)){ ?>

                            <form action="<?php echo base_url() ?>app/dataJadwal/tampilData" method="post">
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
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-search fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Tampilkan</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form><br>

                        <?php }else{ ?>

                            <div class="col-md-12">
                                <div align="center" class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Dokter <?php echo $nama_dokter ?></strong>
                                    </div>
                                    <div class="card-body">
                                     <table class="table table-striped">
                                      <thead>
                                        <tr>
                                            <th scope="col"><center>Hari</center></th>
                                            <th scope="col"><center>Pukul</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datasenin as $d) : ?>
                                            <tr>
                                                <td><center>Senin</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($dataselasa as $d) : ?>
                                            <tr>
                                                <td><center>Selasa</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($datarabu as $d) : ?>
                                            <tr>
                                                <td><center>Rabu</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($datakamis as $d) : ?>
                                            <tr>
                                                <td><center>Kamis</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($datajumat as $d) : ?>
                                            <tr>
                                                <td><center>Jumat</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($datasabtu as $d) : ?>
                                            <tr>
                                                <td><center>Sabtu</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($dataminggu as $d) : ?>
                                            <tr>
                                                <td><center>Minggu</center></td>
                                                <td><center><?php echo $d->jam.$d->ims ?></center></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div> <!-- .card -->
    </div>
</div>

</div><!-- .animated -->
</div><!-- .content -->