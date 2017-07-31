<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginRegisterModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function userInfo($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($data);
        $result = $this->db->get();
        return $user = $result->row_array();
    }

}