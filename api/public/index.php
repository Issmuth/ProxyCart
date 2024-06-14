<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../models/city.php';
require_once __DIR__ . '/../../models/user.php';
require_once __DIR__ . '/../../models/route.php';
require_once __DIR__ . '/../../models/product.php';
require_once __DIR__ . '/../../models/order.php';
require_once __DIR__ . '/../../models/dispatch.php';
require_once __DIR__ . '/../../models/engine/db_storage.php';
ini_set('memory_limit', '256M');

$storage = new DBStorage();

$app = AppFactory::create();

/** City Routes **/
$app->get('/api/cities', function (Request $request, Response $response) {
    global $storage;
    $cities = json_encode($storage->all('City'));
    $response->getBody()->write($cities);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/city/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $city = json_encode($storage->get($args['id'], 'City'));
    $response->getBody()->write($city);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/city', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $cityData = json_decode($json);
    if ($cityData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newCity = new City($cityData);
    $storage->new($newCity);
    $storage->save();
});

$app->delete('/api/city/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $city = $storage->get($args['id'], 'City');
    $storage->delete($city);
    $storage->save();
});

$app->put('/api/city/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $city = $storage->get($args['id'], 'City');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $city->$key = $value;
    }
    $storage->new($city);
    $storage->save();
});


//------------------------------------------------------------------------------------------//

/** User Routes **/
$app->get('/api/users', function (Request $request, Response $response) {
    global $storage;
    $users = json_encode($storage->all('User'), true);
    $response->getBody()->write($users);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/user/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $user = json_encode($storage->get($args['id'], 'User'));
    $response->getBody()->write($user);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/user', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $userData = json_decode($json);
    if ($userData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newUser = new User($userData);
    $storage->new($newUser);
    $storage->save();
});

$app->delete('/api/user/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $user = $storage->get($args['id'], 'User');
    $storage->delete($user);
    $storage->save();
});

$app->put('/api/user/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $user = $storage->get($args['id'], 'User');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $user->$key = $value;
    }
    $storage->new($user);
    $storage->save();
});

//------------------------------------------------------------------------------------------//

/** Route routes :D **/
$app->get('/api/routes', function (Request $request, Response $response) {
    global $storage;
    $routes = json_encode($storage->all('Route'));
    $response->getBody()->write($routes);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/route/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $route = json_encode($storage->get($args['id'], 'Route'));
    $response->getBody()->write($route);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/route', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $routeData = json_decode($json);
    if ($routeData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newRoute = new Route($routeData);
    $storage->new($newRoute);
    $storage->save();
});

$app->delete('/api/route/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $route = $storage->get($args['id'], 'Route');
    $storage->delete($route);
    $storage->save();
});

$app->put('/api/route/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $route = $storage->get($args['id'], 'Route');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $route->$key = $value;
    }
    $storage->new($route);
    $storage->save();
});


//------------------------------------------------------------------------------------------//

/** Order routes **/
$app->get('/api/orders', function (Request $request, Response $response) {
    global $storage;
    $order = json_encode($storage->all('Order'));
    $response->getBody()->write($order);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/order/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $order = json_encode($storage->get($args['id'], 'Order'));
    $response->getBody()->write($order);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/order', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $orderData = json_decode($json);
    if ($orderData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newOrder = new Order($orderData);
    $storage->new($newOrder);
    $storage->save();
});

$app->delete('/api/order/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $order = $storage->get($args['id'], 'Order');
    $storage->delete($order);
    $storage->save();
});

$app->put('/api/order/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $order = $storage->get($args['id'], 'Order');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $order->$key = $value;
    }
    $storage->new($order);
    $storage->save();
});

//------------------------------------------------------------------------------------------//

/** Product routes **/
$app->get('/api/product', function (Request $request, Response $response) {
    global $storage;
    $product = json_encode($storage->all('Product'));
    $response->getBody()->write($product);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/product/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $product = json_encode($storage->get($args['id'], 'Product'));
    $response->getBody()->write($product);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/product', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $productData = json_decode($json);
    if ($productData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newProduct = new Product($productData);
    $storage->new($newProduct);
    $storage->save();
});

$app->delete('/api/product/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $product = $storage->get($args['id'], 'Product');
    $storage->delete($product);
    $storage->save();
});

$app->put('/api/product/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $product = $storage->get($args['id'], 'Product');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $product->$key = $value;
    }
    $storage->new($product);
    $storage->save();
});

//------------------------------------------------------------------------------------------//

/** Dispatch routes **/
$app->get('/api/dispatch', function (Request $request, Response $response) {
    global $storage;
    $dispatch = json_encode($storage->all('Dispatch'));
    $response->getBody()->write($dispatch);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/api/dispatch/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $dispatch = json_encode($storage->get($args['id'], 'Dispatch'));
    $response->getBody()->write($dispatch);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/dispatch', function (Request $request, Response $response) {
    global $storage;
    $json = $request->getBody()->getContents();
    $dispatchData = json_decode($json);
    if ($dispatchData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    $newDispatch = new Dispatch($dispatchData);
    $storage->new($newDispatch);
    $storage->save();
});

$app->delete('/api/dispatch/{id}', function(Request $request, Response $response, array $args) {
    global $storage;
    $dispatch = $storage->get($args['id'], 'Dispatch');
    $storage->delete($dispatch);
    $storage->save();
});

$app->put('/api/dispatch/{id}', function (Request $request, Response $response, array $args) {
    global $storage;
    $dispatch = $storage->get($args['id'], 'Dispatch');
    $newData = json_decode($request->getBody()->getContents());
    if ($newData === null) {
        $response->getBody()->write(json_encode(['error' => 'Invalid data format']));
        return $response->withStatus(400);
    }
    foreach($newData as $key => $value) {
        $dispatch->$key = $value;
    }
    $storage->new($dispatch);
    $storage->save();
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->run();
?>