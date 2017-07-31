<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function __construct() 
	{
        parent::__construct();
    }

    public function insertQuestion($data)
    {
    	$this->db->insert('tbl_test', $data);
    }

    public function testQuestions($data)
    {
         $this->db->insert('tbl_question', $data);
    }

    public function testUpdate($count,$test_name)
    {
        $this->db->where('test_name', $test_name);
        $this->db->update('tbl_test',$count); 
    }

    public function testInfoUpdate($data,$test_name)
    {
        $this->db->where('test_name', $test_name);
        $this->db->update('tbl_test',$data); 
    }

    public function allTestInfo()
    {
        $sql = "SELECT * FROM tbl_test";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function allTestQuestions($test_name)
    {
        $sql = "SELECT * FROM tbl_question WHERE test_name='$test_name'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function allTestQuestionsId($id)
    {
        $sql = "SELECT * FROM tbl_question WHERE id=$id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function testQuestionUpdate($count,$test_name)
    {
        $this->db->where('test_name', $test_name);
        $this->db->set('no_of_ques', 'no_of_ques+'.$count, FALSE);
        $this->db->update('tbl_test'); 
    }

    public function testQstnsUpdate($data,$test_name)
    {
        $this->db->where('test_name', $test_name);
        $this->db->update('tbl_question',$data); 
    }

    public function testQstnsUpdatebyId($data,$test_id)
    {
        $this->db->where('id', $test_id);
        $this->db->update('tbl_question',$data); 
    }

    public function testQstnsDeletebyId($data,$test_id)
    {
        $this->db->where('id', $test_id);
        $this->db->Delete('tbl_question',$data); 
    }

    public function QstnCountUpdate($test_name)
    {
        $count = 1;
        $this->db->where('test_name', $test_name);
        $this->db->set('no_of_ques', 'no_of_ques-'.$count, FALSE);
        $this->db->update('tbl_test'); 
    }

    public function allTestName()
    {
        $sql = "SELECT test_name FROM tbl_test";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function deleteByName($test_name)
    {
        $sql = "DELETE FROM tbl_question WHERE test_name='$test_name'";
        $result = $this->db->query($sql);
        return $result; 
    }

    public function deleteQstnbyName($test_name)
    {
        $sql = "DELETE FROM tbl_test WHERE test_name='$test_name'";
        $result = $this->db->query($sql);
    }
    
    public function allUserMarks()
    {
        $sql = "SELECT * FROM tbl_marks";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function searchUserMarks($name)
    {
        $sql = "SELECT * FROM tbl_marks WHERE user_name='$name'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function userName()
    {
        $sql = "SELECT user_name FROM tbl_marks";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getalluser()
    {
        $sql = "SELECT * FROM tbl_marks";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function gettotal()
    {
        $sql = "SELECT * FROM tbl_user WHERE user_type='user'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getmauser($name)
    {
        $sql = "SELECT * FROM tbl_marks WHERE user_name='$name'";
        $result = $this->db->query($sql);
        return sizeof($result->result_array());
    }

    public function getmgexam($name)
    {
        $sql = "SELECT * FROM tbl_marks WHERE test_name='$name'";
        $result = $this->db->query($sql);
        return sizeof($result->result_array());
    }

}