<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    private $_table = "tbl_pegawai";

    public function rules()
    {
        return [
            [
                'field' => 'nama_pegawai',
                'label' => 'nama_pegawai',
                'rules' => 'required|max_length[250]',
                'errors' => [
                    'required' => 'nama pegawai tidak boleh kosong.'
                ],
            ],
            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'jabatan tidak boleh kosong.',
                ],
            ],
        ];
    }

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        
        return $query->result();
    }

    public function getDetail($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id_pegawai', $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function save()
    {
        $data = [
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'jabatan' => $this->input->post('jabatan'),
            'photo' => $this->uploadPhoto($this->input->post('nama_pegawai')),
        ];

        $insert = $this->db->insert($this->_table, $data);

        if ($insert) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        if ($this->getDetail($id)) {
            $this->hapusPhoto($id);
            $this->db->where('id_pegawai', $id);
            $this->db->delete($this->_table);

            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $data['nama_pegawai']   = $this->input->post('nama_pegawai');
        $data['jabatan']   = $this->input->post('jabatan');

        if (!empty($_FILES["image"]["name"])) {
            $this->hapusPhoto($id);
            $foto_karyawan      = $this->uploadPhoto($data['nama_pegawai']);
            $data['photo']      = $foto_karyawan;
        }

        $this->db->where('id_pegawai', $id);
        $update = $this->db->update($this->_table, $data);

        if ($update) {
            return true;
        }

        return false;
    }

    private function uploadPhoto($nm_pegawai)
    {
        $date_upload                    = date('Ymd');
        $config['upload_path']          = './resources/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $date_upload . '_' . $nm_pegawai;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB


        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $nama_file = $this->upload->data("file_name");
        } else {
            $nama_file = "";
        }

        return $nama_file;
    }

    private function hapusPhoto($id)
    {
        //cari nama file
        $data_karyawan = $this->getDetail($id);
        foreach ($data_karyawan as $data) {
            $nama_file = $data->photo;
        }

        if ($nama_file != "default.jpeg" && !empty($nama_file)) {
            $path = "./resources/foto/" . $nama_file;
            return @unlink($path);
        }

    }
}