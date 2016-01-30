<?php
/**
 * Homepage controller
 *
 * @author Ladislav Procháska
 * @version 1.0
 */

namespace Controllers;

use Core\View,
    Core\Controller;

/**
 * Controller for admin backend.
 */
class Home extends Controller {


    /**
     * Define Index page title and load template files
     */
    public function index() {
        $data['title'] = 'Creepers';

        View::renderTemplate('header', $data);
        View::render('home', $data);
        View::renderTemplate('footer', $data);
    }
}