<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model
{
	/**
	 * Gets all the tasks, based of user ID and project ID
	 * 
	 * @param: integer $id_user currently logged in user, default is NULL
	 * @param: integer $id_project currently selected active project, default is NULL
	 * 
	 * @return: returns an array of results
	 */
	public function getTask($id_user = NULL, $id_project = NULL) {
		//array of arguments to be sent, based off the sent parameters
		if ($id_project != NULL && $id_user != NULL) {
			//get the tasks of that user on the current project
			$query = $this->db->query("SELECT t.*, u.username 
									FROM tasks t 
									LEFT JOIN users u ON u.ID_user = t.ID_user_fk
									WHERE ID_user_fk={$id_user} AND
									ID_project_fk={$id_project}"); 
						
		} elseif ($id_project == NULL && $id_user != NULL) {
			//get all the tasks the user ever worked on
			$query = $this->db->query("SELECT t.*, u.username 
									FROM tasks t 
									LEFT JOIN users u ON u.ID_user = t.ID_user_fk
									WHERE ID_user_fk={$id_user}");
		
		} elseif ($id_project != NULL && $id_user == NULL) {
			//get all the tasks for the selected project
			$query = $this->db->query("SELECT t.*, u.username 
									FROM tasks t 
									LEFT JOIN users u ON u.ID_user = t.ID_user_fk
									WHERE ID_project_fk={$id_project}");
																    
		} elseif ($id_project == NULL && $id_user == NULL) {
			//get all the tasks
			$query = $this->db->query("SELECT t.*, u.username 
									FROM tasks t 
									LEFT JOIN users u ON u.ID_user = t.ID_user_fk");		
		}     

		return $query->result_array();
	}

	
	
	/**
	 * adds a new tasks
	 * 
	 * @param: array $data Array of the data to be sent to the DB
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function addTask($data) {
	 	//preare data
	 	if ($data['billable'] == TRUE) {
	 		$data['billable'] = 1;
	 	} else {
	 		$data['billable'] = 0;
	 	}
	 	
        // perform insert
        $result = $this->db->insert('tasks', $data);
        // var_dump($data);
		// $result = TRUE;
		
        return $result;
	 }
	 
	 
	 
	/**
	 * Update an existing task
	 * 
	 * @param: integer $id ID of the task to be updated
	 * @param: array $data Array of the data to be sent to the DB
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function updateTask($id, $data) {
	 	//preare data
	 	if ($data['billable'] == TRUE) {
	 		$data['billable'] = 1;
	 	} else {
	 		$data['billable'] = 0;
	 	}
	 	
 		$this->db->where('ID_task', $id);
        $this->db->set($data);
        
        return $this->db->update('tasks');
	 }
	 
	 
	 
	/**
     * Retreive task info based off id
     *
     * @param string $id task id in database
	 * 
     * @return array Array containing task info
     */
     public function getInfo($id)
     {
         $this->db->where('ID_task', $id);
         $this->db->select('*');
         $query = $this->db->get('tasks');
 
         return $query->row_array();
     }
	 
	 
	 
	/**
	 * Deletes the selected class
	 * 
	 * @param: integer $id_task ID of the task to be deleted
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function deleteTask($id_task) {
	 	 $this->db->where('ID_task', $id_task);
         $this->db->delete('tasks');
         $query = $this->db->get('tasks');
 
         return $query->row_array();
	 }
}