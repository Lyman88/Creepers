<?php
/**
 * Users model
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Models;

use Core\Model;

/**
 * Controller for users.
 */
class Users extends Model {

	/**
     * Call the parent construct
     */
    public function __construct() {
        parent::__construct();
    }

    public function getUsers() {
    	return $this->db->select("SELECT u.* FROM users u 
    		LEFT JOIN userrole ur ON u.userID=ur.userID 
    		WHERE ur.userID IS NULL;
    		ORDER BY name");
    }

    public function getReviewers() {
    	return $this->db->select("SELECT u.* FROM ".PREFIX."users u 
    		INNER JOIN userrole ur ON u.userID=ur.userID 
    		WHERE ur.roleID=2");
    }

	public function getPass($username) {
		$data = $this->db->select("SELECT pass FROM ".PREFIX."users 
			WHERE name = :username", array(':username' => $username));
		return $data[0]->pass;
	}

	public function getID($username) {
		$data = $this->db->select("SELECT userID FROM ".PREFIX."users 
			WHERE name = :username", array(':username' => $username));
		return $data[0]->userID;
	}

	public function getRole($username) {
		if($this->isAdmin($username)) return "admin";
		if($this->isReviewer($username)) return "recenzent";
		return "uživatel";
	}

	public function update($data, $where) {
		$this->db->update(PREFIX."users", $data, $where);
	}

	public function add($data) {
		$this->db->insert(PREFIX."users", $data);
	}

	public function delete($where) {
		$this->db->delete(PREFIX."users", $where);
	}

	public function addReviewer($data) {
		$this->db->insert(PREFIX."userrole", $data);
	}

	public function removeReviewer($where) {
		$this->db->delete(PREFIX."userrole", $where);
	}

	public function isAdmin($username) {
		$id = $this->getID($username);
		$data = $this->db->select("SELECT userID FROM ".PREFIX."userRole 
			WHERE userID = :id AND roleID = 1", array(':id' => $id));
		return ($data[0]->userID != NULL);
	}

	public function isReviewer($username) {
		$id = $this->getID($username);
		$data = $this->db->select("SELECT userID FROM ".PREFIX."userRole 
			WHERE userID = :id AND roleID = 2", array(':id' => $id));
		return ($data[0]->userID != NULL);
	}

	public function exists($username) {
		$data = $this->db->select("SELECT userID FROM ".PREFIX."users 
			WHERE name = :username", array(':username' => $username));
		// if exists $data is not NULL
		return ($data[0]->userID != NULL);
	}


}