<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Account management
*/
class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->model('User_model');
        $this->lang->load('account', $this->User_model->getLanguage());
    }

    /**
    * Login page
    */
    public function index()
    {
        // View data
        $data = array();

        // form has been submitted
        if ($this->input->post() != false) {         
            // grab input
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // validate data
            if ($username == '' || $password == '') {
                $data['notify'] = lang('err_required');
            } else {
                // check credentials
                $user_data = $this->Account_model->login($username, $password);

                if ($user_data == false) {
                    // set error string
                    $data['notify'] = lang('err_user_pwd');
                } else {
                    // update User model
                    $this->User_model->set($user_data);
                }
            }
        }

        if ($this->User_model->isLoggedIn() == true) {
            // user logged in, redirect to index
            redirect(base_url());
        }

        $this->load->view('account/login', $data);
    }

    /**
    * Reset lost password
    */
    public function reset()
    {
        // View data
        $data = array();

        // post has been submitted
        if ($this->input->post() != false) {
            $email = $this->input->post('email');

            // validate data
            if ($email == '') {
                $data['notify'] = lang('err_required');
            } else {
                // attempt password change
                $pwd = $this->Account_model->reset($email);
                if ($pwd == false) {
                    // email not in database
                    $data['notify'] = lang('err_unknown_user');
                } else {
                    // success, send password to user
                    $this->load->library('email');
                    $msg = sprintf(lang('msg_pwd_reset'), $pwd);

                    $this->email->from('admin@team-tasks');
                    $this->email->to($email);
                    $this->email->subject(lang('msg_subject_pwd_reset'));
                    $this->email->message($msg);
                    $this->email->send();
                }
            }
        }

        if ($this->User_model->isLoggedIn() == true) {
            // user logged in, redirect to index
            redirect(base_url());
        }

        $this->load->view('account/reset_pwd', $data);
    }

    /**
    * Edit user profile
    */
    public function profile()
    {
        // TODO: Write this function
    }

    /**
    * Logout
    */
    public function logout()
    {
        $this->User_model->clear();
        redirect(site_url('/account'));
    }
}
