<?php

use Restserver\Libraries\RestController;
use \Firebase\JWT\JWT;
require(APPPATH . 'libraries/RestController.php');
require(APPPATH . 'libraries/JWT.php');

class Api extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("pegawai_model");
        $this->load->model("user_model");
        $this->load->model("key_model");
        $this->load->library('form_validation');
    }

    public function test_get($id = null)
    {
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        // $output = JWT::encode(date('Y-m-d h:i:s'), $this->config->item('jwt_key'));

        // var_dump($output); exit;

        // $id = $this->get('id');

        if ($id === null) {
            if ($users) {
                $this->response($users, 200);
            } else {
                $this->response(['status' => false, 'message' => 'No data were found'], 404);
            }
        } else {
            if (array_key_exists($id, $users)) {
                $this->response($users[$id], 200);
            } else {
                $this->response(['status' => false, 'message' => 'No such data found'], 404);
            }
        }
    }

    public function getToken_post()
    {
        // validations
        $data = $this->post();
        $validation = $this->form_validation;
        $validation->set_data($data);
        $validation->set_rules($this->user_model->rules());


        if ($this->form_validation->run() == FALSE) {
            $info_error = $this->form_validation->error_array();
            $this->response(['status' => false, 'message' => $info_error], 404);
        } else {
            $data_login = $this->user_model->cek_user($data['username'], $data['password']);
            if (!empty($data_login)) {
                $token = JWT::encode(date('Y-m-d h:i:s'), $this->config->item('jwt_key'));
                if ($this->key_model->proses($data_login['id_user'], $token)) {
                    $this->response(['status' => true, 'username' => $data['username'], 'token' => $token], 200);
                }
            } else {
                $this->response(['status' => false, 'message' => 'No data were found'], 404);
            }
        }
    }

    public function pegawai_get($id = null)
    {        
        if ($id === null) {
            $pegawai_data = $this->pegawai_model->getAllData();
            if ($pegawai_data) {
                $this->response($pegawai_data, 200);
            } else {
                $this->response(['status' => false, 'message' => 'No data were found'], 404);
            }
        } else {
            $pegawai_detail = $this->pegawai_model->getDetail($id);
            if ($pegawai_detail) {
                $this->response($pegawai_detail, 200);
            } else {
                $this->response(['status' => false, 'message' => 'No such data found'], 404);
            }
        }
    }

    public function addpegawai_post()
    {
        // validations
        $data = $this->post();
        $validation = $this->form_validation;
        $validation->set_data($data);
        $validation->set_rules($this->pegawai_model->rules());

        if ($this->form_validation->run() == FALSE) {
            $info_error = $this->form_validation->error_array();
            $this->response(['status' => false, 'message' => $info_error], 404);            
        } else {
            if ($this->pegawai_model->save()) {
                $this->response(['status' => true, 'message' => 'Berhasil Simpan Data'], 200);
            } else {
                $this->response(['status' => false, 'message' => 'Gagal Simpan Data'], 404);
            }
        }
    }

    public function deletepegawai_delete($id = null)
    {
        if ($id === null) {
            $this->response(['status' => false, 'message' => 'Butuh Parameter Id Pegawai'], 404);
        } else {
            if ($this->pegawai_model->delete($id)) {
                $this->response(['status' => true, 'message' => 'Berhasil Delete Data'], 200);
            } else {
                $this->response(['status' => false, 'message' => 'Gagal Delete Data'], 404);
            }
        }
    }

    public function editpegawai_post($id = null)
    {
        // validations
        $data = $this->post();
        $validation = $this->form_validation;
        $validation->set_data($data);
        $validation->set_rules($this->pegawai_model->rules());

        if ($id === null) {
            $this->response(['status' => false, 'message' => 'Butuh Parameter Id Pegawai'], 404);
        } else {
            if ($this->form_validation->run() == FALSE) {
                $info_error = $this->form_validation->error_array();

                $this->response(['status' => false, 'message' => $info_error], 404);
            } else {
                if ($this->pegawai_model->update($id, $data)) {
                    $this->response(['status' => true, 'message' => 'Berhasil Update Data'], 200);
                } else {
                    $this->response(['status' => false, 'message' => 'Gagal Update Data'], 404);
                }
            }
        }
    }
}
