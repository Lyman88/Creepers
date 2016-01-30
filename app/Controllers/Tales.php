<?php 
/**
 * Tales controller
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


class Tales extends Controller {

		public function index() {
			$model = new \Models\Ratings();

			$data['title'] = "Vaše příběhy";
			$data['tales'] = $model->getUserRatingsAndTales(Session::get('userID'));

			View::renderTemplate('header', $data);
        	View::render('users\tales', $data, $error);
        	View::renderTemplate('footer', $data);
		}

		public function add() {
			$model = new \Models\Tales();

			$data['title'] = "Přidat příběh";

			if(isset($_POST['submit'])){

				$title = $_POST['title'];
				$author = $_POST['author'];
				$file = $_FILES['tale'];
				$path = UPLOADDIR . Session::get('username') . $file['name'];
				$allowed = array('application/pdf');

				if ($title != "") {
					if ($author != "") {
						if (in_array($file['type'], $allowed)) {
							move_uploaded_file($file['tmp_name'], $path);
							$postdata = array(
							'authorID' =>Session::get('userID'),
							'title' => $title,
							'author' => $author,
							'path' => $path
							);
							$model->add($postdata);
							Url::redirect('tales');
						} else $error[] = "Nepovolený formát souboru!";
					} else $error[] = "Autor je prázdný!";
				} else $error[] = "Název je prázdný!";
			}

			View::renderTemplate('header', $data);
        	View::render('users\talesAdd', $data, $error);
        	View::renderTemplate('footer', $data);
		}

		public function edit($taleID) {
			$model = new \Models\Tales();
			$data['tale'] = $model->getTale($taleID);

			$data['title'] = $data['tale'][0]->title;

			if(isset($_POST['submit'])){

				$title = $_POST['title'];
				$author = $_POST['author'];

				$file = $_FILES['tale'];
				$path = UPLOADDIR . Session::get('username') . $file['name'];
				$allowed = array('application/pdf');

				if ($title != "") {
					if ($author != "") {
						if (in_array($file['type'], $allowed)) {
							move_uploaded_file($file['tmp_name'], $path);
							$postdata = array(
								'title' => $title,
								'author' => $author,
								'path' => $path
							);

							$where = array('taleID' => $taleID);

							$model->update($postdata,$where);
							Url::redirect('tales');
						} else $error[] = "Nepovolený formát souboru!";	
					} else $error[] = "Autor je prázdný!";
				} else $error[] = "Název je prázdný!";
			}

			View::renderTemplate('header', $data);
        	View::render('users\talesEdit', $data, $error);
        	View::renderTemplate('footer', $data);
		}

		public function delete($taleID) {
			$model = new \Models\Tales();

			if ($model->getAuthorID($taleID) == Session::get('userID') || Session::get('role') == admin) {
				$model->delete(array('taleID' => $taleID));
				if (Session::get('role') == admin) {
					Url::redirect('admin');
				}
				Url::redirect('tales');
			} else Url::redirect('');
		}	

		public function download($taleID) {
			$model = new \Models\Tales();
			$tale = $model->getTale($taleID);
			$path = $tale[0]->path;
			if (file_exists($path) && is_readable($path)) {
				$size = filesize($path);
				header('Content-Type: application/octet-stream');
				header('Content-Length: '.$size);
				header('Content-Disposition: attachment; filename='.$path);
				header('Content-Transfer-Encoding: binary');

				$file = @ fopen($path, 'rb');
				if ($file) {
					fpassthru($file);
					exit;
				} else echo $err;
			} else echo $err;
		}

		public function accepted() {
			$model = new \Models\Tales();

			$data['title'] = "Přijaté příběhy";
			$data['tales'] = $model->getAcceptedTales();

			View::renderTemplate('header', $data);
        	View::render('users\talesAccepted', $data, $error);
        	View::renderTemplate('footer', $data);
		}

}

?>