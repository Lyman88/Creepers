<?php
/**
 * Admin controller
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Controllers;

use Core\View,
    Core\Controller;
use Helpers\Session,
    Helpers\Url;

/**
 * Controller for admin backend.
 */
class Admin extends Controller {

    /**
     * Define Index page title and load template files
     */
    public function index() {
        $modelUsers = new \Models\Users();
        $modelTales = new \Models\Tales();
        $modelRatings = new \Models\Ratings();

        // not admin redirect to homepage
        if (Session::get('role') != "admin") {
            Url::redirect('');
        }

        $data['title'] = 'Admin';

        $data['users'] = $modelUsers->getUsers();
        $data['reviewers'] = $modelUsers->getReviewers();
        $data['tales'] = $modelRatings->getRatingsAndTalesNotAccepted();
        $data['talesNot'] = $modelRatings->getRatingsAndTalesNotAssigned();

        View::renderTemplate('header', $data);
        View::render('admin\admin', $data);
        View::renderTemplate('footer', $data);
    }

    public function deleteUser($ID) {
        if (Session::get('role') != "admin") {
           Url::redirect('');
        }

        $model = new \Models\Users();
        $model->delete(array('userID' => $ID));
        Url::redirect('admin');
    }

    public function addReviewer($ID) {
        if (Session::get('role') != "admin") {
            Url::redirect('');
        }

        $model = new \Models\Users();
        $postdata = array(
            'userID' => $ID,
            'roleID' => 2
            );
        $model->addReviewer($postdata);
        Url::redirect('admin');
    }

    public function removeReviewer($ID) {
        if (Session::get('role') != "admin") {
            Url::redirect('');
        }

        $model = new \Models\Users();
        $where = array('reviewerID' => $ID);
        $model->removeReviewer($where);
        Url::redirect('admin');   
    }

    public function setToReview($taleID) {
        if (Session::get('role') != "admin") {
            Url::redirect('');
        }

        $modelRatings = new \Models\Ratings();
        $modelUsers = new \Models\Users();
        $modelTales = new \Models\Tales();

        $data['title'] = "Přiřadit recenzi";
        $data['reviewers'] = $modelUsers->getReviewers();
        $data['tale'] = $modelTales->getTale($taleID);

        if (isset($_POST['submit'])) {
            $postdata = array(
                'reviewerID' => $_POST['reviewerID'],
                'reviewTaleID' => $data['tale'][0]->taleID
                );
            $modelRatings->add($postdata);
            Url::redirect('admin');
        }

        View::renderTemplate('header', $data);
        View::render('admin\adminReview', $data);
        View::renderTemplate('footer', $data);

    }

    public function accept($taleID) {
        if (Session::get('role') != "admin") {
            Url::redirect('');
        }

        $model = new \Models\Tales();
        $postdata = array('accepted' => 1);
        $where = array('taleID' => $taleID);
        $model->update($postdata, $where);
        
        Url::redirect('admin');
    }

}