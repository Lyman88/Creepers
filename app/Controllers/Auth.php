<?php
/**
 * Auth controller
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

/**
 * Controller for login system.
 */
class Auth extends Controller {

    /**
     * Define login page title and load template files
     */
    public function login() {

        if (Session::get('loggedin')) {
            Url::redirect('');
        }

        $data['title'] = 'Přihlášení';
        
        $model = new \Models\Users();

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // verify password using helper class Password
            if(Password::verify($password, $model->getPass($username))) {
                Session::set('loggedin', true);
                Session::set('username', $username);
                Session::set('role', $model->getRole($username));
                Session::set('userID', $model->getID($username));
                
                if(Session::get('role') == "admin") {
                    Url::redirect('admin');
                } else if (Session::get('role') == "recenzent") {
                    Url::redirect('ratings');
                } else {
                    Url::redirect('tales');
                }

            } else {
                $error[] = 'Špatné jméno nebo heslo';
            }
        }

        View::renderTemplate('header', $data);
        View::render('auth\login', $data, $error);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define logout
     */
    public function logout() {
        Session::destroy();
        Url::redirect('login');
    }

    public function register() {
        if (Session::get('loggedin')) {
            Url::redirect('');
        }

        $data['title'] = "Registrace";

        $model = new \Models\Users();

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];
            $email = $_POST['email'];

            if ($password == $repeatPassword) {
                if (!$model->exists($username)) {
                    // array of values for new user
                    $postdata = array(
                        'name' => $username,
                        'pass' => Password::make($password), 
                        'email' => $email
                    );
                    $model->add($postdata);
                    Url::redirect('login');
                } else $error[] = 'Jméno je již zabráno. Zkuste prosím jiné';
            } else $error[] = 'Heslo a ověření hesla se neshodují. Zkuste je prosím vyplnit znovu.';
        }

        View::renderTemplate('header', $data);
        View::render('auth\register', $data, $error);
        View::renderTemplate('footer', $data);

    }

}