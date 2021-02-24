<?php
include '../app/bootstrap.php';

$hello = new App\Hello();

printf('<h1 id="hello-word">%s</h1>', $hello->sayHelloWorld());

phpinfo();
