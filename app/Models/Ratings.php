<?php
/**
 * Ratings model
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Models;

use Core\Model;

/**
 * Controller for login system.
 */
class Ratings extends Model {

	/**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getRatingsAndTales() {
        return $this->db->select("SELECT *
            FROM tales t 
            LEFT JOIN ratings r ON t.taleID=r.reviewTaleID;");
    }

    public function getRatingsAndTalesNotAssigned() {
        return $this->db->select("SELECT *
            FROM tales t 
            LEFT JOIN ratings r ON t.taleID=r.reviewTaleID
            WHERE r.reviewTaleID IS NULL;");
    }

    public function getRatingsAndTalesNotAccepted() {
        return $this->db->select("SELECT *
            FROM tales t 
            LEFT JOIN ratings r ON t.taleID=r.reviewTaleID
            WHERE t.accepted=0;");
    }

    public function getRatingsAndTalesReview($reviewerID) {
    	return $this->db->select("SELECT * 
            FROM tales t 
            INNER JOIN ratings r ON t.taleID=r.reviewTaleID 
            INNER JOIN users u ON r.reviewerID=u.userID 
            WHERE u.userID=:userID;", array(':userID'=>$reviewerID));
    }

    public function getRatingAndTale($ratingID) {
        return $this->db->select("SELECT * 
            FROM tales t 
            INNER JOIN ratings r ON t.taleID=r.reviewTaleID 
            WHERE r.ratingID=:ratingID;", array(':ratingID'=>$ratingID));
    }

    public function getUserRatingsAndTales($userID) {
        return $this->db->select("SELECT *
            FROM tales t 
            LEFT JOIN ratings r ON t.taleID=r.reviewTaleID
            WHERE t.authorID=:userID ;", array(':userID'=>$userID));
    }

    public function add($data) {
        $this->db->insert(PREFIX."ratings", $data);
    }

    public function update($data, $where) {
        $this->db->update(PREFIX."ratings", $data, $where);
    }
}