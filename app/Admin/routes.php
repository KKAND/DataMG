<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
	$router->resource('tdata',TdataController::class);
	$router->resource('mydata',mydataController::class);
	$router->resource('information',InformationController::class);
	$router->resource('class',ClassController::class);

	$router->get('/overview','OverviewController@index');
});
