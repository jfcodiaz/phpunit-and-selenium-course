<?php
namespace App\slim\Controllers;

class HomeController extends BaseController
{

    public function home($request, $response, $args)
    {
        $response = $this->view->render($response, 'view.phtml');

        return $response;
    }
}
