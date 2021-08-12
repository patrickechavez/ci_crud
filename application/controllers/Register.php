<?php
class Register extends CI_Controller
{

    public function index()
    {

        if($this->session->userdata('logged_in')) redirect('posts');

        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    }

    public function store()
    {
       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == false) {

            $data = array(
                'status' => false,
                'message' => validation_errors(),

            );
        }else{
            

            if ($this->auth_model->register()) {

                $data = array(
                    'status' => true,
                    'message' => 'Adding User Successfully',

                );
            }else{

                $data = array(
                    'status' => false,
                    'message' => 'Adding User Failed',

                );

            }

            
        }
        echo json_encode($data);

    }

}
