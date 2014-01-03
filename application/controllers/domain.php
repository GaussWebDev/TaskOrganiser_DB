<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Domain management
 */
class Domain extends CI_Controller
{
	/**
	 * Class Constructor
	 */
	function __construct()
    {
        parent::__construct();
		$this->lang->load('account', $this->User_model->getLanguage());
		
		// require user to be logged in
        if ($this->User_model->isLoggedIn() == false) {
            redirect(site_url('account'));
        }
    }
	

	
	/**
	 * Domain list of all Domains
	 */
    public function domains_list() 
    {
    	//get list of domains from database
    	//instance the class
        $this->load->model('Domain_model');
        $data['domains'] = $this->Domain_model->getDomain();
		
		if ($this->Domain_model->checkDomains() != NULL) {
			$data['dates'] = $this->Domain_model->checkDomains();	
		}
		
    	//load the view associated with this controller
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('admin/domains_list', $data);
        $this->load->view('footer');
    }


	
	/**
	 * Adding a new domain
	 */
	 public function domains_add()
	 {
	 	$data = array();
		
        if ($this->input->post() != false) {
            // validate input on required fields
            $config = array(
                array(
                    'field' => 'domain',
                    'label' => lang('lbl_domain'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'date_time_start',
                    'label' => lang('lbl_date_time_start'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'date_time_expires',
                    'label' => lang('lbl_date_time_expires'),
                    'rules' => 'trim|required'
				), array(
                    'field' => 'cost',
                    'label' => lang('lbl_cost'),
                    'rules' => 'trim|required')
            );	
			
			//Validate input fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

			//check if validation was successfull
            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from form                    
                $domain_data = array(
                    'date_time_start' => $this->input->post('date_time_start'),
                    'date_time_expires' => $this->input->post('date_time_expires'),
                    'cost' => $this->input->post('cost'),
                    'expired' => $this->input->post('expired'),
                    'domain' => $this->input->post('domain'),
                    'ID_user_fk' => $this->input->post('user')
				);
                
				//Instance the model in which we're using methods
				$this->load->model('Domain_model');
				
                // insert new domain
                if ($this->Domain_model->addDomain($domain_data) == false) {
                    // adding to database failed
                    $data['notify'] = lang('msg_new_domain_fail');
                } else {
                    // success
                    $data['notify'] = lang('msg_new_domain_success');
                }
            }
        }
	
		//get user list from database
        $this->load->model('Account_model');
        $data['users'] = $this->Account_model->getAll();
		// setting the currently selected user to NULL
		$data['domain'] = array('ID_user_fk' => NULL); 
		
		//Load the associated view
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('admin/domains_add', $data);
        $this->load->view('footer');
	 }



	/**
	 * Updating an existing domain
	 * 
	 * @param: integer $id ID of the domain to be updated
	 */
	 public function domains_edit($id) 
	 {
	 	$data = array();
		
		//Instance the model in which we're using methods
		$this->load->model('Domain_model');
		
        if ($this->input->post() != false) {
            // validate input on required fields
			$config = array(
                array(
                    'field' => 'domain',
                    'label' => lang('lbl_domain'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'date_time_start',
                    'label' => lang('lbl_date_time_start'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'date_time_expires',
                    'label' => lang('lbl_date_time_expires'),
                    'rules' => 'trim|required'
				), array(
                    'field' => 'cost',
                    'label' => lang('lbl_cost'),
                    'rules' => 'trim|required')
            );
			
            //Validate input fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from form                    
                $domain_data = array(
                    'date_time_start' => $this->input->post('date_time_start'),
                    'date_time_expires' => $this->input->post('date_time_expires'),
                    'cost' => $this->input->post('cost'),
                    'expired' => $this->input->post('expired'),
                    'domain' => $this->input->post('domain'),
                    'ID_user_fk' => $this->input->post('user')               
				);
				
				//set an appropriate message
                if ($this->Domain_model->updateDomain($id, $domain_data) == true) {
                    $data['notify'] = lang('msg_update_domain_success');
                } else {
                    $data['notify'] = lang('msg_update_domain_fail');
                }
            }			
        }

        //Get info of the domain
		$data['domain'] = $this->Domain_model->getInfo($id);
		//get user list from database
        $this->load->model('Account_model');
        $data['users'] = $this->Account_model->getAll();
       	//Load the associated view
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('admin/domains_add', $data);
        $this->load->view('footer');
	 }



	/**
	 * Deleting an existing domain
	 * 
	 * @param: integer $id ID of the domain to be deleted
	 */
	 public function domains_delete($id)
	 {
	 	//Instance the model in which we're using methods
		$this->load->model('Domain_model');
		
	 	if ($this->Domain_model->deleteDomain($id) == true) {
        	$data['notify'] = lang('msg_delete_domain_success');
        } else {
        	$data['notify'] = lang('msg_delete_domain_fail');
		}
		
		//populate the table and reload the view
	 	$data['domains'] = $this->Domain_model->getDomain();
		
    	//load the view associated with this controller
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('admin/domains_list', $data);
        $this->load->view('footer');
	 }
}
 