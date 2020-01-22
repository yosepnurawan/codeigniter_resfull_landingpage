<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

	public function index()
	{
		$this->load->view('login');
    }
    
    public function auth()
    {
        if (!empty($_REQUEST)) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data_login = $this->user_model->cek_user($username, $password);

            if (!empty($data_login)) {
                $data_sesi = [
                    'username' => $data_login['username'],
                    'tipe' => $data_login['flag'],
                    'id_tingkat' => $data_login['id_tingkat'],
                    'status' => "Login"
                ];

                $this->session->set_userdata($data_sesi);
                redirect("home/", "refresh");
            } else {
                $this->session->set_flashdata('info', 'Username atau Password Salah!');
                redirect("login/index", "refresh");
            }

        } else {
            $this->load->view('login');
        }
    }

    public function authApi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data_login = $this->user_model->cek_user($username, $password);

        if (!empty($data_login)) {
            $data_sesi = [
                'username' => $data_login['username'],
                'tipe' => $data_login['flag'],
                'id_tingkat' => $data_login['id_tingkat'],
                'status' => "Login"
            ];

            $this->session->set_userdata($data_sesi);
            redirect("home/", "refresh");
        } else {
            $this->session->set_flashdata('info', 'Username atau Password Salah!');
            redirect("login/index", "refresh");
        }
    }

    public function logout() 
    {
        $this->session->sess_destroy();
        redirect("login/index", "refresh");
    }
}
