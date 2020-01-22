<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pegawai_model");


        $data_login = $this->session->userdata();
        if (count($data_login) <= 1) {
            redirect("login/index", "refresh");
        }
    }

	public function index()
	{
        $data['data_pegawai']     = $this->pegawai_model->getAllData();
        $data['content']       = "pegawai/list_pegawai";
		$this->load->view('home', $data);
    }
}
