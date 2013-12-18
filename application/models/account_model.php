<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model
{
    /**
    * Login action
    *
    * @param string $username Username
    * @param string $password Password - unencrypted
    * @return mixed Array containing user data on success, otherwise false
    */
    public function login($username, $password)
    {
        $pwd = $this->crypt_pwd($username, $password);
        $arg = array(
            'username' => $username,
            'password' => $pwd,
            'active' => 1);
        $this->db->where($arg);
        $this->db->where('users.ID_role_fk', 'roles.ID_role', false);
        $this->db->select('username, firstname, lastname, address, mobile, email, permission');
        $query = $this->db->get('users, roles');

        return $query->row_array();
    }

    /**
    * Reset password
    *
    * @param string $email Email for identifing user
    * @return mixed Plain password on success, false otherwise
    */
    public function reset($email)
    {
        // TODO: Write this function
        return false;
    }

    /**
    * Encrypt password
    *
    * @param string $username Username ued for salt
    * @param string $password Unencrypted password
    * @return string Hashed password
    */
    private function crypt_pwd($username, $password)
    {
        $salt = str_repeat($username, (int)(22 / strlen($username)) + 1);
        $arg = array(
            'cost' => 11,
            'salt' => $salt);
        return password_hash($password, PASSWORD_BCRYPT, $arg);
    }
}
