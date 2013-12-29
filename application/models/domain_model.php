<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Domain_model extends CI_Model
{
	/**
	 * Gets all the domains
	 * 
	 * @return: returns an array of results
	 */
	public function getDomain() {
		//get the domains 
		$query = $this->db->query("SELECT d.*, CONCAT (u.username, ' ', u.firstname, ' ', u.lastname) AS username
									FROM domains d 
									LEFT JOIN users u ON u.ID_user = d.ID_user_fk"); 
						
		return $query->result_array();
	}

	
	
	/**
	 * Checks the expiration date on all of the domains 
	 */
	 public function checkDomains() {
	 	//get the domains 
		$query = $this->db->query("SELECT domain
									FROM domains
									WHERE DATEDIFF(date_time_expires, CURDATE()) < 7 AND
									DATEDIFF(date_time_expires, CURDATE()) > 0 AND
									expired = 0 OR 
									expired = NULL;"); 
						
		return $query->result_array();
	 }
	 
	 
	 
	/**
	 * adds a new domain
	 * 
	 * @param: array $data Array of the data to be sent to the DB
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function addDomain($data) {
	 	//preare data
	 	if ($data['expired'] == TRUE) {
	 		$data['expired'] = 1;
	 	} else {
	 		$data['expired'] = 0;
	 	}
	 	
        // perform insert
        $result = $this->db->insert('domains', $data);
        //var_dump($data);
		//$result = TRUE;
		
        return $result;
	 }
	 
	 
	 
	/**
	 * Update an existing domain
	 * 
	 * @param: integer $id ID of the domain to be updated
	 * @param: array $data Array of the data to be sent to the DB
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function updateDomain($id, $data) {
	 	//preare data
	 	if ($data['expired'] == TRUE) {
	 		$data['expired'] = 1;
	 	} else {
	 		$data['expired'] = 0;
	 	}
	 	
 		$this->db->where('ID_domain', $id);
        $this->db->set($data);
        
		$update = $this->db->update('domains');
		var_dump($update); 
        return $update;
	 }
	 
	 
	 
	/**
     * Retreive domain info based off id
     *
     * @param string $id domain id in database
	 * 
     * @return array Array containing domain info
     */
     public function getInfo($id)
     {
         $this->db->where('ID_domain', $id);
         $this->db->select('*');
         $query = $this->db->get('domains');
 
         return $query->row_array();
     }
	 
	 
	 
	/**
	 * Deletes the selected domain
	 * 
	 * @param: integer $id_domain ID of the domain to be deleted
	 * 
	 * @return bool True on success, othwerwise false
	 */
	 public function deleteDomain($id_domain) {
	 	 $this->db->where('ID_domain', $id_domain);
         $this->db->delete('domains');
         $query = $this->db->get('domains');
 
         return $query->row_array();
	 }
}