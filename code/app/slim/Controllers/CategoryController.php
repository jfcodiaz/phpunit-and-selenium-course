<?php
namespace App\slim\Controllers;

class CategoryController extends BaseController
{
    public function deleteCategory($request, $response, $args)
    {
        $response = $this->view->render($response, 'view.phtml', ['category_deleted' => true]);
        return $response;
    }

}
