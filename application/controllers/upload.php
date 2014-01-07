<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// quick fix (FIXME more)
        $data = array();
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
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('upload/upload_form', array('error' => ' ' ));
        $this->load->view('footer');
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

            $this->load->view('header', $data);
            $this->load->view('nav', $data);
            $this->load->view('upload/upload_form', $error);
            $this->load->view('footer', $data);    
        }
        else
        {   

            $comment = $this->input->post('comment');

            $upload_data = $this->upload->data(); //array
            $id = $this->User_model->getID(); 
            $project_id = $this->User_model->getActiveProject();
            if($this->upload_model->insert_upload_data($comment, $upload_data['full_path'], $id, $project_id))
            {
                $data = array('upload_data' => $this->upload->data());
                $project_id = $this->session->userdata('project_id');              
                $this->upload_list($project_id);
            }
        }
    }

    function upload_list($project_id)
    {
        $data['permission'] = $this->User_model->getPermissions();
        $id = $this->User_model->getID(); 
        $project_id = $this->User_model->getActiveProject();
        $data['upload_data'] = $this->upload_model->list_by_project_id($project_id, $id);

        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('upload/upload_list', $data);
        $this->load->view('footer', $data);   
    }

    function download_item($name)
    {
        $fullpath = base_url("uploads/{$name}");
        $data = file_get_contents($fullpath); // Read the file's contents
        force_download($name, $data);
        redirect('upload/upload_list');
    }
    
    function delete_item($id_file)
    {
        $url = $this->upload_model->get_url_by_id($id_file);
        if($this->upload_model->delete_file($id_file) === true)
        {
            if(unlink($url->url) === true)
            {
                $project_id = $this->User_model->getActiveProject();
                redirect("upload/upload_list/{$project_id}");
            }
        }   
    }  
}
