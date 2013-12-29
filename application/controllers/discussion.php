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
    }

    /**
    * Show all threads
    */
    function index()
    {
        // TODO: write this function
    }

    /**
    * Show posts in thread
    *
    * @param string $id Thread Id
    */
    function thread($id)
    {
        // TODO: write this function
    }

    /**
    * Remove thread
    *
    * @param string $id Thread Id
    */
    function delete($id){

    }

    /**
    * Add new post
    */
    function post()
    {
        // TODO: write this function
    }

    /**
    * Remove existing post
    *
    * @param string $id Post id
    */
    function unpublish($id)
    {
        // TODO: write this function
    }

}
