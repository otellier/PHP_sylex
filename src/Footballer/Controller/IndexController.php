<?php

namespace App\Footballer\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function listAction(Request $request, Application $app)
    {
        $footballer = $app['repository.footballer']->getAll();
        $user = $app['repository.user']->getAll();
        return $app['twig']->render('footballer.list.html.twig', array('footballer' => $footballer, 'user' => $user));
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $app['repository.footballer']->delete($parameters['id']);

        return $app->redirect($app['url_generator']->generate('footballer.list'));
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $footballer = $app['repository.footballer']->getById($parameters['id']);
        $user = $app['repository.user']->getAll();
        return $app['twig']->render('footballer.form.html.twig', array('footballer' => $footballer, 'user' => $user));
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $footballer = $app['repository.footballer']->update($parameters);
        } else {
            $footballer = $app['repository.footballer']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('footballer.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        $user = $app['repository.user']->getAll();
        return $app['twig']->render('footballer.form.html.twig', array('user' => $user));
    }
}
