<?php 
/**
 * Ratings controller, mainly for reviewers.
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Controllers;

use Core\View,
    Core\Controller;
use Helpers\Password,
    Helpers\Session,
    Helpers\Url;


class Ratings extends Controller {
	
	public function index() {
		$model = new \Models\Ratings();

		$data['title'] = "Vaše recenze";
		$data['ratings'] = $model->getRatingsAndTalesReview(Session::get('userID'));

		View::renderTemplate('header', $data);
        View::render('review\ratings', $data, $error);
        View::renderTemplate('footer', $data);
	}

	public function edit($ratingID) {
		$model = new \Models\Ratings();

		$data['title'] = "Recenze";

		$data['rating'] = $model->getRatingAndTale($ratingID);

		if (isset($_POST['submit'])) {
			$postdata = array(
				'originality' => $_POST['originality'],
				'theme' => $_POST['theme'],
				'quality' => $_POST['quality'],
				);
			$where = array('ratingID' => $data['rating'][0]->ratingID);
			$model->update($postdata, $where);
			Url::redirect('ratings');
		}

		View::renderTemplate('header', $data);
        View::render('review\ratingsEdit', $data, $error);
        View::renderTemplate('footer', $data);
	}
}

?>