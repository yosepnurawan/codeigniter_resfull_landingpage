<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $data_login = $this->session->userdata();
        if (count($data_login) <= 1) {
            redirect("login/index", "refresh");
        }
    }

	public function index()
	{
        $data['content'] = "home/list_home";
		$this->load->view('home', $data);
    }
}
