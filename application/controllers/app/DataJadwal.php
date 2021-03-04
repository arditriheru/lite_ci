<?php 

class dataJadwal extends CI_Controller
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
		$data['title'] 		= "Jadwal";
		$data['subtitle'] 	= "Jadwal Praktek";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$data['datadokter'] = $this->db->query("
			SELECT dokter.id_dokter, dokter.nama_dokter, mr_unit.nama_unit 
			FROM dokter 
			JOIN mr_unit 
			ON dokter.id_unit = mr_unit.id_unit 
			WHERE dokter.status='1' 
			ORDER BY dokter.id_unit, dokter.nama_dokter ASC")->result();
		$data['datajadwal'] = $this->db->query("
			SELECT dokter_jadwal.jam, mr_unit.nama_unit, dokter.nama_dokter,
			CASE
			WHEN dokter_jadwal.hari='1' THEN 'Senin'
			WHEN dokter_jadwal.hari='2' THEN 'Selasa'
			WHEN dokter_jadwal.hari='3' THEN 'Rabu'
			WHEN dokter_jadwal.hari='4' THEN 'Kamis'
			WHEN dokter_jadwal.hari='5' THEN 'Jumat'
			WHEN dokter_jadwal.hari='6' THEN 'Sabtu'
			WHEN dokter_jadwal.hari='0' THEN 'Minggu'
			END AS nama_hari
			FROM dokter_jadwal
			JOIN dokter
			ON dokter_jadwal.id_dokter=dokter.id_dokter
			JOIN mr_unit
			ON mr_unit.id_unit=dokter.id_unit
			ORDER BY dokter_jadwal.hari, dokter_jadwal.id_sesi ASC")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataJadwal',$data);
		$this->load->view('templates/footer',$data);
	}

	public function tampilData()
	{
		$data['title'] 		= "Jadwal";
		$data['subtitle'] 	= "Jadwal Praktek";

		$data['navmenu1']      = "app/dataHelp";
		$data['navmenu2']      = "http://pendaftaran.rskiarachmi.co.id";
		$data['navmenu3']      = "javascript:window.location=document.referrer";

		$data['navlink1']      = "fa-question-circle-o";
		$data['navlink2']      = "fa-home";
		$data['navlink3']      = "fa-arrow-circle-o-left";
		
		$data['datadokter'] = $this->db->query("SELECT id_dokter, nama_dokter FROM dokter WHERE status='1'")->result();

		$id_dokter = $this->input->post('id_dokter');

		$data['id_dokter'] = $id_dokter;

		$namadokter = $this->db->query("SELECT nama_dokter FROM dokter WHERE id_dokter = '$id_dokter'")->result();

		foreach ($namadokter as $d) {
			$nama_dokter = $d->nama_dokter;
		}

		$data['nama_dokter'] 	= $nama_dokter;


		$data['datasenin'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=1")->result();

		$data['dataselasa'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=2")->result();

		$data['datarabu'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=3")->result();

		$data['datakamis'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=4")->result();

		$data['datajumat'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=5")->result();

		$data['datasabtu'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=6")->result();

		$data['dataminggu'] = $this->db->query("
			SELECT *, sesi.nama_sesi,
			IF (dokter_jadwal.ims='1', ' + Imunisasi','') AS ims
			FROM dokter_jadwal, sesi
			WHERE dokter_jadwal.id_dokter = '$id_dokter'
			AND dokter_jadwal.id_sesi = sesi.id_sesi
			AND dokter_jadwal.hari=0")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('app/vDataJadwal',$data);
		$this->load->view('templates/footer',$data);
	}

} 

?>