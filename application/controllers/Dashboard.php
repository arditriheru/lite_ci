<?php 

class dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if($this->session->userdata('login') !='1')
        // {
        //     $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <font size="4"><b>Anda belum login!</b></font>
        //         </div>');
        //     redirect('booking/login');
        // }

        $this->load->model("mSimetris");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']      = "Dashboard";
        $data['subtitle']   = "Rachmi Online";

        $data['navmenu1']      = base_url('app/dataHelp');
        $data['navmenu2']      = base_url('dashboard');
        $data['navmenu3']      = "https://api.whatsapp.com/send?phone=6281390383000";

        $data['navlink1']      = "fa-question-circle-o";
        $data['navlink2']      = "fa-home";
        $data['navlink3']      = "fa-whatsapp";

        $this->load->view('templates/header',$data);
        $this->load->view('app/vDashboard',$data);
        $this->load->view('templates/footer',$data);
    }
}

?>