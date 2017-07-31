<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserController extends CI_Controller {
	

    public function __construct() 
    {
        parent::__construct();
        $user_names=$this->session->userdata('usernames');
        
        if($user_names == NULL)
        {
            redirect('http://localhost/MidAtp/','refresh');
        }
    }

	public function index($id=0)
	{
		if( $id == 0 || $id!=$this->session->userdata('userids') )
		{
			echo "No Data Found";
			return;
		}

		$this->load->model('usermodel');
		$name = $this->usermodel->getById($id);
		$data = array('udata' => $this->usermodel->getById($id),'no'=>sizeof($this->usermodel->getexamnum($name['user_name'])));
		$this->load->view('user/user_dashboard',$data);
	}


	public function logOut()
    {
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('usernames');
        $this->session->unset_userdata('userids');
        redirect('http://localhost/MidAtp/');
    }
    
	public function examHistory($name=null)
	{
		if( $name == null || $name!=$this->session->userdata('usernames') )
		{
			echo "No Data Found";
			return;
		}

		$this->load->model('usermodel');
		$data['history'] = $this->usermodel->getHistoryByName($name);
		$data['all'] = $this->usermodel->getAll($name);
		$this->load->view('user/examHistory',$data);
	}

	public function viewExams($name=null)
	{
		if( $name == null || $name!=$this->session->userdata('usernames') )
		{
			echo "No Data Found";
			return;
		}

		if(!$this->input->get_post("srcbutton")){
			$this->load->model('usermodel');
			$data['examlist'] = $this->usermodel->getallexam();
			$data['all'] = $this->usermodel->getAll($name);
			$this->load->view('user/view_runningtest',$data);
			return;
		}
		$this->load->model('usermodel');
		$data['examlist'] = $this->usermodel->getsrcexam($this->input->get_post("search"));
		$data['all'] = $this->usermodel->getAll($name);
		$this->load->view('user/view_runningtest',$data);
	}

	 public function questions($id=0,$name=null)
     {
        if( $id == 0 || $id!=$this->session->userdata('userids') || $name == null )
        {
            echo "No Data Found";
            return;
        }

        $data = array();
        $sdata = array();
        $this->load->model('usermodel');
        $data['users'] = $this->usermodel->getById($id);
        $data['all'] = $this->usermodel->select_question_details_by_test_name($name);
        $data['all_test'] = $this->usermodel->select_test_details_by_test_name($name);

        $this->load->view('user/questions', $data);
     }

     public function result($name=null,$id=0)
     {
        
        if( $id == 0 || $id!=$this->session->userdata('userids') || $name == null )
        {
            echo "No Data Found";
            return;
        }
        
            $this->load->model('usermodel');

            $mark = 0;
            date_default_timezone_set("Asia/Dhaka");
            $sdata['date'] = date("d/m/Y");
            $sdata['time'] = date("h:i:sa");
            $sdata['intTime'] = date("his");
            $sdata['test_name'] = $name;
            $data = $this->usermodel->getById($id);
            $sdata['user_name'] = $data['user_name'];

            $datas = $this->usermodel->select_question_details_by_test_name($this->input->post('testName'));

            foreach($datas as $test)
            {  

                if( $this->input->post('form_option'.$test['id'])== $test['answer'] )
                {
                      $mark = $mark + 1;
                }
                
                else 
                {
                      $mark = $mark + 0;
                } 
            }   
             
            $sdata['mark']=$mark;
            $this->usermodel->insert_mark($sdata);
            $this->load->view('user/result', $sdata);
    }
}