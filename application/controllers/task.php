<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Task management
 */
class Task extends CI_Controller
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
	 * Task list of all Tasks
	 */
    public function task_list()
    {
    	//get list of tasks from database
    	//instance the class
        $this->load->model('Task_model');
		$id_user = $this->User_model->getID();
		$data['name'] = $this->User_model->getID();
        $data['tasks'] = $this->Task_model->getTask(NULL, $this->User_model->getActiveProject());
		
    	//load the view associated with this controller
    	$this->load->view('task/task', $data);
    }


	
	/**
	 * Adding a new task
	 */
	 public function task_add()
	 {
	 	$data = array();
		
        if ($this->input->post() != false) {
            // validate input on required fields
            $config = array(
                array(
                    'field' => 'duration',
                    'label' => lang('lbl_duration'),
                    'rules' => 'trim|'
                ), array(
                    'field' => 'date_start',
                    'label' => lang('lbl_date_start'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'comment',
                    'label' => lang('lbl_comment'),
                    'rules' => 'trim')
            );	
			
			//Validate input fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

			//check if validation was successfull
            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from form                    
                $task_data = array(
                    'duration' => $this->input->post('duration'),
                    'date_start' => $this->input->post('date_start'),
                    'comment' => $this->input->post('comment'),
                    'billable' => $this->input->post('billable'),
                    //'ID_project_fk' => '1', //TODO: modify it to get the ID of the selected project from the DDL
                    'ID_project_fk' => $this->User_model->getActiveProject(),                    
                    'ID_user_fk' => $this->User_model->getID(),
				);
                
				//Instance the model in which we're using methods
				$this->load->model('Task_model');
				
                // insert new task
                if ($this->Task_model->addTask($task_data) == false) {
                    // adding to database failed
                    $data['notify'] = lang('msg_new_task_fail');
                } else {
                    // success
                    $data['notify'] = lang('msg_new_task_success');
                }
            }
        }

		//Load the associated view
	 	$this->load->view('task/add', $data);
	 }

	/**
	 * Updating an existing task
	 * 
	 * @param: integer $id ID of the task to be updated
	 */
	 public function task_edit($id)
	 {
	 	$data = array();
		
		//Instance the model in which we're using methods
		$this->load->model('Task_model');
		
        if ($this->input->post() != false) {
            // validate input on required fields
			$config = array(
                array(
                    'field' => 'duration',
                    'label' => lang('lbl_duration'),
                    'rules' => 'trim|'
                ), array(
                    'field' => 'date_start',
                    'label' => lang('lbl_date_start'),
                    'rules' => 'trim|required'
                ), array(
                    'field' => 'comment',
                    'label' => lang('lbl_comment'),
                    'rules' => 'trim')
            );
			
            //Validate input fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['notify'] = validation_errors();
            } else {
                // fetch data from form                    
                $task_data = array(
                    'duration' => $this->input->post('duration'),
                    'date_start' => $this->input->post('date_start'),
                    'comment' => $this->input->post('comment'),
                    'billable' => $this->input->post('billable'),                   
				);
				
                if ($this->Task_model->updateTask($id, $task_data) == true) {
                    $data['notify'] = lang('msg_update_task_success');
                } else {
                    $data['notify'] = lang('msg_update_task_fail');
                }
            }			
        }

        //Get info of the task
		$data['task'] = $this->Task_model->getInfo($id);
       	//Load the associated view
	 	$this->load->view('task/add', $data);
	 }



	/**
	 * Deleting an existing task
	 * 
	 * @param: integer $id ID of the task to be deleted
	 */
	 public function task_delete($id)
	 {
	 	//Instance the model in which we're using methods
		$this->load->model('Task_model');
		
	 	if ($this->Task_model->deleteTask($id) == true) {
        	$data['notify'] = lang('msg_delete_task_success');
        } else {
        	$data['notify'] = lang('msg_delete_task_fail');
		}
		
		//populate the table and reload the view
	 	$id_user = $this->User_model->getID();
		$data['name'] = $this->User_model->getID();
        $data['tasks'] = $this->Task_model->getTask(NULL, $this->User_model->getActiveProject());
		
    	//load the view associated with this controller
    	$this->load->view('task/task', $data);
	 }
}
 