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

        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('discussions/threads', $data);
        $this->load->view('footer', $data);
        
    }

    /**
    * Add new thread
    */
    public function add()
    {
        // set default output url
        $redirect_url = site_url('discussion');

        // handle user input
        if ($this->input->post() != false) {
            $title = $this->input->post('title');
            if ($title != false) {
                // add project
                $prj_id = $this->User_model->getActiveProject();
                $new_thread = $this->Discussion_model->addThread($title, $prj_id);

                // redirect to new thread
                $redirect_url = site_url('discussion/thread') . '/' . $new_thread;
            }
        }

        // redirect
        redirect($redirect_url);
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
        $data['thread'] = $id;

        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('discussions/posts', $data);
        $this->load->view('footer', $data);
        
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

        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('discussions/thread_delete.php', $data);
        $this->load->view('footer', $data);    
    }

    /**
    * Add new post
    */
    public function post()
    {
        // set default output url
        $redirect_url = site_url('discussion');

        // handle user input
        if ($this->input->post() != false) {
            $msg = $this->input->post('message');
            $thread_id = $this->input->post('thread');

            if ($thread_id != false) {
                // redirect to thread
                $redirect_url = site_url('discussion/thread') . '/' . $thread_id;

                if ($msg != false && $thread_id != false) {
                    // add post
                    $user_id =$this->User_model->getId();
                    $this->Discussion_model->addPost($thread_id, $user_id, $msg);
                }
            }
        }

        // redirect
        redirect($redirect_url);
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

        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('discussions/post_delete.php', $data);
        $this->load->view('footer', $data);    
    }

}
