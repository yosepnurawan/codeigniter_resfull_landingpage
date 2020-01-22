<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Key_model extends CI_Model
{
    private $_table = "keys";

    public function save($user_id, $token)
    {        
        $data = [
            'user_id' => $user_id,
            'key' => $token,
            'level' => 1,
            'ignore_limits' => 0,
            'is_private_key' => 0,
            'ip_addresses' => '%',
            'date_created' => time(),
        ];

        $this->db->insert($this->_table, $data);

        return true;
    }

    public function detail($user_id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function delete($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete($this->_table);

        return true;
    }

    public function proses($user_id, $token)
    {
        if (!empty($this->detail($user_id, $token))) {
            if ($this->delete($user_id)) {
                return $this->save($user_id, $token);
            }
        } else {
            return $this->save($user_id, $token);
        }

        return false;
    }
}