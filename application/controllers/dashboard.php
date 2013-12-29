<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // require user to be logged in
        if ($this->User_model->isLoggedIn() == false) {
            redirect(site_url('account'));
        }
    }

    /**
    * Display dashboard
    */
    public function index()
    {
        $data['name'] = $this->User_model->getFullName();

        switch($this->User_model->getPermissions()) {
            case 100: //admin
                $this->load->view('dashboard/admin', $data);
                break;
            default:
                $this->load->view('dashboard/default', $data);
                break;
        }
    }

    /**
    * Set active project
    *
    * @param string $id Project ID
    */
    public function project($id)
    {
        // set user id
        $user_id = $this->User_model->getID();
        if ($this->User_model->getPermissions() == 100) {
            $user_id = '';
        }

        // assign to project
        if ($this->Project_model->isActive($id, $user_id) == true) {
            $this->User_model->set(array('project' => $id));
        }

        redirect(base_url());
    }
}
