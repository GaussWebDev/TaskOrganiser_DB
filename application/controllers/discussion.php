<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Enables forum-like discussion
*/
class Discussion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->lang->load('account', $this->User_model->getLanguage());

        // require user to be logged in
        if ($this->User_model->isLoggedIn() == false) {
            redirect(site_url('account'));
        }

        // require active project to be selected
        if ($this->User_model->getActiveProject() == false) {
            redirect(site_url('dashboard'));
        }

        $this->load->model('Discussion_model');
    }

    /**
    * Show all threads
    */
    public function index()
    {
        $id = $this->User_model->getActiveProject();
        $data['threads'] = $this->Discussion_model->listThreads($id);

        $this->load->view('discussions/threads', $data);
    }

    /**
    * Show posts in thread
    *
    * @param string $id Thread Id
    */
    public function thread($id)
    {
        $active_id = $this->User_model->getActiveProject();
        if ($this->Discussion_model->inProject($id, $active_id) != true) {
            redirect(site_url('discussion'));
        }
        
        $data['posts'] = $this->Discussion_model->listPosts($id);

        $this->load->view('discussions/posts', $data);
    }

    /**
    * Remove thread
    *
    * @param string $id Thread Id
    */
    public function delete($id){
        $data = array();

         // Thread belongs to project and exists
        $active_id = $this->User_model->getActiveProject();
        if ($this->Discussion_model->inProject($id, $active_id) != true) {
            // no thread, display error
            $data['notify'] = lang('err_no_thread');

        } else if ($this->input->post() != false) {
            // request confirmation
            $confirm_code = $this->input->post('confirm');
            $confirm_nonce = $this->session->userdata('thread_confirm');
            $this->session->unset_userdata('thread_confirm');

            // validate nonce
            if ($confirm_nonce != $confirm_code) {
                // validation failed, redirect
                redirect(base_url());
            }

            // request OK, delete thread
            $this->Discussion_model->deleteThread($id);
            $data['notify'] = lang('msg_thread_delete_success');
        } else {
            // require user confirmation
            // random string as confirmation to prevent accidental delete
            $confirm = random_string('alnum', 10);
            $data['confirm'] = $confirm;
            $data['id'] = $id;
            $this->session->set_userdata('thread_confirm',$confirm);
        }

        $this->load->view('discussions/thread_delete.php', $data);
    }

    /**
    * Add new post
    */
    public function post()
    {
        // TODO: write this function
    }

    /**
    * Remove existing post
    *
    * @param string $id Post id
    */
    public function unpublish($id)
    {
        $data = array();

        if ($this->input->post() != false) {
            // request confirmation
            $confirm_code = $this->input->post('confirm');
            $confirm_nonce = $this->session->userdata('post_confirm');
            $this->session->unset_userdata('post_confirm');

            // validate nonce
            if ($confirm_nonce != $confirm_code) {
                // validation failed, redirect
                redirect(base_url());
            }

            // request OK, delete post
            $this->Discussion_model->deletePost($id);
            $data['notify'] = lang('msg_post_delete_success');
        } else {
            // require user confirmation
            // random string as confirmation to prevent accidental delete
            $confirm = random_string('alnum', 10);
            $data['confirm'] = $confirm;
            $data['id'] = $id;
            $this->session->set_userdata('post_confirm',$confirm);
        }

        $this->load->view('discussions/post_delete.php', $data);
    }

}
