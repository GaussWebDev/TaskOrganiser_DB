<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Active user info
*
* Stores user information through session
*/
class User_model extends CI_Model
{
    /**
    * Internal variables
    */
    private $_language;
    private $_logged_in;
    private $_username;
    private $_firstname;
    private $_lastname;
    private $_address;
    private $_mobile;
    private $_email;
    private $_permission;
    private $_ID_user;
    private $_project;

    /**
    * Set defaults
    */
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // attempt to load from session
        $keys = array('_language', '_logged_in', '_username',
            '_firstname', '_lastname', '_address', '_mobile',
            '_email', '_permission', '_ID_user', '_project');
        foreach ($keys as $key) {
            $this->$key = $this->session->userdata($key);
        }

        // set default language
        if ($this->_language == false) {
            $this->_language = $this->config->item('language');
        }

    }

    /**
    * Current language
    *
    * @return string Language code
    */
    public function getLanguage() {
        return $this->_language;
    }

    /**
    * Is user logged in?
    *
    * @return bool True if user is logged in
    */
    public function isLoggedIn()
    {
        return $this->_logged_in;
    }

    /**
    * Update user info
    *
    * Settign user info on login
    *
    * @param array @info Array containing fields from database
    */
    public function set($info)
    {
        $info['logged_in'] = true;

        foreach ($info as $key => $value) {
            $_key = '_' . $key;
            // populate current properties and set session data
            $this->$_key = $value;
            $this->session->set_userdata($_key, $value);
        }
    }

    /**
    * Remove user info from session
    */
    public function clear()
    {
        $this->session->sess_destroy();
    }

    /**
    * Getter function
    */
    public function getID() { return $this->_ID_user; }
    public function getActiveProject() { return $this->_project; }
    public function getUsername() { return $this->_username; }
    public function getAddress() { return $this->_address; }
    public function getMobile() { return $this->_mobile; }
    public function getEmail() { return $this->_email; }
    public function getPermissions() { return $this->_permission; }
    public function getFirstName() { return $this->_firstname; }
    public function getLastName() { return $this->_lastname; }
    public function getFullName() {
        $full_name = $this->_firstname . ' ' . $this->_lastname;
        return $full_name;
    }
}
