<?php 

class dataAntrian extends CI_Controller
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
		// 	redirect('booking/login');
		// }

		$this->load->model("mSimetris");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] 		= "Antrian";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		// antrian poli obsgyn selatan
		$aa = $this->db->query("
			SELECT *, dokter.nama_dokter
			FROM antrian
			INNER JOIN dokter
			ON antrian.id_dokter = dokter.id_dokter
			WHERE antrian.id_unit = 2
			AND antrian.konter = 1")->result();

		foreach ($aa as $d) {
			$a_id_dokter 		= $d->id_dokter;
			$a_id_unit 			= $d->id_unit;
			$a_id_sesi 			= $d->id_sesi;
			$a_tanggal 			= $d->tanggal;
			$a_jam 				= $d->jam;
			$a_nama_dokter 		= $d->nama_dokter;
			$a_booking_tanggal 	= getDatenow();
		}

		if(!isset($a_id_dokter))
		{
			$a_tcounter     = '0';
			$a_ncounter     = '0';
			$a_total        = '0';
			$a_nama_dokter  = 'Tutup';
			$a_tanggal     	= '-';
			$a_jam        	= '-';

			$data['a_nama_dokter'] 	= $a_nama_dokter;
			$data['a_tcounter'] 	= $a_tcounter;
			$data['a_ncounter'] 	= $a_ncounter;
			$data['a_total'] 		= $a_total;
			$data['a_tanggal'] 		= $a_tanggal;
			$data['a_jam'] 			= $a_jam;

		}else{

			$bb = $this->db->query("
				SELECT id_booking AS id_booking
				FROM booking 
				WHERE booking_tanggal = '$a_booking_tanggal'
				AND id_dokter = '$a_id_dokter'
				AND id_sesi = '$a_id_sesi'
				AND aktif = 1")->result();

			foreach ($bb as $d) {
				$a_id_booking = $d->id_booking;
			}

			if(!isset($a_id_booking))
			{
				$a_tcounter = '0';
				$a_ncounter = '1';


				$cc = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$a_booking_tanggal'
					AND id_dokter = '$a_id_dokter'
					AND id_sesi = '$a_id_sesi'")->result();

				foreach ($cc as $d) {
					$a_total = $d->total;
				}

			}else{

				$cc = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$a_booking_tanggal'
					AND id_dokter = '$a_id_dokter'
					AND id_sesi = '$a_id_sesi'")->result();

				foreach ($cc as $d) {
					$a_total = $d->total;
				}

				$dd = $this->db->query("
					SELECT FIND_IN_SET( id_booking, (    
					SELECT GROUP_CONCAT( id_booking
					ORDER BY id_booking ASC ) 
					FROM booking 
					WHERE booking_tanggal = '$a_booking_tanggal'
					AND id_dokter = '$a_id_dokter'
					AND id_sesi = '$a_id_sesi')
					) AS noant
					FROM booking
					WHERE id_booking = '$a_id_booking'")->result();

				foreach ($dd as $d) {
					$a_tcounter = $d->noant;
					$a_ncounter = $d->noant+1;
				}
			}

			$data['a_nama_dokter'] 	= $a_nama_dokter;
			$data['a_tcounter'] 	= $a_tcounter;
			$data['a_ncounter'] 	= $a_ncounter;
			$data['a_total'] 		= $a_total;
			$data['a_tanggal'] 		= dateIndo($a_tanggal);
			$data['a_jam'] 			= $a_jam;

		}

		// antrian poli anak
		$ee = $this->db->query("
			SELECT *, dokter.nama_dokter
			FROM antrian
			INNER JOIN dokter
			ON antrian.id_dokter = dokter.id_dokter
			WHERE antrian.id_unit = 1
			AND antrian.konter = 2")->result();

		foreach ($ee as $d) {
			$b_id_dokter 		= $d->id_dokter;
			$b_id_unit 			= $d->id_unit;
			$b_id_sesi 			= $d->id_sesi;
			$b_tanggal 			= $d->tanggal;
			$b_jam 				= $d->jam;
			$b_nama_dokter 		= $d->nama_dokter;
			$b_booking_tanggal 	= getDatenow();
		}

		if(!isset($b_id_dokter)){
			$b_tcounter     = '0';
			$b_ncounter     = '0';
			$b_total        = '0';
			$b_nama_dokter  = 'Tutup';
			$b_tanggal     	= '-';
			$b_jam        	= '-';

			$data['b_nama_dokter'] 	= $b_nama_dokter;
			$data['b_tcounter'] 	= $b_tcounter;
			$data['b_ncounter'] 	= $b_ncounter;
			$data['b_total'] 		= $b_total;
			$data['b_tanggal'] 		= $b_tanggal;
			$data['b_jam'] 			= $b_jam;

		}else{

			$ff = $this->db->query("
				SELECT id_booking AS id_booking
				FROM booking 
				WHERE booking_tanggal = '$b_booking_tanggal'
				AND id_dokter = '$b_id_dokter'
				AND id_sesi = '$b_id_sesi'
				AND aktif = 1")->result();

			foreach ($ff as $d) {
				$b_id_booking = $d->id_booking;
			}

			if(!isset($b_id_booking)){
				$b_tcounter = '0';
				$b_ncounter = '1';


				$gg = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$b_booking_tanggal'
					AND id_dokter = '$b_id_dokter'
					AND id_sesi = '$b_id_sesi'")->result();

				foreach ($gg as $d) {
					$b_total = $d->total;
				}
			}else{
				$gg = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$b_booking_tanggal'
					AND id_dokter = '$b_id_dokter'
					AND id_sesi = '$b_id_sesi'")->result();

				foreach ($gg as $d) {
					$b_total = $d->total;
				}

				$hh = $this->db->query("
					SELECT FIND_IN_SET( id_booking, (    
					SELECT GROUP_CONCAT( id_booking
					ORDER BY id_booking ASC ) 
					FROM booking 
					WHERE booking_tanggal = '$b_booking_tanggal'
					AND id_dokter = '$b_id_dokter'
					AND id_sesi = '$b_id_sesi')
					) AS noant
					FROM booking
					WHERE id_booking = '$b_id_booking'")->result();

				foreach ($hh as $d) {
					$b_tcounter = $d->noant;
					$b_ncounter = $d->noant+1;
				}
			}

			$data['b_nama_dokter'] 	= $b_nama_dokter;
			$data['b_tcounter'] 	= $b_tcounter;
			$data['b_ncounter'] 	= $b_ncounter;
			$data['b_total'] 		= $b_total;
			$data['b_tanggal'] 		= dateIndo($b_tanggal);
			$data['b_jam'] 			= $b_jam;

		}

		// antrian poli obsgyn utara
		$ee = $this->db->query("
			SELECT *, dokter.nama_dokter
			FROM antrian
			INNER JOIN dokter
			ON antrian.id_dokter = dokter.id_dokter
			WHERE antrian.id_unit = 2
			AND antrian.konter = 3")->result();

		foreach ($ee as $d) {
			$c_id_dokter 		= $d->id_dokter;
			$c_id_unit 			= $d->id_unit;
			$c_id_sesi 			= $d->id_sesi;
			$c_tanggal 			= $d->tanggal;
			$c_jam 				= $d->jam;
			$c_nama_dokter 		= $d->nama_dokter;
			$c_booking_tanggal 	= getDatenow();
		}

		if(!isset($c_id_dokter)){
			$c_tcounter     = '0';
			$c_ncounter     = '0';
			$c_total        = '0';
			$c_nama_dokter  = 'Tutup';
			$c_tanggal     	= '-';
			$c_jam        	= '-';

			$data['c_nama_dokter'] 	= $c_nama_dokter;
			$data['c_tcounter'] 	= $c_tcounter;
			$data['c_ncounter'] 	= $c_ncounter;
			$data['c_total'] 		= $c_total;
			$data['c_tanggal'] 		= $c_tanggal;
			$data['c_jam'] 			= $c_jam;

		}else{

			$ff = $this->db->query("
				SELECT id_booking AS id_booking
				FROM booking 
				WHERE booking_tanggal = '$c_booking_tanggal'
				AND id_dokter = '$c_id_dokter'
				AND id_sesi = '$c_id_sesi'
				AND aktif = 1")->result();

			foreach ($ff as $d) {
				$c_id_booking = $d->id_booking;
			}

			if(!isset($c_id_booking)){
				$c_tcounter = '0';
				$c_ncounter = '1';


				$gg = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$c_booking_tanggal'
					AND id_dokter = '$c_id_dokter'
					AND id_sesi = '$c_id_sesi'")->result();

				foreach ($gg as $d) {
					$c_total = $d->total;
				}
			}else{
				$gg = $this->db->query("
					SELECT COUNT(id_booking) AS total
					FROM booking 
					WHERE booking_tanggal = '$c_booking_tanggal'
					AND id_dokter = '$c_id_dokter'
					AND id_sesi = '$c_id_sesi'")->result();

				foreach ($gg as $d) {
					$c_total = $d->total;
				}

				$hh = $this->db->query("
					SELECT FIND_IN_SET( id_booking, (    
					SELECT GROUP_CONCAT( id_booking
					ORDER BY id_booking ASC ) 
					FROM booking 
					WHERE booking_tanggal = '$c_booking_tanggal'
					AND id_dokter = '$c_id_dokter'
					AND id_sesi = '$c_id_sesi')
					) AS noant
					FROM booking
					WHERE id_booking = '$c_id_booking'")->result();

				foreach ($hh as $d) {
					$c_tcounter = $d->noant;
					$c_ncounter = $d->noant+1;
				}
			}

			$data['c_nama_dokter'] 	= $c_nama_dokter;
			$data['c_tcounter'] 	= $c_tcounter;
			$data['c_ncounter'] 	= $c_ncounter;
			$data['c_total'] 		= $c_total;
			$data['c_tanggal'] 		= dateIndo($c_tanggal);
			$data['c_jam'] 			= $c_jam;

		}

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataAntrian',$data);
		$this->load->view('templates/footer',$data);
	}

} 

?>