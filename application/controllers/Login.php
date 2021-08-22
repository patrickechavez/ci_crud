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

        $this->form_validation->set_error_delimiters('', '');

        $config = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[3]',
                'errors' => [
                        'required' => 'Invalid Credentials',
                        'min_length' => 'Minimum Username length is 3 characters',
                ],
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                        'required' => 'You must provide a Password.',
                        'min_length' => 'Minimum Password length is 6 characters',
                ],
            ],
        ];


        //getting data from frontend
        $data = json_decode(file_get_contents('php://input'));

        $user_data = [
            'username' => $data->username,
            'password' => $data->password
        ];

        $this->form_validation->set_data($user_data);
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){

            $res = [
                'success' => false, 
                'message' => validation_errors()
                ];
        }else{

           $username = $user_data['username'];
           $password = $user_data['password'];

           $user_id = $this->auth_model->login($username, $password);

           if($user_id){

                $session_data = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                ];

                $this->session->set_userdata($session_data);
                    
                $res = [
                    'success' => true, 
                    'message' => 'Login Successfully'];

           }else{

                $res = [
                    'success' => false,
                    'message' => 'Invalid Credentials'
                ];
           }

            
        }
        echo json_encode($res);

        //echo json_encode($data->username);
        // if(!$this->input->is_ajax_request()) exit('No direct script access allowed');

        // $this->load->library('form_validation');

        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        // if($this->form_validation->run() == FALSE){

        //     $data = array(
        //         'success' => false, 
        //         'message' => validation_errors());


        // }else{

        //     $username = $this->input->post('username');
        //     $password = $this->input->post('password');


        //     $user_id = $this->auth_model->login($username, $password);


        //     if(!$user_id){

        //       //  $this->session->set_flashdata('login_failed', 'Invalid Credentials');
               
              
        //         $data = array(
        //             'success' => false,
        //             'message' => 'Invalid Credentials'
        //         );
        //     }else{

        //         $user_data = array(

        //             'user_id' => $user_id,
        //             'username' => $username,
        //             'logged_in' => true
        //         );

        //         $this->session->set_userdata($user_data);
               
                
        //         $data = array(
        //             'success' => true,
        //             'message' => 'Login Successfully'
        //         );


        //     }
        
             
        // }

        
        
        //echo json_encode($data['username']);

        
    }
}
