<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Administration panel
*/
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // require admin permissions
        if ($this->User_model->isLoggedIn() == false ||
            $this->User_model->getPermissions() < 100) {
            redirect(base_url());
        }
    }

    /**
    * List all users
    */
    public function users_list()
    {
        $this->load->view('admin/list_users');
    }

    /**
    * Add new user to database
    */
    public function users_add() {
        // TODO: Write this function
    }

    /**
    * Edit user data
    *
    * @param string $id Users id in database
    */
    public function users_edit($id) {
        // TODO: Write this function
    }

    /**
    * List all projects
    */
    public function projects_list() {
        // TODO: Write this function
        // TODO: List only active??
    }

    /**
    * Add new project
    */
    public function procjects_add() {
        // TODO: Write this function
    }

    /**
    * Edit existing project
    *
    * @param string $id Projects id in database
    */
    public function projects_edit($id) {
        // TODO: Write this function
    }

    /**
    * List all domains from database
    */
    public function domains_list() {
        // TODO: Write this function
    }

    /**
    * Add new domain
    */
    public function domains_add() {
        // TODO: Write this function
    }

    /**
    * Edit existing domain
    *
    * @param string $id Domains id in database
    */
    public function domains_edit($id) {
        // TODO: Write this function
    }
}
