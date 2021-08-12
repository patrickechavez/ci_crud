<?php

class Post extends CI_Controller
{

    public function index()
    {

        if(!$this->session->userdata('logged_in')) redirect('login');

        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {

        if(!$this->session->userdata('logged_in')) redirect('login');

        $this->load->view('templates/header');
        $this->load->view('posts/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {

        $valid = $this->post_model->create_post();

        if ($valid) {
            redirect('/');
        }
    }

    public function edit($slug)
    {

        if(!$this->session->userdata('logged_in')) redirect('login');

        $post = $this->post_model->get_posts($slug);

        if (!$post) {
            show_404();
        }

        $data['post'] = $post;
        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update()
    {

        $valid = $this->post_model->update_post();

        $valid ?  
            
        $data = array(
            'success' => true,
            'message' => 'Updated Successfully')
            :
        $data = array(
            'success' => false,
            'message' => 'Error encountered when updating the data'
        );

        echo json_encode($data);

    }

    public function destroy()
    {

        $valid = $this->post_model->delete_post();

        echo $valid;
        exit;
        
        $valid ?  
            
        $data = array(
            'success' => true,
            'message' => 'Deleted Successfully')
            :
        $data = array(
            'success' => false,
            'message' => 'Error encountered when deleting the data'
        );

        echo json_encode($data);
    }

}
