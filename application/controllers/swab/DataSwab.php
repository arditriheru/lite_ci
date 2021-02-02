<?php 

class dataSwab extends CI_Controller
{

	private $imagepath;
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mSimetris");
		$this->load->library('form_validation');
		$this->imagepath = realpath(APPPATH.'./uploads/');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] 		= "Swab Antigen";
		$data['subtitle'] 	= "";

		session_destroy();

		$this->load->view('templates/header',$data);
		$this->load->view('swab/vDaftarSwab',$data);
		$this->load->view('templates/footer',$data);
	}

	public function formIdentitas()
	{
		$data['title'] 		= "Form Identitas";
		$data['subtitle'] 	= "";

		$data['datasex'] 	= $this->mSimetris->getData("mr_sex")->result();
		$data['datajadwal']	= $this->mSimetris->getData("jadwal_swab")->result();

		$this->load->view('templates/header',$data);
		$this->load->view('swab/vFormIdentitas',$data);
		$this->load->view('templates/footer',$data);
	}

	public function formIdentitasAksi()
	{
		$no_identitas 		= $this->input->post('no_identitas');
		$nama 				= $this->input->post('nama');
		$alamat 			= $this->input->post('alamat');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$id_sex 			= $this->input->post('id_sex');
		$id_jadwal_swab 	= $this->input->post('id_jadwal_swab');
		$kontak 			= $this->input->post('kontak');
		$email 				= $this->input->post('email');
		$tanggal 			= getDatenow();
		$jam 				= getTimenow();

		$file_name 						= 'id_'.$this->input->post('id_booking_swab').date('Ymd').uniqid();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']        	= $file_name;
		$config['overwrite']			= true;
		$config['max_size']             = 3000;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('file_identitas'))
		{
			$fileData 		= $this->upload->data();
			$file_identitas	= implode(['file_identitas' => $fileData['file_name']]);

			$userdata = array(
				'no_identitas' 		=> $no_identitas,
				'nama' 				=> $nama,
				'alamat' 			=> $alamat,
				'tgl_lahir' 		=> $tgl_lahir,
				'id_sex' 			=> $id_sex,
				'id_jadwal_swab' 	=> $id_jadwal_swab,
				'kontak' 			=> $kontak,
				'email' 			=> $email,
				'file_identitas'	=> $file_identitas,
				'tanggal' 			=> $tanggal,
				'jam' 				=> $jam
			);

			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Berhasil menambahkan identitas</div>');
			redirect('swab/dataSwab/formNota');
		}

	}

	// public function uploadSubmit()
	// {	
	// 	if(!empty($_FILES['image_up']['name']))
	// 	{ 	
	// 		$file_name 						= 'id_'.$this->input->post('id_booking_swab').date('Ymd').uniqid();
	// 		$config['upload_path']          = './uploads/';
	// 		$config['allowed_types']        = 'gif|jpg|png';
	// 		$config['file_name']        	= $file_name;
	// 		$config['overwrite']			= true;
	// 		$config['max_size']             = 3000;

	// 		$this->load->library('upload', $config);

	// 		if ($this->upload->do_upload('image_up'))
	// 		{
	// 			$fileData 		= $this->upload->data();
	// 			$file_identitas	= implode(['file_identitas' => $fileData['file_name']]);

	// 			$userdata = array(
	// 				'no_identitas' 		=> $no_identitas,
	// 				'nama' 				=> $nama,
	// 				'alamat' 			=> $alamat,
	// 				'tgl_lahir' 		=> $tgl_lahir,
	// 				'id_sex' 			=> $id_sex,
	// 				'id_jadwal_swab' 	=> $id_jadwal_swab,
	// 				'kontak' 			=> $kontak,
	// 				'email' 			=> $email,
	// 				'file_identitas'	=> $file_identitas,
	// 				'tanggal' 			=> $tanggal,
	// 				'jam' 				=> $jam
	// 			);
	// 			$this->session->set_userdata($userdata);
	// 			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
	// 				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 				Berhasil menambahkan identitas</div>');
	// 			redirect('swab/dataSwab/formNota');
	// 		}
	// 	}	
	// }


	public function formNota()
	{
		$data['title'] 		= "Upload Bukti Pembayaran";
		$data['subtitle'] 	= "";

		$this->load->view('templates/header',$data);
		$this->load->view('swab/vFormNota',$data);
		$this->load->view('templates/footer',$data);
	}

	public function formNotaAksi()
	{
		$file_name 						= 'nota_'.$this->input->post('id_booking_swab').date('Ymd').uniqid();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']        	= $file_name;
		$config['overwrite']			= true;
		$config['max_size']             = 3000;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('file_pembayaran'))
		{
			$fileData 		= $this->upload->data();
			$file_pembayaran	= implode(['file_pembayaran' => $fileData['file_name']]);

			$data = array(
				'no_identitas' 		=> $this->session->userdata("no_identitas"),
				'nama' 				=> $this->session->userdata("nama"),
				'alamat' 			=> $this->session->userdata("alamat"),
				'tgl_lahir' 		=> $this->session->userdata("tgl_lahir"),
				'id_sex' 			=> $this->session->userdata("id_sex"),
				'id_jadwal_swab' 	=> $this->session->userdata("id_jadwal_swab"),
				'kontak' 			=> $this->session->userdata("kontak"),
				'email' 			=> $this->session->userdata("email"),
				'file_identitas'	=> $this->session->userdata("file_identitas"),
				'file_pembayaran'	=> $file_pembayaran,
				'no_invoice' 		=> "inv".uniqid(),
				'tanggal' 			=> $this->session->userdata("tanggal"),
				'jam' 				=> $this->session->userdata("jam"),
			);

			$insert = $this->mSimetris->insertData('booking_swab',$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Berhasil mendaftar test SWAB Antigen</div>');
			redirect('swab/dataSwab/detail');
		}

	}

	public function detail()
	{
		$data['title'] 		= "Upload Bukti Pembayaran";
		$data['subtitle'] 	= "";

		$where = array(
			'no_identitas' 	=> $this->session->userdata('no_identitas'),
			'jam' 			=> $this->session->userdata('jam'),
		);

		$data['data'] = $this->mSimetris->dataSwab($where)->result();

		$this->load->view('templates/header',$data);
		$this->load->view('swab/vDetail',$data);
		$this->load->view('templates/footer',$data);
	}

}

?>
