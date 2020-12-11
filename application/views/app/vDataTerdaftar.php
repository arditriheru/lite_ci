    
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

                            <form action="<?php echo base_url() ?>app/dataTerdaftar/tampilData" method="post">
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <label for="cc-payment" class="control-label mb-1">Nama Dokter</label>
                                        <select name="id_dokter" id="id_dokter" class=" form-control" required="">
                                            <option value="">Pilih</option>
                                            <?php foreach ($datadokter as $d) : ?>
                                                <option value="<?php echo $d->id_dokter ?>"><?php echo $d->nama_dokter ?></option>
                                            <?php endforeach ?>
                                        </select>
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
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <label for="cc-payment" class="control-label mb-1">Jadwal</label>
                                        <input class="form-control" type="date" name="booking_tanggal" required="">
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

                            <div class="col-md-12">
                                <div align="center" class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Dokter <?php echo $d->nama_dokter ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Tanggal <?php echo dateIndo($d->booking_tanggal) ?></p>
                                        <b>Poliklinik <?php echo $d->nama_sesi?></b><br>
                                        <h1><?php echo $d->total ?> Pasien</h1><br>
                                        <p>**Jumlah pasien terdaftar bersifat sementara dapat berubah setiap saat kecuali telah memenuhi kuota masing-masing dokter, booking jadwal poli dapat Anda lakukan maksimal H-30</p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; } ?>

                    </div>
                </div> <!-- .card -->
            </div>
        </div>
        
    </div><!-- .animated -->
</div><!-- .content -->