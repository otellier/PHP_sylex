<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');

$app->get('/footballer/list', 'App\Footballer\Controller\IndexController::listAction')->bind('footballer.list');
$app->get('/footballer/edit/{id}', 'App\Footballer\Controller\IndexController::editAction')->bind('footballer.edit');
$app->get('/footballer/new', 'App\Footballer\Controller\IndexController::newAction')->bind('footballer.new');
$app->post('/footballer/delete/{id}', 'App\Footballer\Controller\IndexController::deleteAction')->bind('footballer.delete');
$app->post('/footballer/save', 'App\Footballer\Controller\IndexController::saveAction')->bind('footballer.save');
