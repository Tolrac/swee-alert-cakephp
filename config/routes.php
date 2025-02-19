<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $routes->plugin(
        'SweetAlertHelper',
        ['path' => '/sweet-alert-helper'],
        function (RouteBuilder $routes) {
            $routes->fallbacks(DashedRoute::class);
        }
    );
});
