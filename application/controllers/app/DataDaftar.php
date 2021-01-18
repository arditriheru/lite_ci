<?php 

class dataDaftar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// if($this->session->userdata('login') !='1')
		// {
		// 	$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
		// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		// 		<font size="4"><b>Anda belum login!</b></font>
		// 		</div>');
		// 	redirect('app/login');
		// }

		$this->load->model("mSimetris");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";
		
		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$data['datakamar'] 	= $this->db->query("
			SELECT mr_tt.kelas, mr_unit.nama_unit, mr_tt.no_bed, mr_tt.ket_antri,
			IF(mr_tt.no_bed='1', 'A', 'B') AS bed
			FROM mr_tt, mr_unit
			WHERE mr_tt.id_unit = mr_unit.id_unit
			AND mr_tt.id_unit IN(6,29,24,26,7,28,27,31,30,25)
			ORDER BY mr_unit.nama_unit ASC")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataDaftar',$data);
		$this->load->view('templates/footer',$data);
	}

	public function dataSkrining()
	{
		$data['title'] 		= "Skrinig Covid-19";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataSkrining',$data);
		$this->load->view('templates/footer',$data);
	}

	public function diagnosis()
	{

		$A1 = $this->input->post('a1');
		$A2 = $this->input->post('a2');
		$A3 = $this->input->post('a3');
		$B1 = 1;
		$C1 = $this->input->post('c1');
		$C2 = $this->input->post('c2');
		$C3 = $this->input->post('c3');

		if($A1==1 && $A2==1 && $A3==1 && $B1==1 && $C1==1 ||
			$A1==1 && $A2==1 && $A3==1 && $B1==1 && $C2==1 ||
			$A1==1 && $A2==1 && $B1==1 && $C1==1 ||
			$A1==1 && $A2==1 && $B1==1 && $C2==1 ||
			$A1==1 && $A2==1 && $A3==1 && $C3==1 ||
			$A1==1 && $A2==1 && $A3==1 && $B1==1 ||
			$A1==1 && $A2==1 && $C3==1 ||
			$A1==1 && $C3==1 ||
			$A2==1 && $C3==1){

			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<font size="4"><b>P.D.P</b> Curiga Pasien Dalam Pengawasan!</font></div>');
			redirect('app/dataDaftar/dataSkrining');

		}elseif($A1==1 && $B1==1 && $C1==1 ||
			$A2==1 && $B1==1 && $C1==1 ||
			$A1==1 && $B1==1 && $C2==1 ||
			$A2==1 && $B1==1 && $C2==1){

			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<font size="4"><b>O.D.P</b> Curiga Orang Dalam Pengawasan!</font></div>');
			redirect('app/dataDaftar/dataSkrining');

		}elseif($C1==1 && $C2==1 && $C3==1){

			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<font size="4"><b>O.T.G</b> Curiga Orang Tanpa Gejala!</font></div>');
			redirect('app/dataDaftar/dataSkrining');

		}elseif($C1==1 && $C2==1){

			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<font size="4"><b>Aman</b> Wajib Skrining Lanjutan di UGD!</font></div>');
			redirect('app/dataDaftar/formTambahData');

		}else{

			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<font size="4"><b>Aman</b> Pasien Aman!</font></div>');
			redirect('app/dataDaftar/daftar');

		}
	}

	public function auth()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$this->session->sess_destroy();
		
		$this->load->view('templates/header',$data);
		$this->load->view('app/vDaftar',$data);
		$this->load->view('templates/footer',$data);
	}

	public function login()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$id_catatan_medik 	= $this->input->post('id_catatan_medik');
		$tgl_lahir 			= $this->input->post('tgl_lahir');

		$cek = $this->mSimetris->cekLogin($id_catatan_medik,$tgl_lahir);

		if($cek == FALSE)
		{
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Username atau password salah!
				</div>');
		}else{

			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Selamat Datang '.$cek->nama.'..
				</div>');

			$userdata = array(
				'id_catatan_medik'  => $cek->id_catatan_medik,
				'nama'     			=> $cek->nama,
				'telp'     			=> $cek->telp,
				'alamat'     		=> $cek->alamat,
				'login'  			=> '1',
			);

			$this->session->set_userdata($userdata);
			redirect('app/dataDaftar/form');
		}

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDaftar',$data);
		$this->load->view('templates/footer',$data);
	}

	public function form()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$data['datadokter'] = $this->db->query("SELECT dokter.id_dokter, dokter.nama_dokter, mr_unit.nama_unit FROM dokter JOIN mr_unit ON dokter.id_unit = mr_unit.id_unit WHERE dokter.status='1' ORDER BY dokter.id_unit, dokter.nama_dokter ASC")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vForm',$data);
		$this->load->view('templates/footer',$data);
	}

	public function form2()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$id = $this->input->post('id_dokter');

		$data['datajadwal'] = $this->db->query("
			SELECT hari,
			CASE
			WHEN dokter_jadwal.hari='1' THEN 'Senin'
			WHEN dokter_jadwal.hari='2' THEN 'Selasa'
			WHEN dokter_jadwal.hari='3' THEN 'Rabu'
			WHEN dokter_jadwal.hari='4' THEN 'Kamis'
			WHEN dokter_jadwal.hari='5' THEN 'Jumat'
			WHEN dokter_jadwal.hari='6' THEN 'Sabtu'
			WHEN dokter_jadwal.hari='0' THEN 'Minggu'
			END AS nama_hari
			FROM dokter_jadwal WHERE id_dokter='$id'
			GROUP BY hari")->result();

		$where = array('id_dokter' => $id);

		$result = $this->mSimetris->selectData('dokter','id_unit,nama_dokter',$where)->result();

		foreach ($result as $d) {
			$id_unit 		= $d->id_unit;
			$nama_dokter 	= $d->nama_dokter;
		}

		$userdata = array(
			'id_dokter'  	=> $id,
			'id_unit'		=> $id_unit,
			'nama_dokter'  	=> $nama_dokter,
		);

		$this->session->set_userdata($userdata);

		$this->load->view('templates/header',$data);
		$this->load->view('app/vForm2',$data);
		$this->load->view('templates/footer',$data);
	}

	public function form3()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$id_dokter		 	= $this->session->userdata('id_dokter');
		$booking_tanggal 	= $this->input->post('booking_tanggal');
		$data['imunisasi']	= $this->input->post('imunisasi');
		$tgl1      		  	= new DateTime();
		$tgl2             	= new DateTime("$booking_tanggal");
		$selisih          	= $tgl1->diff($tgl2)->format("%a");

		$hari = date('w', strtotime($booking_tanggal));

		$where = array(
			'id_dokter' => $id_dokter,
			'hari' 		=> $hari,
		);

		$cekjadwal = $this->mSimetris->countData('dokter_jadwal',$where);


		if($cekjadwal<=0)
		{

			$data['btncolor'] 		= "btn-danger";
			$data['btntype'] 		= "button";
			$data['btntext'] 		= "Jadwal Kosong";

		}else{

			if($selisih>30)
			{

				$data['btncolor'] 		= "btn-danger";
				$data['btntype'] 		= "button";
				$data['btntext'] 		= "Lebih dari 30 hari";

			}else{

				$data['btncolor'] 		= "btn-info";
				$data['btntype'] 		= "submit";
				$data['btntext'] 		= "Lanjutkan";

				$namahari = date('l', strtotime($booking_tanggal));

				$daftar_hari = array(
					'Sunday'    => '0',
					'Monday'    => '1',
					'Tuesday'   => '2',
					'Wednesday' => '3',
					'Thursday'  => '4',
					'Friday'    => '5',
					'Saturday'  => '6'
				);

				$hari = $daftar_hari[$namahari];

				$data['datajam'] = $this->db->query("
					SELECT id_sesi, jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hari'")->result();

				$result = $this->db->query("
					SELECT id_sesi, jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hari'")->result();

				foreach ($result as $d) {
					$jam = $d->jam;
				}

				$userdata = array(
					'booking_tanggal'  	=> $booking_tanggal,
					'jam'  				=> $jam,
				);

				$this->session->set_userdata($userdata);

			}
		}

		$this->load->view('templates/header',$data);
		$this->load->view('app/vForm3',$data);
		$this->load->view('templates/footer',$data);
	}

	public function form4()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar/form');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$id_catatan_medik 			= $this->session->userdata('id_catatan_medik');
		$booking_tanggal  			= $this->session->userdata('booking_tanggal');
		$id_dokter        			= $this->session->userdata('id_dokter');
		$data['jenis_imunisasi']	= $this->input->post('jenis_imunisasi');
		$id_sesi          			= $this->input->post('id_sesi');

		$where1 = array(
			'id_catatan_medik' 	=> $id_catatan_medik,
			'booking_tanggal' 	=> $booking_tanggal,
		);

		$cekdaftar = $this->mSimetris->countData('booking',$where1);

		if($cekdaftar>0)
		{

			$data['btncolor'] 		= "btn-danger";
			$data['btntype'] 		= "button";
			$data['btntext'] 		= "Sudah Mendaftar Sebelumnya";

		}else{

			$where2 = array(
				'id_dokter' => $id_dokter,
				'id_sesi' 	=> $id_sesi,
				'tanggal' 	=> $booking_tanggal,
			);

			$ceklibur = $this->mSimetris->countData('dokter_jadwal_libur',$where2);

			if($ceklibur>0)
			{

				$data['btncolor'] 		= "btn-danger";
				$data['btntype'] 		= "button";
				$data['btntext'] 		= "Dokter Cuti";

			}else{

				$hari = date('w', strtotime($booking_tanggal));

				$where3 = array(
					'booking_tanggal' 	=> $booking_tanggal,
					'id_dokter' 		=> $id_dokter,
					'id_sesi' 			=> $id_sesi,
				);

				$count = $this->mSimetris->countData('booking',$where3);
				$noant = $count+1;

				$where4 = array(
					'id_dokter' => $id_dokter,
					'id_sesi' 	=> $id_sesi,
					'hari' 		=> $hari,
				);

				$kuota = $this->mSimetris->selectData('dokter_jadwal','kuota',$where4);
				foreach($kuota->result() as $d)
				{
					$cekkuota = $d->kuota;
				}

				if($noant>$cekkuota)
				{

					$data['btncolor'] 		= "btn-danger";
					$data['btntype'] 		= "button";
					$data['btntext'] 		= "Kuota Penuh";

				}else{

					$data['btncolor'] 		= "btn-info";
					$data['btntype'] 		= "submit";
					$data['btntext'] 		= "Daftar Sekarang";

					$userdata = array(
						'id_sesi'  	=> $id_sesi,
						'submit'  	=> TRUE,
					);

					$this->session->set_userdata($userdata);

				}
			}
		}

		$this->load->view('templates/header',$data);
		$this->load->view('app/vForm4',$data);
		$this->load->view('templates/footer',$data);
	}

	public function formAksi()
	{
		
		$nama             = $this->session->userdata('nama');
		$alamat           = $this->session->userdata('alamat');
		$kontak           = $this->session->userdata('telp');
		$id_catatan_medik = $this->session->userdata('id_catatan_medik');
		$booking_tanggal  = $this->session->userdata('booking_tanggal');
		$jenis_imunisasi  = $this->input->post('jenis_imunisasi');
		$tanggal          = getDatenow();
		$jam              = getTimenow();
		$status           = '2';
		$keterangan       = 'DAFTAR MANDIRI, AMAN, '.$jenis_imunisasi;
		$id_dokter        = $this->session->userdata('id_dokter');
		$id_sesi          = $this->session->userdata('id_sesi');
		$mandiri          = '1';
		$antrian          = '0';
		$aktif 			  = '0';

		$data = array(

			'nama' 				=> $nama,
			'alamat' 			=> $alamat,
			'kontak' 			=> $kontak,
			'id_catatan_medik' 	=> $id_catatan_medik,
			'booking_tanggal' 	=> $booking_tanggal,
			'tanggal' 			=> $tanggal,
			'jam' 				=> $jam,
			'status' 			=> $status,
			'keterangan' 		=> $keterangan,
			'id_dokter' 		=> $id_dokter,
			'id_sesi' 			=> $id_sesi,
			'mandiri' 			=> $mandiri,
			'antrian' 			=> $antrian,
			'aktif' 			=> $aktif,
		);

		if(!$this->session->userdata('submit'))
		{

			// validasi mencegah double submit

			$where = array(
				'id_catatan_medik' 	=> $id_catatan_medik,
				'booking_tanggal' 	=> $booking_tanggal,
				'id_dokter' 		=> $id_dokter,
				'id_sesi' 			=> $id_sesi,
			);

			$idbooking = $this->mSimetris->selectData('booking','id_booking',$where);

			foreach($idbooking->result() as $d)
			{
				$id_booking = $d->id_booking;
			}

			$result = $this->db->query("
				SELECT id_booking, FIND_IN_SET( id_booking, (    
				SELECT GROUP_CONCAT(id_booking) 
				FROM booking 
				WHERE booking_tanggal = '$booking_tanggal'
				AND id_dokter = '$id_dokter'
				AND id_sesi = '$id_sesi')
				) AS noant
				FROM booking
				WHERE id_booking = '$id_booking'
				")->result();

			foreach ($result as $d) {
				$id_booking = $d->id_booking;
				$noant 		= $d->noant;

				$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Berhasil mendaftar,<br><font size="4"><b>Nomor Antrian : 
					'.$noant.'</b></font></div>');
				redirect('app/dataDaftar/dataDetail/'.$id_booking);

			}

		}else{

			$userdata = array(
				'submit'  	=> FALSE,
			);

			$this->session->set_userdata($userdata);

			$insert = $this->mSimetris->insertData('booking',$data);

			$where = array(
				'id_catatan_medik' 	=> $id_catatan_medik,
				'booking_tanggal' 	=> $booking_tanggal,
				'id_dokter' 		=> $id_dokter,
				'id_sesi' 			=> $id_sesi,
			);

			$idbooking = $this->mSimetris->selectData('booking','id_booking',$where);

			foreach($idbooking->result() as $d)
			{
				$id_booking = $d->id_booking;
			}

			$result = $this->db->query("
				SELECT id_booking, FIND_IN_SET( id_booking, (    
				SELECT GROUP_CONCAT(id_booking) 
				FROM booking 
				WHERE booking_tanggal = '$booking_tanggal'
				AND id_dokter = '$id_dokter'
				AND id_sesi = '$id_sesi')
				) AS noant
				FROM booking
				WHERE id_booking = '$id_booking'
				")->result();

			foreach ($result as $d) {
				$id_booking = $d->id_booking;
				$noant 		= $d->noant;

				$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Berhasil mendaftar,<br><font size="4"><b>Nomor Antrian : 
					'.$noant.'</b></font></div>');
				redirect('app/dataDaftar/dataDetail/'.$id_booking);

			}

		}

	}

	public function dataDetail($id)
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = base_url('app/dataDaftar');

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$id_dokter        = $this->session->userdata('id_dokter');
		$id_sesi          = $this->session->userdata('id_sesi');
		$booking_tanggal  = $this->session->userdata('booking_tanggal');
		$hbt = date('w', strtotime($booking_tanggal));

		$data['datadaftar'] = $this->db->query("
			SELECT *, dokter.nama_dokter, sesi.nama_sesi
			FROM booking, dokter, sesi
			WHERE booking.id_dokter=dokter.id_dokter
			AND booking.id_sesi=sesi.id_sesi
			AND booking.id_booking='$id'
			")->result();

		$result = $this->db->query("
			SELECT jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt' AND id_sesi='$id_sesi'
			")->result();

		foreach ($result as $d) {
			$jadwal_jam = $d->jam;
		}

		$data['jadwal_jam'] = $jadwal_jam;
		
		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataDetail',$data);
		$this->load->view('templates/footer',$data);
	}

	public function dataRegistrasi()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$data['datadokter'] = $this->db->query("SELECT dokter.id_dokter, dokter.nama_dokter, mr_unit.nama_unit FROM dokter JOIN mr_unit ON dokter.id_unit = mr_unit.id_unit WHERE dokter.status='1' ORDER BY dokter.id_unit, dokter.nama_dokter ASC")->result();
		$data['datasesi'] = $this->db->query("SELECT id_sesi, nama_sesi FROM sesi")->result();
		
		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataRegistrasi',$data);
		$this->load->view('templates/footer',$data);
	}

	public function tampilDataRegistrasi()
	{
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$id_catatan_medik 	= $this->input->post('id_catatan_medik');
		$id_dokter 			= $this->input->post('id_dokter');
		$id_sesi 			= $this->input->post('id_sesi');
		$booking_tanggal 	= $this->input->post('booking_tanggal');
		$hbt 				= date('w', strtotime($booking_tanggal));

		$data['id_dokter'] 	= $id_dokter;

		$cek = $this->db->query("
			SELECT id_booking FROM booking WHERE id_catatan_medik = '$id_catatan_medik' AND booking_tanggal = '$booking_tanggal' AND id_dokter = '$id_dokter' AND id_sesi = '$id_sesi'
			")->num_rows();

		if($cek>0)
		{

			$data['datadaftar'] = $this->db->query("
				SELECT *, dokter.nama_dokter, sesi.nama_sesi
				FROM booking, dokter, sesi
				WHERE booking.id_dokter=dokter.id_dokter
				AND booking.id_sesi=sesi.id_sesi
				AND booking.id_catatan_medik='$id_catatan_medik'
				AND booking.booking_tanggal='$booking_tanggal'
				AND booking.id_dokter='$id_dokter'
				AND booking.id_sesi='$id_sesi'
				ORDER BY booking.id_booking ASC
				")->result();

			$result = $this->db->query("
				SELECT jam FROM dokter_jadwal WHERE id_dokter='$id_dokter' AND hari='$hbt' AND id_sesi='$id_sesi'
				")->result();

			foreach ($result as $d) {
				$jadwal_jam = $d->jam;
			}

			$data['jadwal_jam'] = $jadwal_jam;

		}else{

			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Data tidak ditemukan</div>');
			redirect('app/dataDaftar/dataRegistrasi/');

		}
		
		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataRegistrasi',$data);
		$this->load->view('templates/footer',$data);
	}

	public function deleteDataRegistrasi($id)
	{
		$where = array('id_booking' => $id);
		$this->mSimetris->deleteData('booking',$where);
		$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<font size="5">Berhasil membatalkan jadwal poli</font>
			</div>');
		redirect('app/dataDaftar/dataRegistrasi/');

	}

} 

?>