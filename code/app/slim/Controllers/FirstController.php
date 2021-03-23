<?php
namespace App\slim\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\slim\Controllers\BaseController;

class FirstController extends BaseController
{
    public function home(Request $request, Response $response, $args)
    {
        // $data = $request->getQueryParams(); // GET data like ?param=something
        // $data = $request->getParsedBody(); // POST data
        $response->getBody()->write($this->container->get('my_service'));
        $response->getBody()->write($this->container->get('settings')['db']['user']);
        $data = [
            ['name' => 'Adam','id' => 1],
            ['name' => 'Ben','id' => 2]
        ];
        $response = $this->container->get('view')->render($response, 'view.phtml', ['data' => $data, 'name' => $args['name']]);
        return $response;
    }
}
