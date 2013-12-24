<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Administration panel
*/
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->lang->load('account', $this->User_model->getLanguage());

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
        //get user list from database
        $this->load->model('Account_model');
        $data['users'] = $this->Account_model->getAll();

        $this->load->view('admin/users_list', $data);
    }

    /**
    * Add new user to database
    */
    public function users_add()
    {
        $data = array();

        // get user roles
        $this->load->model('Account_model');
        $data['roles'] = $this->Account_model->getRoles();
        
        if ($this->input->post() != false) {
            // validate input on required fields
            $config = array(
                array(
                    'field' => 'username',
                    'label' => lang('lbl_username'),
                    'rules' => 'trim|required|is_unique[users.username]'
                ), array(
                    'field' => 'firstname',
                    'label' => lang('lbl_firstname'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'email',
                    'label' => lang('lbl_email'),
                    'rules' => 'trim|required|valid_email')
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from from
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'address' => $this->input->post('address'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'ID_role_fk' => $this->input->post('role'),
                    'password' => random_string('alnum', 10));
                
                // insert new user
                if ($this->Account_model->add($user_data) == false) {
                    // adding to database failed
                    $data['notify'] = lang('msg_new_user_fail');
                } else {
                    // success, send email notification
                    $data['notify'] = lang('msg_new_user_success');
                    $msg = sprintf(lang('msg_new_account'),
                        base_url(),
                        $user_data['username'],
                        $user_data['password']);

                    $this->load->library('email');
                    $this->email->from('admin@team-tasks'); // FIXME: email from config?
                    $this->email->to($user_data['email']);
                    $this->email->subject(lang('msg_subject_new_account'));
                    $this->email->message($msg);
                    $this->email->send();
                }
            }
        }

        $this->load->view('admin/users_add', $data);
    }

    /**
    * Edit user data
    *
    * @param string $id Users id in database
    */
    public function users_edit($id)
    {
        $data = array();

        // fetch user info
        $this->load->model('Account_model');
        $data['roles'] = $this->Account_model->getRoles();

        if ($this->input->post() != false) {
            // validate input on required fields
            $config = array(
                array(
                    'field' => 'username',
                    'label' => lang('lbl_username'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'firstname',
                    'label' => lang('lbl_firstname'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'email',
                    'label' => lang('lbl_email'),
                    'rules' => 'trim|required|valid_email')
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from from
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'address' => $this->input->post('address'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'ID_role_fk' => $this->input->post('role'),
                    'active' => $this->input->post('active'));

                if ($this->Account_model->update($id, $user_data) == true) {
                    $data['notify'] = lang('msg_update_user_success');
                } else {
                    $data['notify'] = lang('msg_update_user_fail');
                }
            }
        }

        $data['user'] = $this->Account_model->getInfo($id);
        $this->load->view('admin/users_add', $data);
    }

    /**
    * List all projects
    */
    public function projects_list()
    {
        // TODO: List only active??
        $this->load->model('Project_model');
        $data['projects'] = $this->Project_model->getAll();

        $this->load->view('admin/projects_list', $data);
    }

    /**
    * Add new project
    */
    public function procjects_add()
    {
        // load account list
        $this->load->model('Account_model');
        $data['users'] = $this->Account_model->getAll();

        if ($this->input->post() != false) {
            // fetch project info
            $project = array(
                'title' => $this->input->post('title'),
                'finished' => $this->input->post('finished'),
                'date_time_start' => $this->input->post('started'));

            // validate input
            if ($project['title'] == '') {
                $data['notify'] = lang('err_empty_title');
            } else {
                $assignees = array();
                // fetch assigned clients
                $max_client = $this->input->post('max_client');
                for ($i=0; $i < $max_client; $i++) { 
                    $client = $this->input->post('client' . $i);
                    if ($client != false) $assignees[] = $client;
                }
                // fetch assigned developers
                $max_devel = $this->input->post('max_developer');
                for ($i=0; $i < $max_devel; $i++) { 
                    $developer = $this->input->post('developer'. $i);
                    if ($developer != false) $assignees[] = $developer;
                }

                $this->load->model('Project_model');
                if ($this->Project_model->add($project, $assignees) == true) {
                    $data['notify'] = lang('msg_project_add_success');
                } else {
                    $data['notify'] = lang('msg_project_add_fail');
                }
            }
        }

        $this->load->view('admin/projects_add', $data);
    }

    /**
    * Edit existing project
    *
    * @param string $id Projects id in database
    */
    public function projects_edit($id)
    {
        $this->load->model('Project_model');

        if ($this->input->post() != false) {
            // fetch project info
            $project = array(
                'title' => $this->input->post('title'),
                'finished' => $this->input->post('finished'),
                'date_time_start' => $this->input->post('started'));

            // validate input
            if ($project['title'] == '') {
                $data['notify'] = lang('err_empty_title');
            } else {
                $assignees = array();
                // fetch assigned clients
                $max_client = $this->input->post('max_client');
                for ($i=0; $i < $max_client; $i++) { 
                    $client = $this->input->post('client' . $i);
                    if ($client != false) $assignees[] = $client;
                }
                // fetch assigned developers
                $max_devel = $this->input->post('max_developer');
                for ($i=0; $i < $max_devel; $i++) { 
                    $developer = $this->input->post('developer'. $i);
                    if ($developer != false) $assignees[] = $developer;
                }

                $this->load->model('Project_model');
                $this->Project_model->update($id, $project, $assignees);
                $data['notify'] = lang('msg_project_update_success');
            }
        }
        
        // load account list
        $this->load->model('Account_model');
        $data['users'] = $this->Account_model->getAll();

        // grab project info
        $data['info'] = $this->Project_model->getInfo($id);
        $data['assignees'] = $this->Project_model->getAssignees($id);

        $this->load->view('admin/projects_add', $data);
    }

    /**
    * List all domains from database
    */
    public function domains_list()
    {
        // TODO: Write this function
    }

    /**
    * Add new domain
    */
    public function domains_add()
    {
        // TODO: Write this function
    }

    /**
    * Edit existing domain
    *
    * @param string $id Domains id in database
    */
    public function domains_edit($id)
    {
        // TODO: Write this function
    }
}
