<?php

$router->group(['prefix' => 'api'], function () use ($router) {

    //Login
    $router->post('/auth/login','AuthController@login');


    $router->group(['middleware' => 'auth'], function () use ($router){

        //dashboard
        $router->get('/dashboard','DashboardController@index');

        //Users
        $router->get('/users','UserController@index');
        $router->post('/users/create','UserController@store');

        //competitions
        $router->get('/competitions','CompetitionController@index');
        $router->post('/competitions/create','CompetitionController@store');

        //teams
        $router->get('/teams','TeamController@index');
        $router->post('/teams/create','TeamController@store');

        //calls
        $router->get('/calls','CallController@index');
        $router->post('/calls/create','CallController@store');

        //calls Tecnico
        $router->get('/calls/technical','CallController@showTechnical');
        $router->get('/calls/change-state','CallController@changeState');
        $router->get('/calls/close','CallController@close');

        //Logout
        $router->get('/auth/logout','AuthController@logout');

    });

    
});
