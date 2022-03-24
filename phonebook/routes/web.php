<?php


// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->post('/registation','RegistationController@onRegister');

$router->post('/login','loginController@onLogin');

// $router->post('/tokentest',['middleware'=>'auth','uses'=>'loginController@tokenTest']);

$router->post('/insert',['middleware'=>'auth','uses'=>'phonebookController@onInsert']);
$router->post('/select',['middleware'=>'auth','uses'=>'phonebookController@onSelect']);
$router->post('/delete',['middleware'=>'auth','uses'=>'phonebookController@onDelete']);
$router->post('/update',['middleware'=>'auth','uses'=>'phonebookController@onUpdate']);
