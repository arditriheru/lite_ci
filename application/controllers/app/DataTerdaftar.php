<?php 

class dataTerdaftar extends CI_Controller
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
		$data['title'] 		= "Daftar Online";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = "app/dataHelp";
		$data['navmenu2']      = "http://pendaftaran.rskiarachmi.co.id";
		$data['navmenu3']      = "javascript:window.location=document.referrer";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$data['datadokter'] = $this->db->query("SELECT dokter.id_dokter, dokter.nama_dokter, mr_unit.nama_unit FROM dokter JOIN mr_unit ON dokter.id_unit = mr_unit.id_unit WHERE dokter.status='1' ORDER BY dokter.id_unit, dokter.nama_dokter ASC")->result();
		$data['datasesi'] = $this->db->query("SELECT id_sesi, nama_sesi FROM sesi")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataTerdaftar',$data);
		$this->load->view('templates/footer',$data);
	}

	public function tampilData()
	{
		$data['title'] 		= "Terdaftar";
		$data['subtitle'] 	= "Pasien Terdaftar";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";

		$id_dokter 			= $this->input->post('id_dokter');
		$id_sesi 			= $this->input->post('id_sesi');
		$booking_tanggal 	= $this->input->post('booking_tanggal');

		$data['id_dokter'] = $id_dokter;

		$data['datadaftar'] = $this->db->query("
			SELECT*, COUNT(booking.id_booking) AS total, dokter.nama_dokter, sesi.nama_sesi
			FROM booking, dokter, sesi
			WHERE booking.id_dokter = dokter.id_dokter
			AND booking.id_sesi = sesi.id_sesi
			AND booking.booking_tanggal = '$booking_tanggal'
			AND booking.id_sesi = '$id_sesi'
			AND booking.id_dokter='$id_dokter'
			")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataTerdaftar',$data);
		$this->load->view('templates/footer',$data);
	}

} 

?>