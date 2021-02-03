<?php 

class dataSwab extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("mSimetris");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] 		= "Daftar Swab Antigen";
		$data['subtitle'] 	= "";

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

		$userdata = array(
			'no_identitas' 		=> $no_identitas,
			'nama' 				=> $nama,
			'alamat' 			=> $alamat,
			'tgl_lahir' 		=> $tgl_lahir,
			'id_sex' 			=> $id_sex,
			'id_jadwal_swab' 	=> $id_jadwal_swab,
			'kontak' 			=> $kontak,
			'email' 			=> $email,
			'no_invoice' 		=> "inv".uniqid(),
			'tanggal' 			=> $tanggal,
			'jam' 				=> $jam
		);

		if($userdata)
		{
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Berhasil menambahkan identitas</div>');
			redirect('swab/dataSwab/formKtp');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Gagal menambahkan identitas</div>');
			redirect('swab/dataSwab/formIdentitas');
		}

	}

	public function formKtp()
	{
		$data['title'] 		= "Upload Kartu Identitas";
		$data['subtitle'] 	= "";

		$this->load->view('templates/header',$data);
		$this->load->view('swab/vFormKtp',$data);
		$this->load->view('templates/footer',$data);
	}

	public function formKtpAksi()
	{
		$file_name 						= 'id_'.$this->input->post('id_booking_swab').date('Ymd').uniqid();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']        	= $file_name;
		$config['overwrite']			= true;
		$config['max_size']             = 3000;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('file_identitas'))
		{
			$fileData 		= $this->upload->data();
			$file_identitas	= implode(['file_identitas' => $fileData['file_name']]);

			$userdata = array(
				'file_identitas'	=> $file_identitas,
			);

			$this->session->set_userdata($userdata);

			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Berhasil upload kartu identitas</div>');
			redirect('swab/dataSwab/formNota');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Gagal upload. Silahkan upload file jpg/jpeg/png</div>');
			redirect('swab/dataSwab/formKtp');
		}

	}

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
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']        	= $file_name;
		$config['overwrite']			= true;
		$config['max_size']             = 3000;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('file_pembayaran'))
		{
			$fileData 		= $this->upload->data();
			$file_pembayaran	= implode(['file_pembayaran' => $fileData['file_name']]);

			$data = array(
				'no_identitas' 		=> $this->session->userdata('no_identitas'),
				'nama' 				=> $this->session->userdata('nama'),
				'alamat' 			=> $this->session->userdata('alamat'),
				'tgl_lahir' 		=> $this->session->userdata('tgl_lahir'),
				'id_sex' 			=> $this->session->userdata('id_sex'),
				'id_jadwal_swab' 	=> $this->session->userdata('id_jadwal_swab'),
				'kontak' 			=> $this->session->userdata('kontak'),
				'email' 			=> $this->session->userdata('email'),
				'file_identitas' 	=> $this->session->userdata('file_identitas'),
				'file_pembayaran' 	=> $file_pembayaran,
				'no_invoice' 		=> $this->session->userdata('no_invoice'),
				'tanggal' 			=> $this->session->userdata('tanggal'),
				'jam' 				=> $this->session->userdata('jam')
			);

			$this->mSimetris->insertData('booking_swab',$data);

			$where = array(
				'no_identitas' 	=> $this->session->userdata('no_identitas'),
				'jam' 			=> $this->session->userdata('jam')
			);

			$data = $this->mSimetris->selectData('booking_swab','id_booking_swab',$where)->result();

			foreach ($data as $d) {
				$id = $d->id_booking_swab;
			}

			redirect('swab/dataSwab/detail/'.$id);
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Gagal upload. Silahkan upload file jpg/jpeg/png</div>');
			redirect('swab/dataSwab/formNota');
		}

	}

	public function detail($id)
	{
		$data['title'] 		= "Detail Daftar";
		$data['subtitle'] 	= "";

		$where = array(
			'id_booking_swab' 	=> $id,
		);

		if($where)
		{
			$data['data'] = $this->mSimetris->dataSwabDetail($where)->result();
		}
		
		$this->load->view('templates/header',$data);
		$this->load->view('swab/vDetail',$data);
		$this->load->view('templates/footer',$data);
	}

}

?>