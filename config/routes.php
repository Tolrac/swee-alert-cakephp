<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Route\DashedRoute;

return function (RouteBuilder $routes): void {
    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->plugin(
            'SweetAlertHelper',
            ['path' => '/sweet-alert-helper'],
            function (RouteBuilder $routes) {
                $routes->fallbacks(DashedRoute::class);
            }
        );
    });
};
