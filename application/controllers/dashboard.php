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
    * Route to right dashboard
    */
    public function index()
    {
        switch($this->User_model->getPermissions()) {
            case 100: //admin
                $this->admin_dashboard();
                break;
            default:
                $this->default_dashboard();
                break;
        }
    }

    /**
    * Dashboard for admin user
    */
    private function admin_dashboard()
    {
        $data['name'] = $this->User_model->getFullName();

        $this->load->view('dashboard/admin', $data);
    }

    /**
    * Default dashboard
    */
    private function default_dashboard()
    {
        $data['name'] = $this->User_model->getFullName();

        $this->load->view('dashboard/default', $data);
    }
}
