<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    public function insert_upload_data($comment, $path, $id, $project_id)
    { 
        $query = $this->db->query("INSERT INTO `files`(`url`, `comment`, `date_time_upload`, `ID_user_fk`, `ID_project_fk`) VALUES ('$path', '$comment', NOW(), $id, $project_id)");
       	return($query === true ? true : false);    
    }

    public function list_by_project_id($project_id, $id)
    {
    	$query = $this->db->query("SELECT files.ID_file,files.url, files.comment, files.date_time_upload, users.firstname, users.lastname FROM files JOIN users ON files.ID_user_fk = users.ID_user WHERE ID_user_fk = $id AND ID_project_fk = $project_id");
   		return $query->result_array(); 
    }

    public function delete_file($id_file)
    {
        $query = $this->db->query("DELETE FROM files WHERE ID_file = $id_file");
        return($query === true ? true : false);
    }

    public function get_url_by_id($id_file)
    {
        $query = $this->db->query("SELECT url FROM files WHERE ID_file = $id_file");
        return $query->row();
    }
}
