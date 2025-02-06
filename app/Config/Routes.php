<?php

use App\Controllers\Devices;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', function ($routes) {
  $routes->get('/', [Devices::class, 'index']);
  $routes->get('/panel', [Devices::class, 'panelPage']);
  $routes->post('/panel', [Devices::class, 'panel']);
  $routes->get('/create', [Devices::class, 'createPage']);
  $routes->post('/create', [Devices::class, 'create']);
  $routes->get('devices', [Devices::class, 'get_devices']);
  $routes->get('/delete/(:num)', [Devices::class, 'delete']);
  $routes->get('/edit/(:num)', [Devices::class, 'editPage']);
  $routes->post('/edit/(:num)', [Devices::class, 'update']);
});
