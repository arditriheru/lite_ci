 <script src="<?php echo base_url('assets/js/file_upload.js'); ?>"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form-upload.css');?>">
 <script type="text/javascript">
  $(document).ready(function() { 
   $('#imageupload').submit(function(e) { 
    if($('#image_up_id').val()) {
      e.preventDefault();
      $("#progress-bar-status-show").width('0%');
      var file_details        =   document.getElementById("image_up_id").files[0];
      var extension           =   file_details['name'].split(".");
      var allowed_extension   =   ["png", "jpg", "jpeg"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);

      if(file_details['size'] > 2097152)
      {
        alert('Please upload a file less than 2 MB');
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        alert('Silahkan upload file JPEG, JPG atau PNG');
        return false;
      }
      else
      { 
        if(file_details['size'] < 2097152 && check_for_valid_ext != -1)
        {
          $('#loader').show();
          $(this).ajaxSubmit({ 
            target:   '#toshow', 
            beforeSubmit: function() {
              $("#progress-bar-status-show").width('0%');
            },

            uploadProgress: function (event, position, total, percentComplete){ 
              $("#progress-bar-status-show").width(percentComplete + '%');
              $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete +' %</div>');               
            },
            
            success:function (){
              $('#loader').hide();
              $('#imageDiv').show();
              var url = $('#toshow').text();
              var img = document.createElement("IMG");
              img.src = url;
              img.height = '100';
              img.width  = '150';
              document.getElementById('imageDiv').appendChild(img);             
            },
            resetForm: true 
          }); 
          return false;
        }   
      }    
    }
  });
 }); 
</script>

<div id="pay-invoice">
  <div class="card-body">
    <div class="card-title">
      <h4 class="text-center">Upload KTP/KK</h4>
    </div>
    <hr>
    <div class="form-group">
      <input type="file" name="file_identitas" id="image_up_id" class="form-control-file" required="">
    </div>
    <div class="form-group">
     <div id="progressbr-container">
      <div  id="progress-bar-status-show">  </div>        
    </div>
  </div>
</div>
</div>
<button  id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
  <span>Lanjutkan</span>
  <span id="payment-button-sending" style="display:none;">Sending…</span>
</button>
</form>
<center><div id="loading"></div></center><br>
<div id="result"></div>

<form id="imageupload" action="<?php echo base_url('swab/dataSwab/formIdentitasAksi');?>" method="post">
  <div class="row">
    <div class="col-sm-12">      
      <div class="form-group">
       <div id="progressbr-container">
        <div  id="progress-bar-status-show">  </div>        
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="form-group">
      <input type="file" name="image_up" id="image_up_id" class="form-control-file" required="">
    </div>
  </div>
</div>      
<div class="row">
 <div class="col-sm-9">
  <div class="form-group">
    <input type="submit"  value="Upload Image" class="btn btn-success" />
  </div>
</div>
</div>
</form>
<form action="<?php echo base_url("swab/dataSwab/formIdentitasAksi") ?>" id="imageupload" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label mb-1">Nomor Identitas (KTP/KK)</label>
    <input class="form-control" type="number" name="no_identitas" placeholder="Kartu Tanda Penduduk / Kartu Keluarga.." required="">
  </div>
  <div class="form-group">
    <label class="control-label mb-1">Nama Lengkap</label>
    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda.." required="">
  </div>
  <div class="form-group">
    <label class="control-label mb-1">Alamat Lengkap</label>
    <textarea class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat Lengkap Anda.." required=""></textarea>
  </div>
  <div class="form-group">
    <label class="control-label mb-1">Tanggal Lahir</label>
    <input class="form-control" type="date" name="tgl_lahir" placeholder="Masukkan.." required="">
  </div>
  <div class="form-group">
    <label class=" form-control-label">Jenis Kelamin</label>
    <select name="id_sex" class=" form-control" required="">
      <option value="">Pilih</option>
      <?php foreach ($datasex as $d) : ?>
        <option value="<?php echo $d->id_sex ?>"><?php echo $d->nama_sex ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label class=" form-control-label">Jadwal Pelaksanaan</label>
    <select name="id_jadwal_swab" class=" form-control" required="">
      <option value="">Pilih</option>
      <?php foreach ($datajadwal as $d) : ?>
        <option value="<?php echo $d->id_jadwal_swab ?>"><?php echo $d->pukul." hari ".$d->hari ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label class="control-label mb-1">Nomor WhatsApp</label>
    <input class="form-control" type="number" name="kontak" placeholder="Nomor WhatsApp yang dapat dihubungi.." required="">
  </div>
  <div class="form-group">
    <label class="control-label mb-1">Email</label>
    <input class="form-control" type="email" name="email" placeholder="Masukkan Email Anda.." required="">
  </div>
  <div id="pay-invoice">
    <div class="card-body">
      <div class="card-title">
        <h4 class="text-center">Upload KTP/KK</h4>
      </div>
      <hr>
      <div class="form-group">
        <input type="file" name="file_identitas" id="image_up_id" class="form-control-file" required="">
      </div>
      <div class="form-group">
       <div id="progressbr-container">
        <div  id="progress-bar-status-show">  </div>        
      </div>
    </div>
  </div>
</div>
<button  id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
  <span>Lanjutkan</span>
  <span id="payment-button-sending" style="display:none;">Sending…</span>
</button>
</form>