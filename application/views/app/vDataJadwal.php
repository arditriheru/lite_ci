    
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

                            <form action="<?php echo base_url() ?>app/dataJadwal/tampilData" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <div class="input-group">
                                         <select name="id_dokter" id="id_dokter" class=" form-control" required="">
                                            <option value="">Nama Dokter</option>
                                            <?php foreach ($datadokter as $d) : ?>
                                                <option value="<?php echo $d->id_dokter ?>"><?php echo $d->nama_unit.' - '.$d->nama_dokter ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="input-group-btn"><button class="btn btn-info"><i class="fa fa-search"></i> Tampilkan</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                                <th scope="col"><center>Hari</center></th>
                                <th scope="col"><center>Nama Dokter</center></th>
                                <th scope="col"><center>Pukul</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($datajadwal as $d) : ?>
                            <tr>
                                <td><center><?php echo $d->nama_hari; ?></center></td>
                                <td><left><?php echo $d->nama_unit.' - '.$d->nama_dokter; ?></left></td>
                                <td><center><?php echo $d->jam; ?></center></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

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
                                    <th scope="col"><center>Kuota</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datasenin as $d) : ?>
                                    <tr>
                                        <td><center>Senin</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($dataselasa as $d) : ?>
                                    <tr>
                                        <td><center>Selasa</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($datarabu as $d) : ?>
                                    <tr>
                                        <td><center>Rabu</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($datakamis as $d) : ?>
                                    <tr>
                                        <td><center>Kamis</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($datajumat as $d) : ?>
                                    <tr>
                                        <td><center>Jumat</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($datasabtu as $d) : ?>
                                    <tr>
                                        <td><center>Sabtu</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php foreach ($dataminggu as $d) : ?>
                                    <tr>
                                        <td><center>Minggu</center></td>
                                        <td><left><?php echo $d->jam.$d->ims ?></left></td>
                                        <td><center><?php echo $d->kuota.' Pasien'; ?></center></td>
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