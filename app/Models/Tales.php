<?php
/**
 * Tales model
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Models;

use Core\Model;

/**
 * Controller for login system.
 */
class Tales extends Model {

	/**
     * Call the parent construct
     */
    public function __construct() {
        parent::__construct();
    }

    public function getTales() {
    	return $this->db->select("SELECT * FROM ".PREFIX."tales 
    		ORDER BY title");
    }

    public function getUserTales($userID) {
    	return $this->db->select("SELECT * FROM ".PREFIX."tales 
    		WHERE authorID = :userID", array(':userID' => $userID));
    }

    public function getTale($taleID) {
    	return $this->db->select("SELECT * FROM ".PREFIX."tales 
    		WHERE taleID = :taleID", array(':taleID'=>$taleID));
    }

    public function getAcceptedTales() {
        return $this->db->select("SELECT * FROM ".PREFIX."tales 
            WHERE accepted = 1");
    }

    public function getNotAcceptedTales() {
        return $this->db->select("SELECT * FROM ".PREFIX."tales 
            WHERE accepted = 0");
    }

    public function getAuthorID($taleID) {
    	$data = $this->getTale($taleID);
    	return $data[0]->authorID;
    }

	public function add($data) {
		$this->db->insert(PREFIX."tales", $data);
	}

	public function update($data, $where) {
		$this->db->update(PREFIX."tales", $data, $where);
	}

	public function delete($where) {
		$this->db->delete(PREFIX."tales", $where);
	}
}