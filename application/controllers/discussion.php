<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Enables forum-like discussion
*/
class Discussion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

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
        if ($this->Discussion_model->inProject($id, $this->User_model->getActiveProject()) != true) {
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
        // TODO: write this function
    }

}
