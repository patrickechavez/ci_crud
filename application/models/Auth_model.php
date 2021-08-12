<?php
class Auth_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function register()
    {
        $data = array(

            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );

        return $this->db->insert('users', $data);

    }

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $result = $this->db->get('users');

        if(password_verify($password, $result->row(0)->password)) return $result->row(0)->id;
        
        return false;
    }

   
}
