<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $data_login = $this->session->userdata();
        if (count($data_login) <= 1) {
            redirect("login/index", "refresh");
        }

        if ($data_login['id_tingkat'] <> "1" && $data_login['id_tingkat'] <> "2") {
            show_404();
        }
    }

	public function index()
	{
        $data['content'] = "blank/list_blank";
        $this->load->view('home', $data);
    }
}
