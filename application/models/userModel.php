<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usermodel extends CI_Model {
	
	public function getById($id)
	{
		$sql = "SELECT * FROM tbl_user WHERE user_id = $id";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getNameById($id)
	{
		$sql = "SELECT * FROM tbl_user WHERE user_id = $id";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getHistoryByName($name)
	{
		$sql = "SELECT * FROM tbl_marks WHERE user_name='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getallexam()
	{
		$sql = "SELECT * FROM tbl_test";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getsrcexam($txt)
	{
		$sql = "SELECT * FROM tbl_test WHERE test_name='$txt'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getexamnum($name)
	{
		$sql = "SELECT * FROM tbl_marks WHERE user_name='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAll($name)
	{
		$sql = "SELECT * FROM tbl_user WHERE user_name='$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function select_question_details_by_test_name($name)
    {
        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->order_by('rand()');
        $this->db->limit(30);
        $this->db->where('test_name', $name);
        return $query_result = $this->db->get()->result_array();
    }  

    public function select_test_details_by_test_name($test_name)
     {
        $this->db->select('*');
        $this->db->from('tbl_test');
        $this->db->where('test_name', $test_name);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    } 

    public function select_user_by_id()
    {
        
        $user_id = $this->session->userdata('userids');
         $user_name = $this->session->userdata('usernames');
        
         $sql="SELECT * FROM tbl_user WHERE user_id =$user_id";
           
        $query_result = $this->db->query($sql);
        $result = $query_result->row();

        return $result;
    }

    public function insert_mark($sdata)
    {
        $this->db->insert('tbl_marks', $sdata);
    }
}