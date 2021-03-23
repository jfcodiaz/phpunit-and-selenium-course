<?php
namespace App\slim\Controllers;

use Psr\Container\ContainerInterface;

class BaseController
{
    protected $container;
    protected $view;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
    }
}
