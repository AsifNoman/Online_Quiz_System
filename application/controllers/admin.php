<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


    public function __construct() 
    {
        parent::__construct();
        $this->load->model('adminModel', 'amodel');
        $user_names=$this->session->userdata('usernames');
        
        if($user_names == NULL)
        {
            redirect('http://localhost/MidAtp/','refresh');
        }
    }

    public function index()
    {
        $countname=0;
        $countexam=0;
        $mstactiveuser='';
        $mstgivenexam='';
        
        $user= $this->amodel->getalluser();
        $totaluser=sizeof($this->amodel->gettotal());

        foreach ($user as $name) 
        {
            if($this->amodel->getmauser($name["user_name"])>$countname)
            {
                $countname=$this->amodel->getmauser($name["user_name"]);
                $mstactiveuser=$name["user_name"];
            }

           if($this->amodel->getmgexam($name["test_name"])>$countexam)
           {
                $countexam=$this->amodel->getmauser($name["test_name"]);
                $mstgivenexam=$name["test_name"];
            }
            
        }

        $arr= array('mau' => $mstactiveuser,'mge'=>$mstgivenexam ,'total'=>$totaluser);
        $this->load->view('admin/dashboard',$arr);
    }

    public function addTestView()
    {
        $data['all_test'] = $this->amodel->allTestInfo();
        $this->load->view('admin/add_question', $data);
    }

    public function addMoreQuestionView()
    {
        $data['all_test'] = $this->amodel->allTestInfo();
        $this->load->view('admin/add_more_question', $data);
    }

    public function edit_questionInfoView()
    {
        $data['all_test'] = $this->amodel->allTestInfo();
        $this->load->view('admin/edit_questionInfo', $data);
    }

    public function edit_testQuestionsView()
    {
        $data['all_test'] = $this->amodel->allTestInfo();
        $this->load->view('admin/edit_testQuestions', $data);
    }

    public function logOut()
    {
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('usernames');
        $this->session->unset_userdata('userids');
        redirect('http://localhost/MidAtp/');
    }

    public function viewResult()
    {
        $data['all_marks'] = $this->amodel->allUserMarks();
        $this->load->library('parser');
        $this->parser->parse('admin/view_marks', $data);
    }

    public function searchResult()
    {
        $all = "";
        $name = $this->input->post('users_name');
        $data['all_mark'] = $this->amodel->searchUserMarks($name);
        $data['all_marks'] = $this->amodel->allUserMarks();
        $userName = $this->amodel->userName();

        foreach ($userName as $users) {
            $all .=$users['user_name'];
        }

        if($this->input->post('submit_form'))
        {
            if(strpos($all, $name) !== false)
            {
                $this->load->view('admin/view_marks', $data);
            }
            else
            {
                $data['message'] = 'No Data Found';
                $this->load->view('admin/view_marks', $data);
            }
        }
        else
        {
            redirect('http://localhost/MidAtp/admin/viewResult', 'refresh');
        }
    }

    public function addQuestion()
    {
        $data = array();
        $count = 0;  
        $all = "";
        $allTestNames = $this->amodel->allTestName();
        $data['test_name']=$this->input->post('test_name');
        $data['category']=$this->input->post('category');
        $data['time']=$this->input->post('minutes');
        $data['details']=$this->input->post('details');
        $name = $this->input->post('test_name');


        if($this->input->post('submit_form'))
        {
            foreach ($allTestNames as $names) {
                $all .= $names['test_name'];
            }

            if(strpos($all, $name) !== false)
            {
                $sdata['error'] = 'Test Name Already Exists';
                $this->load->view('admin/add_question', $sdata);
            }
            else
            {
                $this->uploadFile($name,$data);
            }
        }

        else
        {
            redirect('http://localhost/MidAtp/admin/addTestView', 'refresh');
        }
    }

    public function uploadFile($testname,$idata)
    {
        $count = 0;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv|xml';
        $config['max_size'] = '10000';

        $this->load->library('csvimport');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) 
        {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('admin/add_question', $data);
        } 
        else
        {
            $this->amodel->insertQuestion($idata);
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];

            if ($this->csvimport->get_array($file_path))
            {
                $csv_array = $this->csvimport->get_array($file_path);
                $testName = $testname;

                foreach ($csv_array as $row) 
                {
                    $count++;

                    $insert_data = array(
                       'test_name'=>$testName,
                       'question'=>$row['question'],
                       'option1'=>$row['option1'],
                       'option2'=>$row['option2'],
                       'option3'=>$row['option3'],
                       'option4'=>$row['option4'],
                       'answer'=>$row['answer']
                    );

                    $this->amodel->testQuestions($insert_data);
                }

                $extraQuestion['no_of_ques']=$count;

                $this->amodel->testUpdate($extraQuestion,$testName);

                $data['success'] = 'Question added successfully';

                $this->load->view('admin/add_question', $data);
            }

            else
            {
                $data['error'] = 'Question Not added';

                $this->load->view('admin/add_question', $data);
            }
        }    
    }

    public function addMoreQuestion()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv|xml';
        $config['max_size'] = '10000';
        $count = 0;  

        $this->load->library('csvimport');

        $this->load->library('upload', $config);

      if($this->input->post('submit_form'))
      {
        if (!$this->upload->do_upload()) 
        {
            $data['error'] = $this->upload->display_errors();

            $data['all_test'] = $this->amodel->allTestInfo();

            $this->load->view('admin/add_more_question', $data);
        } 
        else
        {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];

            if ($this->csvimport->get_array($file_path))
            {
                $csv_array = $this->csvimport->get_array($file_path);
                $testName = $this->input->post('category');

                foreach ($csv_array as $row) 
                {
                    $count++;

                    $insert_data = array(
                       'test_name'=>$testName,
                       'question'=>$row['question'],
                       'option1'=>$row['option1'],
                       'option2'=>$row['option2'],
                       'option3'=>$row['option3'],
                       'option4'=>$row['option4'],
                       'answer'=>$row['answer']
                    );

                    $this->amodel->testQuestions($insert_data);
                }

                $this->amodel->testQuestionUpdate($count,$testName);

                $data['success'] = 'Question added successfully';

                $data['all_test'] = $this->amodel->allTestInfo();

                $this->load->view('admin/add_more_question', $data);
            }
            else
            {
                $data['error'] = 'Question Not added';

                $data['all_test'] = $this->amodel->allTestInfo();

                $this->load->view('admin/add_more_question', $data);
            }
        }
      }

      else
      {
         redirect('http://localhost/MidAtp/admin/addMoreQuestionView', 'refresh');
      }

    }

    public function editTestInfo()
    { 
        $test_name=$this->input->post('categoryTest');
        $data['all_test'] = $this->amodel->allTestInfo();

        if($this->input->post('submit_form'))
        {
            if($this->input->post('category') == "Same")
            {
                if( strlen($this->input->post('details')) == 0 )
                {
                    if(!is_numeric($this->input->post('minutes')))
                    {
                        $data['error'] = 'No Info Updated';
                        $this->load->view('admin/edit_questionInfo', $data);
                    }
                    else
                    {
                        $cdata['time']=$this->input->post('minutes');
                        $this->amodel->testInfoUpdate($cdata,$test_name);
                        $data['success'] = 'Question Info Updated successfully';
                        $this->load->view('admin/edit_questionInfo', $data);
                    }
                }

                else if(!is_numeric($this->input->post('minutes')))
                {
                    $adata['details']=$this->input->post('details');
                    $this->amodel->testInfoUpdate($adata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }

                else
                {
                    $sdata['time']=$this->input->post('minutes');
                    $sdata['details']=$this->input->post('details');
                    $this->amodel->testInfoUpdate($sdata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }
            }

            else if(strlen($this->input->post('details')) == 0)
            {
                if( $this->input->post('category') == "Same")
                {
                    $cdata['time']=$this->input->post('minutes');
                    $this->amodel->testInfoUpdate($cdata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }

                else if(!is_numeric($this->input->post('minutes')))
                {
                    $adata['category']=$this->input->post('category');
                    $this->amodel->testInfoUpdate($adata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }

                else
                {
                    $sdata['time']=$this->input->post('minutes');
                    $sdata['category']=$this->input->post('category');
                    $this->amodel->testInfoUpdate($sdata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }
            }

            else if(!is_numeric($this->input->post('minutes')))
            {
                if( $this->input->post('category') == "Same")
                {
                    $cdata['details']=$this->input->post('details');
                    $this->amodel->testInfoUpdate($cdata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }

                else if(strlen($this->input->post('details')) == 0)
                {
                    $adata['category']=$this->input->post('category');
                    $this->amodel->testInfoUpdate($adata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }

                else
                {
                    $sdata['details']=$this->input->post('details');
                    $sdata['category']=$this->input->post('category');
                    $this->amodel->testInfoUpdate($sdata,$test_name);
                    $data['success'] = 'Question Info Updated successfully';
                    $this->load->view('admin/edit_questionInfo', $data);
                }
            }

            else
            {
                $data['error'] = 'No Info Updated';
                $this->load->view('admin/edit_questionInfo', $data);
            }

        }
        else
        {
            redirect('http://localhost/MidAtp/admin/edit_questionInfoView', 'refresh');
        }
    }

    public function testqstnShow()
    {
        $test_name = $this->input->post('categoryTest');

        $data['all_test'] = $this->amodel->allTestInfo();

        $data['testQstns'] = $this->amodel->allTestQuestions($test_name);

        if($this->input->post('search_form'))
        {
             $this->load->view('admin/edit_testQuestions', $data);
        }
        else if($this->input->post('delete_form'))
        {
            $result = $this->amodel->deleteByName($test_name);

            if ($result) 
            {
                $this->amodel->deleteQstnbyName($test_name);
                $data['success'] = 'Test deleated successfully';
                $this->load->view('admin/edit_testQuestions', $data);
                redirect('http://localhost/MidAtp/admin/edit_testQuestionsView', 'refresh');
            }
            else
            {
                $data['error'] = 'Test is not deleated';
                $this->load->view('admin/edit_testQuestions', $data);
            }
        }
        else
        {
            redirect('http://localhost/MidAtp/admin/edit_testQuestionsView', 'refresh');
        }
    }

    public function editDeleteQstns() //edit_testQuestionsView() 
    {
        $data['all_test'] = $this->amodel->allTestInfo(); 
        $test_id = $this->input->post('qstnId_name');
        $test_name = $this->input->post('test_name');
        $testData =  $this->amodel->allTestQuestionsId($test_id);

        foreach ($testData as $qstnData) {

        $qdata['question'] = $this->input->post('question_name'.$qstnData['id']);
        $qdata['option1'] = $this->input->post('option1_name'.$qstnData['id']);
        $qdata['option2'] = $this->input->post('option2_name'.$qstnData['id']);
        $qdata['option3'] = $this->input->post('option3_name'.$qstnData['id']); 
        $qdata['option4'] = $this->input->post('option4_name'.$qstnData['id']);
        $qdata['answer'] = $this->input->post('answer_name'.$qstnData['id']);

        if($this->input->post('edit_form'.$qstnData['id']))
        {
            $this->amodel->testQstnsUpdatebyId($qdata,$qstnData['id']);
            $data['success'] = 'Test Question Updated successfully';
            $this->load->view('admin/edit_testQuestions', $data);
            break;
        }
        else if($this->input->post('delete_form'.$qstnData['id']))
        {
            $this->amodel->testQstnsDeletebyId($qdata,$qstnData['id']);
            $this->amodel->QstnCountUpdate($test_name);
            $data['success'] = 'Test Question Deleted successfully';
            $this->load->view('admin/edit_testQuestions', $data);
            break;
        }
      }

      redirect('http://localhost/MidAtp/admin/edit_testQuestionsView', 'refresh');
    }
}
