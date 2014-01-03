<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Todo management
 */
class Todo extends CI_Controller
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
	 * Todo list of all todo
	 */
    public function todo_list() 
    {
    	//get list of todos from database
    	//instance the class
        $this->load->model('Todo_model');
        $data['todos'] = $this->Todo_model->getTodo($this->User_model->getID());
		
    	//load the view associated with this controller
    	$this->load->view('header');
        $this->load->view('nav');
        $this->load->view('todo/todo', $data);
        $this->load->view('footer');
    	
    }


	
	/**
	 * Adding a new Todo
	 */
	 public function todo_add()
	 {
	 	$data = array();
		
        if ($this->input->post() != false) {
            // validate input on required fields
            $config = array(
                array(
                    'field' => 'comment',
                    'label' => lang('lbl_comment'),
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
                $todo_data = array(
                    'comment' => $this->input->post('comment'),
                    'ID_user_fk' => $this->User_model->getID()
				);
                
				//Instance the model in which we're using methods
				$this->load->model('Todo_model');
				
                // insert new domain
                if ($this->Todo_model->addTodo($todo_data) == false) {
                    // adding to database failed
                    $data['notify'] = lang('msg_new_todo_fail');
                } else {
                    // success
                    $data['notify'] = lang('msg_new_todo_success');
                }
            }
        } 
		
		//Load the associated view
		 $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('todo/add', $data);
        $this->load->view('footer');
	 	
	 }



	/**
	 * Deleting an existing todo
	 * 
	 * @param: integer $id ID of the todo to be deleted
	 */
	 public function todo_delete($id)
	 {
	 	//Instance the model in which we're using methods
		$this->load->model('Todo_model');
		
	 	if ($this->Todo_model->deleteTodo($id) == true) {
        	$data['notify'] = lang('msg_delete_todo_success');
        } else {
        	$data['notify'] = lang('msg_delete_todo_fail');
		}
		
		//populate the table and reload the view
	 	$data['todos'] = $this->Todo_model->getTodo($this->User_model->getID());
		
    	//load the view associated with this controller
    	$this->load->view('todo/todo', $data);
	 }
}
 