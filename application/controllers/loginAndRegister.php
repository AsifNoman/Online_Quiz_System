<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAndRegister extends CI_Controller {


    public function __construct() 
    {
        parent::__construct();
        $this->load->model('adminModel', 'amodel');
        $this->load->model('loginRegisterModel', 'lrmodel');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $ldata['message'] = '';

        if(!$this->input->get_post('login'))
        {
            $this->load->view('login', $ldata);
            return ;
        }

        if($this->form_validation->run('login') == false)
        {
            $ldata['message'] = validation_errors();
            $this->load->view('login',$ldata);
            return;
        }

        if ($this->form_validation->run() == TRUE) 
        {
            $username = $this->input->get_post('username');
            $password = md5($this->input->get_post('password'));

            $data = array('user_name' => $username, 'user_password' => $password);
            $user = $this->lrmodel->userInfo($data);

            if (isset($user['user_email_id'])) 
            {
                $sdata['user_logged'] = TRUE;
                $sdata['usernames'] = $user['user_name'];
                $sdata['userids'] = $user['user_id'];

                if($user['user_type'] == "admin")
                {
                    $this->session->set_userdata($sdata);
                    redirect("http://localhost/MidAtp/admin", "refresh");

                }
                else
                {
                    $this->session->set_userdata($sdata);
                    redirect("http://localhost/MidAtp/userController/index/".$user['user_id'], "refresh");
                }
            } 

            else
            {
                $ldata['message'] = "Invalid Username Or Password";
                $this->load->view('login',$ldata);
                return;
            }
        }
    }

    public function register()
    {

       $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]');
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
       $this->form_validation->set_rules('password', 'Confirm Password', 'trim|required|matches[password]');

        $ldata['message'] = '';

        if(!$this->input->get_post('register'))
        {
            $this->load->view('register', $ldata);
            return ;
        }

        if($this->form_validation->run('register') == false)
        {
            $ldata['message'] = validation_errors();
            $this->load->view('register',$ldata);
            return;
        }

            if ($this->form_validation->run() == TRUE) {

                $username = $this->input->get_post('username');
                $data = array('user_name' => $username);
                $user = $this->lrmodel->userInfo($data);
             

                if($user['user_name'] == $this->input->get_post('username'))
                {
                    $ldata['message'] = "Username already exists, try different Username";
                    $this->load->view('register',$ldata);    
                }
                else
                {
                    $data = array(
                        'user_name' => $this->input->get_post('username'),
                        'user_email_id' => $this->input->get_post('email'),
                        'user_password' => md5($this->input->get_post('password')),
                        'user_gender' => $this->input->get_post('gender'),
                        'user_type' => 'user'
                    );

                    $this->lrmodel->insertUser($data);

                    $ldata['message'] = "Your account has been registered successfully. You can login here";
                    redirect("http://localhost/MidAtp/", "refresh");
                }
          }
    }

}
