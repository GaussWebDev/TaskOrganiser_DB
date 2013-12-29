<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todo_model extends CI_Model
{
	/**
	 * Gets all the todo things based off user ID
	 * 
	 * @param: $id ID of the user currecntly logged in
	 * 
	 * @return: returns an array of results
	 */
	public function getTodo($id) {
		//get the todo tasks of that user on the current project
		$query = $this->db->query("SELECT *	FROM todo WHERE ID_user_fk ='{$id}'"); 
						
		return $query->result_array();
	}

	
	
	/**
	 * Adds a new todo
	 * 
	 * @param: array $data Array of the data to be sent to the DB
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function addTodo($data) { 	
        // perform insert
        $result = $this->db->insert('todo', $data);
        //var_dump($data);
		//$result = TRUE;
		
        return $result;
	 }

	 
	 
	 
	/**
	 * Deletes the selected todo
	 * 
	 * @param: integer $id_todo ID of the todo to be deleted
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function deleteTodo($id_todo) {
	 	 $this->db->where('ID_todo', $id_todo);
         $this->db->delete('todo');
         $query = $this->db->get('todo');
 
         return $query->row_array();
	 }
}