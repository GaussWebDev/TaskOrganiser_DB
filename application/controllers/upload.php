<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Upload management
*/
class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model');
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $this->load->view('upload/upload_form', array('error' => ' ' ));
    }

    function do_upload()
    {
        /*Upload validation settings*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '3000';
    
        $this->load->library('upload', $config);

        /*If validation fail*/
        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload/upload_form', $error);
        }
        else
        {   

            $comment = $this->input->post('comment');

            $upload_data = $this->upload->data(); //array
            $id = $this->User_model->getUserID(); //array

            if($this->upload_model->insert_upload_data($comment, $upload_data['full_path'], $id['ID_user']))
            {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload/upload_success', $data);
            }
        }
    }
  
}
