<?php

class Post_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();

    }

    public function get_posts($slug = false)
    {

        if ($slug === false) {

            $this->db->order_by('created_at', 'DESC');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

       
        $this->db->where('slug', $slug);
        $this->db->order_by('created_at', "DESC");
        $query = $this->db->get('posts');
        return $query->row_array();
    }

    public function create_post()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('title'),
            'body' => $this->input->post('body'),
        );

        return $this->db->insert('posts', $data);

    }

    public function delete_post()
    {

        $id = $this->input->post('id');


        $this->db->where('id', $id);
        return $this->db->delete('posts') ? $id : "wala";

    }

    public function update_post()
    {

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('title'),
            'body' => $this->input->post('body'),
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

}
