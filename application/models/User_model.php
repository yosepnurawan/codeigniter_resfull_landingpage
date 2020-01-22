<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table_user = "tbl_user";
    private $_table_tingkat = "tbl_tingkat";

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'username tidak boleh kosong.',
                ],
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong.',
                ],
            ],
        ];
    }

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from($this->_table_user);
        $this->db->join($this->_table_tingkat, $this->_table_user . '.id_tingkat = ' . $this->_table_tingkat . '.id_tingkat');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function cek_user($username, $password) 
    {
        $this->db->select('id_user, username, password, flag, id_tingkat');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->where('flag', 1);

        $result = $this->db->get($this->_table_user);
        return $result->row_array();
    }

    public function save()
    {
        $data['username']   = $this->input->post('username');
        $data['password']   = md5($this->input->post('password'));
        $data['id_tingkat'] = $this->input->post('tingkat_user');
        $data['flag']       = 1;

        $this->db->insert($this->_table_user, $data);

        return true;
    }

    public function detail($id)
    {
        $this->db->select('*');	
        $this->db->where('id_user', $id);	
        $this->db->where('flag', 1);	
        $result = $this->db->get($this->_table_user);
        return $result->result();
    }

    public function update($id)
    {
        $data['username']   = $this->input->post('username');
        $data['password']   = md5($this->input->post('password'));
        $data['id_tingkat'] = $this->input->post('tingkat_user');
        $data['flag']       = 1;

        $this->db->where('id_user', $id);
        $this->db->update($this->_table_user, $data);

        return true;
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete($this->_table_user);

        return true;
    }
}