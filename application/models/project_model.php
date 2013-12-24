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

    /**
    * Add new project
    *
    * @param array $project Project basic info
    * @param array $users Users assigned to project
    * @return bool True on success, otherwise false
    */
    public function add($project, $assignees)
    {
        // reformat date
        $date = new DateTime($project['date_time_start']);
        $project['date_time_start'] = $date->format('Y-m-d');

        // insert new data
        $this->db->set($project);
        $this->db->insert('project');

        // retrieve id
        $this->db->select('ID_project');
        $this->db->where($project);
        $query = $this->db->get('project');

        if ($query->num_rows() != 1) {
            return false;
        }

        // update assignees
        $prj_id = $query->row_array();
        $this->addAssignees($prj_id['ID_project'], $assignees);

        return true;
    }

    /**
    * Associate users with project
    *
    * @param string $project_id Project ID
    * @param array $assignees ID of users to be associate
    */
    private function addAssignees($project_id, $assignees)
    {
        // clear previous connections
        $this->db->where('ID_project_fk', $project_id);
        $this->db->delete('project_assignees');

        // insert new connections
        $this->db->trans_start();
        foreach ($assignees as $user) {
            $this->db->set('ID_project_fk', $project_id);
            $this->db->set('ID_user_fk', $user);
            $this->db->insert('project_assignees');
        }
        $this->db->trans_complete();
    }

    /**
    * Return project info
    *
    * @param string $id Project ID
    * @return array Project data
    */
    public function getInfo($id)
    {
        // get info
        $this->db->where('ID_project', $id);
        $query = $this->db->get('project');

        // check output
        if ($query->num_rows() != 1) {
            return false;
        }

        //return data
        return $query->row_array();
    }

    /**
    * Return project assignees info
    *
    * @param string $id Project ID
    * @return array Assignees info
    */
    public function getAssignees($id)
    {
        // grab results
        $this->db->where('ID_project_fk', $id);
        $this->db->select('ID_user_fk');
        $query = $this->db->get('project_assignees');

        // empty array on empty result
        if ($query->num_rows() == 0) {
            return array();
        }

        // reformat output
        $ids = $query->result_array();
        $result = array();
        foreach ($ids as $id) $result[] = $id['ID_user_fk'];
        
        return $result;
    }

    /**
    * Update existing project
    *
    * @param string $id Project ID
    * @param array $project Project basic info
    * @param array $users Users assigned to project
    */
    public function update($id, $project, $assignees)
    {
        // reformat date
        $date = new DateTime($project['date_time_start']);
        $project['date_time_start'] = $date->format('Y-m-d');

        // insert new data
        $this->db->where('ID_project', $id);
        $this->db->update('project', $project);

        // Update assignees
        $this->addAssignees($id, $assignees);
    }
}
