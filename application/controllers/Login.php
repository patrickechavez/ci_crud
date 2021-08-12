<?php
class Login extends CI_Controller
{

    public function index()
    {

        if($this->session->userdata('logged_in')) redirect('posts');

        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function store()
    {

        if(!$this->input->is_ajax_request()) exit('No direct script access allowed');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE){

            $data = array(
                'status' => false, 
                'message' => validation_errors());


        }else{

            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $user_id = $this->auth_model->login($username, $password);


            if(!$user_id){

              //  $this->session->set_flashdata('login_failed', 'Invalid Credentials');
               
              
                $data = array(
                    'status' => false,
                    'message' => 'Invalid Credentials'
                );
            }else{

                $user_data = array(

                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
               
                
                $data = array(
                    'status' => true,
                    'message' => 'Login Successfully'
                );


            }
        
             
        }

        echo json_encode($data);
    }
}
