<?php

use App\Redirect;
use App\View;
use FastRoute\Dispatcher;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r)
{
    $r->addRoute('GET', '/', ['App\Controllers\ProductsController', 'index']);
    $r->addRoute('GET', '/{id:\d+}', ['App\Controllers\ProductsController', 'show']);
    $r->addRoute('GET', '/code', ['App\Controllers\ProductsController', 'generateSelectedItemCode']);
});

/**
 * @param Dispatcher $dispatcher
 * @return void
 * @throws LoaderError
 * @throws RuntimeError
 * @throws SyntaxError
 */
function fetchMethodAndURIFromSomewhere(Dispatcher $dispatcher): void
{
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            var_dump('404 Not Found');
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            var_dump('404 Not Allowed');
            break;
        case FastRoute\Dispatcher::FOUND:

            $controller = $routeInfo[1][0];
            $method = $routeInfo[1][1];

            $vars = $routeInfo[2];

            /** @var View $response */
            $response = (new $controller)->$method($vars);

            $loader = new FilesystemLoader('app/Views');
            $twig = new Environment($loader);

            if ($response instanceof View) {
                echo $twig->render($response->getPath(), $response->getVariables());
            }

            if ($response instanceof Redirect) {
                header('Location: ' . $response->getLocation());
                exit;
            }

            break;
    }
}

fetchMethodAndURIFromSomewhere($dispatcher);
