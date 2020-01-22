<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("tingkat_model");
        $this->load->model("user_model");

        $this->load->library('form_validation');

        $data_login = $this->session->userdata();
        if (count($data_login) <= 1) {
            redirect("login/index", "refresh");
        }
        if ($data_login['id_tingkat'] <> "1") {
            show_404();
        }
    }

	public function index()
	{
        $data['data_user']     = $this->user_model->getAllData();
        $data['content']       = "user/list_user";
		$this->load->view('home', $data);
    }

    public function tingkat()
    {
        $data['data_tingkat']     = $this->tingkat_model->getAllData();
        $data['content']          = "user/list_tingkatuser";
        $this->load->view('home', $data);
    }

    public function addUser()
    {
        $data['data_tingkat']     = $this->tingkat_model->getAllData();
        $data['content']          = "user/add_user";

        // validations
        $validation = $this->form_validation;
        $validation->set_rules($this->user_model->rules());

        if ($validation->run()) {
            if ($this->user_model->save()) {
                $this->session->set_flashdata('info', '<div style="color: green">Simpan Data Berhasil !</div>');
                redirect("user/index", "refresh");
            }
        }

        $this->load->view('home', $data);
    }

    public function editUser($id)
    {
        $data['data_tingkat']     = $this->tingkat_model->getAllData();
        $data['detail_user']      = $this->user_model->detail($id);
        $data['content']          = "user/edit_user";

        // validations
        $validation = $this->form_validation;
        $validation->set_rules($this->user_model->rules());

        if ($validation->run()) {
            if ($this->user_model->update($id)) {
                $this->session->set_flashdata('info', '<div style="color: green">Update Data Berhasil !</div>');
                redirect("user/index", "refresh");
            }
        }

        $this->load->view('home', $data);
    }

    public function deleteUser($id)
    {
        $this->user_model->delete($id);
        $this->session->set_flashdata('info', '<div style="color: green">Delete Data Berhasil !</div>');
        redirect("user/index", "refresh");
    }
}
