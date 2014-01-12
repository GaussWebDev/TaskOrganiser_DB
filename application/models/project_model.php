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
        $query = $this->db->get('projects');

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
        $project['date_time_start'] = date2sql($project['date_time_start']);

        // insert new data
        $this->db->set($project);
        $this->db->insert('projects');

        // retrieve id
        $this->db->select('ID_project');
        $this->db->where($project);
        $query = $this->db->get('projects');

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
        $query = $this->db->get('projects');

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
        $project['date_time_start'] = date2sql($project['date_time_start']);

        // insert new data
        $this->db->where('ID_project', $id);
        $this->db->update('projects', $project);

        // Update assignees
        $this->addAssignees($id, $assignees);
    }

    /**
    * Get projects to which users is assigned to
    *
    * @return array Project name and id
    */
    public function listUserProjects()
    {
        $this->db->select('title, ID_project');

        if ($this->User_model->getPermissions() == 100) {
            // get all active projects for admin
            $this->db->where('finished',0);
            $tables = 'projects';
        } else {
            // list all assigned projects
            $this->db->where('ID_user_fk', $this->User_model->getID());
            $this->db->where('finished',0);
            $this->db->where('project_assignees.ID_project_fk', 'projects.ID_project', false);
            $tables = 'projects, project_assignees';
        }

        $query = $this->db->get($tables);

        // empty array on empty result
        if ($query->num_rows() == 0) {
            return array();
        }

        return $query->result_array();
    }

    /**
    * Check if project project exists and is active.
    * Second parameters is optional, checks if user belongs to project
    *
    * @param string $id Project ID
    * @param string $user_id User ID (optional)
    * @param bool $finished Check required value of finished. Ignored if empty
    * @return bool True if active project exists
    */
    public function isActive($id, $user_id = '', $finished=0)
    {
        // query project
        $this->db->where('ID_project', $id);

        // finished column
        if ($finished != '') {
            $this->db->where('finished', $finished);
        }

        // get projects
        $query = $this->db->get('projects');

        // project exists??
        if ($query->num_rows() != 1) {
            return false;
        }

        if ($user_id != '') {
            // is user assigned to project?
            $project = $query->row_array();
            $this->db->where(array(
                'ID_project_fk' => $project['ID_project'],
                'ID_user_fk' => $user_id));
            $query = $this->db->get('project_assignees');

            // check result
            if ($query->num_rows() == 0) {
                return false;
            }
        }

        return true;
    }

    /**
    * Delete project from database.
    * Prior to deleting project, it cleans project_assignees table
    *
    * @param string $id Project ID
    */
    public function delete($id)
    {
        // clear assignees
        $this->addAssignees($id, array());

        // remove project
        $this->db->where('ID_project', $id);
        $this->db->delete('projects');
    }
}
