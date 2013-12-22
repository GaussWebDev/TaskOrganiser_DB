<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model
{
	/**
    * Get all projects from database
    *
    * @return array Array containing projects data
    */
    public function getAll()
    {
        $this->db->select('ID_project, title, finished, date_time_start');
        $query = $this->db->get('project');

        return $query->result_array();
    }
}