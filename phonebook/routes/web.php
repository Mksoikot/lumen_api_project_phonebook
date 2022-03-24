<?php


// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->post('/registation','RegistationController@onRegister');

$router->post('/login','loginController@onLogin');

// $router->post('/tokentest',['middleware'=>'auth','uses'=>'loginController@tokenTest']);

$router->post('/insert',['middleware'=>'auth','uses'=>'phonebookController@onInsert']);
$router->get('/select',['middleware'=>'auth','uses'=>'phonebookController@onSelect']);
$router->delete('/delete',['middleware'=>'auth','uses'=>'phonebookController@onDelete']);
$router->put('/update',['middleware'=>'auth','uses'=>'phonebookController@onUpdate']);
