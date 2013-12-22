<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    public function insert_upload_data($comment, $path, $id)
    { 
        $query = $this->db->query("INSERT INTO `files`(`url`, `comment`, `date_time_upload`, `ID_user_fk`) VALUES ('$path', '$comment', NOW(), $id)");
        if($query)
        {
          return true; 
        }
    }
}
