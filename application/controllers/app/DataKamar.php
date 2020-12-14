<?php 

class dataKamar extends CI_Controller
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
		$data['title'] 		= "Kamar";
		$data['subtitle'] 	= "";

		$data['navmenu1']      = base_url('app/dataHelp');
		$data['navmenu2']      = base_url('dashboard');
		$data['navmenu3']      = "javascript: history.back()";

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
		$this->load->view('app/vDataKamar',$data);
		$this->load->view('templates/footer',$data);
	}

} 

?>