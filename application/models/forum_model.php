<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Discussions related connection to database
*/
class Forum_model extends CI_Model
{
    /**
    * Add new thread
    *
    * @param string $title Thread title
    * @param string $prj_id Related project Id
    * @param string $date_time Optional timestamp. If '', current datetime is used
    */
    public function addThread($tilte, $prj_id, $date_time='')
    {
        // TODO: Write this function
    }

    /**
    * Remove thread
    *
    * @param string $thread_id Thread Id
    */
    public function deleteThread($thread_id)
    {
        // TODO: Write this function
    }

    /**
    * Insert new post
    *
    * @param string $thread_id Id of related thread
    * @param string $user_id Id of post author
    * @param string $text Post message
    */
    public function addPost($thread_id, $user_id, $text)
    {
        // TODO: write this function
    }

    /**
    * Remove post
    *
    * @param string $post_id Post Id
    */
    public function deletePost($post_id)
    {
        // TODO: write this function
    }

    /**
    * List all posts from one thread
    *
    * @param string $thread_id Id of related thread
    *
    */
    public function listPosts($thread_id)
    {
        // TODO: write this function
    }
}
