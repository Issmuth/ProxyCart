<?php

use Doctrine\ORM\Query\Expr\Orx;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Response as SlimResponse;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../models/city.php';
require_once __DIR__ . '/../../models/user.php';
require_once __DIR__ . '/../../models/route.php';
require_once __DIR__ . '/../../models/product.php';
require_once __DIR__ . '/../../models/order.php';
require_once __DIR__ . '/../../models/dispatch.php';
require_once __DIR__ . '/../../models/engine/db_storage.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$storage = new DBStorage();
$renderer = new PhpRenderer(__DIR__ . '/../templates');
session_start();

$app->get('/', function (Request $request, Response $response) use ($renderer) {
    return $renderer->render($response, 'home.php');
});

// Signup handler
$app->post('/signup', function (Request $request, Response $response) use ($storage, $renderer) {
    $dataJson = $request->getBody()->getContents();
    $data = json_decode($dataJson, true);
    $user = $storage->getByEmail($data['email'], 'User');
    if ($user) {
        $_SESSION["session"] = 'none';
        $response->getBody()->write(json_encode($_SESSION));
        return $response->withHeader('Content-Type', 'application/json');
    }

    $fullName = explode(' ', $data['fullname']);
    $userData = [
        'firstName' => $fullName[0],
        'lastName' => $fullName[1],
        'email' => $data['email'],
        'password' => $data['password']
    ];
    $newUser = new User($userData);
    $storage->new($newUser);
    $storage->save();
    session_regenerate_id();
    $_SESSION['user'] = $newUser->getId();
    $_SESSION['session'] = session_id();
    $_SESSION['login'] = true;
    setcookie($newUser->getId());
    $response->getBody()->write(json_encode($_SESSION));
    return $response->withHeader('Content-Type', 'application/json');
});

//login handler
$app->post('/login', function (Request $request, Response $response) use ($storage, $renderer) {
    $dataJson = $request->getBody()->getContents();
    $data = json_decode($dataJson, true);
    $user = $storage->getByEmail($data['email'], 'User');
    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            session_regenerate_id();
            $_SESSION['user'] = $user->getId();
            $_SESSION['session'] = session_id();
            $_SESSION['login'] = true;
            setcookie($user->getId());
            $response->getBody()->write(json_encode($_SESSION));
        } else {
            $_SESSION['session'] = 'none';
            $response->getBody()->write(json_encode($_SESSION));
        }
    } else {
        $_SESSION['session'] = 'none';
        $response->getBody()->write(json_encode($_SESSION));
    }
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/session', function (Request $request, Response $response) {
    $response->getBody()->write(json_encode($_SESSION));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/travel', function (Request $request, Response $response) use ($renderer) {
    return $renderer->render($response, 'travel.php');
});

$app->post('/travelpost', function (Request $request, Response $response) use($storage) {
    $dataJson = $request->getBody()->getContents();
    $data = json_decode($dataJson, true);
    $routeData = [];
    $routeData['origin'] = $storage->entityManager->getRepository(City::class)->findOneBy(['name' => ucwords($data['origin'])]);
    $routeData['destination'] = $storage->entityManager->getRepository(City::class)->findOneBy(['name' => ucwords($data['destination'])]);
    $routeData['is_round'] = $data['is_round'];
    $routeData['leaving_date'] = $data["leaving_date"];
    $routeData['return_date'] = $data["return_date"];
    $routeData['proxy'] = $storage->get($_SESSION['user'], 'User');
    $route = new Route($routeData);
    try{
        $storage->new($route);
        $storage->save($route);
        $response->getBody()->write(json_encode(["post" => 'success']));
    } catch (Exception $e) {
        $response->getBody()->write(json_encode(["post" => 'failed', 'error'=> $e->__toString()]));
    }
    return $response->withHeader("Content-Type", "application/json");

});

$app->get('/route', function (Request $request, Response $response) use ($renderer) {
    return $renderer->render($response, 'route-info.php');
});

$app->get('/orderpost', function(Request $request, Response $response) use ($renderer) {
    return $renderer->render($response, 'order.php');
});

$app->post('/orderpost', function (Request $request, Response $response) use($storage) {
    $dataJson = $request->getBody()->getContents();
    $data = json_decode($dataJson, true);
    $productData = [];
    $productData['name'] = $data['name'];
    $productData['link'] = $data['link'];
    $productData['price'] = $data['price'];
    $productData['description'] = $data['description'];
    $productData['patron'] = $storage->get($_SESSION['user'], 'User');
    $product = new Product($productData);   

    $cityOrigin = $storage->entityManager->getRepository(City::class)->findOneBy(['name' => ucwords($data['origin'])]);
    $cityDestination = $storage->entityManager->getRepository(City::class)->findOneBy(['name' => ucwords($data['destination'])]);
    $orderData['reward_sum'] = $data['reward'];
    $orderData['deadline'] = $data['deadline'];
    $orderData['source'] = $cityOrigin;
    $orderData['destination'] = $cityDestination;
    $orderData['product_id'] = $product;
    $order = new Order($orderData);
    try{
        $storage->new($product);
        $storage->new($order);
        $storage->save();
        $response->getBody()->write(json_encode(["post" => 'success']));
    } catch (Exception $e) {
        $response->getBody()->write(json_encode(["post" => 'failed', "error" => $e->__toString()]));
    }
    return $response->withHeader("Content-Type", "application/json");
});

$app->get('/order',  function (Request $request, Response $response) use($renderer) {
    return $renderer->render($response, 'order-info.php');
});

$app->get('/myspace', function (Request $request, Response $response) use($renderer) {
    return $renderer->render($response, 'myspace.php');
});

$error404 = function (
    Request $request,
    HttpNotFoundException $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $response = new SlimResponse();
    return $response
        ->withHeader('Location', '/error404')
        ->withStatus(302);
};

$app->get('/error404', function (Request $request, Response $response) use ($renderer) {
    return $renderer->render($response, 'error404.php');
});

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setErrorHandler(\Slim\Exception\HttpNotFoundException::class, $error404);
// $app->options('/{routes:.+}', function ($request, $response, $args) {
//     return $response;
// });

$app->run();
