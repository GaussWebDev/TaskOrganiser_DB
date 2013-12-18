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
        $this->db->select('ID_user, username');
        $query = $this->db->get_where('users', array('email' => $email));

        // unknown email address
        if ($query->num_rows() != 1) {
            return false;
        }

        // generate new password
        $pwd = random_string('alnum', 10);

        // hash it
        $user = $query->row_array();
        $pwd_hash = $this->crypt_pwd($user['username'], $pwd);

        // store in database
        $this->db->where('ID_user', $user['ID_user']);
        $this->db->set('password', $pwd_hash);
        $this->db->update('users');
        
        return $pwd;
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
