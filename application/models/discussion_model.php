<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Discussions related connection to database
*/
class Discussion_model extends CI_Model
{
    /**
    * List all threads
    *
    * @param string $prj_id Related project Id
    * @return array Array containing all database records for requested project
    */
    public function listThreads($prj_id)
    {
        $this->db->where('ID_project_fk', $prj_id);
        $query = $this->db->get('threads');

        return $query->result_array();
    }
    /**
    * Add new thread
    *
    * @param string $title Thread title
    * @param string $prj_id Related project Id
    * @param string $date_time Optional timestamp. If '', current datetime is used
    * @return string Thread Id
    */
    public function addThread($title, $prj_id, $date_time='')
    {
        // prepare data
        $date = new DateTime($date_time);
        $info = array(
            'title' => $title,
            'date_time_start' => $date->format('Y-m-d H:i:s'),
            'ID_project_fk' => $prj_id);

        // add thread
        $this->db->insert('threads', $info);

        // grab record from database
        $this->db->where($info);
        $this->db->select('ID_thread');
        $query = $this->db->get('threads');

        // return id
        $result = $query->row_array();
        return $result['ID_thread'];
    }

    /**
    * Remove thread
    *
    * @param string $thread_id Thread Id
    */
    public function deleteThread($thread_id)
    {
        // remove posts
        $this->db->where('ID_thread_fk', $thread_id);
        $this->db->delete('posts');

        // delete thread
        $this->db->where('ID_thread', $thread_id);
        $this->db->delete('threads');
    }

    /**
    * Insert new post
    *
    * @param string $thread_id Id of related thread
    * @param string $user_id Id of post author
    * @param string $text Post message
    * @param string $date_time Optional timestamp. If '', current datetime is used
    */
    public function addPost($thread_id, $user_id, $text, $date_time='')
    {
        // prepare data
        $date = new DateTime($date_time);
        $info = array(
            'ID_thread_fk' => $thread_id,
            'ID_user_fk' => $user_id,
            'text' => $text,
            'date_time_post' => $date->format('Y-m-d H:i:s'));

        // add post
        $this->db->insert('posts', $info);
    }

    /**
    * Remove post
    *
    * @param string $post_id Post Id
    */
    public function deletePost($post_id)
    {
        $this->db->where('ID_post', $post_id);
        $this->db->delete('posts');
    }

    /**
    * List all posts from one thread
    *
    * @param string $thread_id Id of related thread
    *
    */
    public function listPosts($thread_id)
    {
        $this->db->select('ID_post, text, date_time_post, firstname, lastname, title');
        $this->db->where('posts.ID_thread_fk', 'threads.ID_thread', false);
        $this->db->where('posts.ID_user_fk', 'users.ID_user', false);
        $this->db->where('posts.ID_thread_fk', $thread_id);
        $query = $this->db->get('posts, users, threads');

        return $query->result_array();
    }

    /**
    * Check if thread is assigned to project
    *
    * @param string $thread_id Thread Id
    * @param string $prj_id Project Id
    * @return bool True if thread is assigned, otherwise false
    */
    public function inProject($thread_id, $prj_id)
    {
        $this->db->where(array(
            'ID_thread' => $thread_id,
            'ID_project_fk' => $prj_id));
        $query = $this->db->get('threads');

        if ($query->num_rows() != 1) {
            return false;
        }

        return true;
    }
}
