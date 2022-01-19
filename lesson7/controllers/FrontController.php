<?php

namespace app\controllers;
use app\base\App;
use app\models\User;
use app\services\RequestNotMatchException;
use app\services\AutoloaderNotMatchException;
class FrontController extends Controller
{
    private $controller;
    private $action;
    private $defaultController = "Product";
    public function actionIndex()
    {
        try {
            $rm = App::call()->request;
        } catch (RequestNotMatchException $e) {
            $this->redirect();
        }
        $controllerName = $rm->getControllerName() ?: $this->defaultController;
        $this->action = $rm->getActionName();
        $this->controller = App::call()->config['controller_namespaces']
            . ucfirst($controllerName) . "Controller";
        $this->checkLogin();
        try {
            $controller = new $this->controller(
                new \app\services\renderers\TemplateRenderer()
            );
        } catch (AutoloaderNotMatchException $e) {
            $this->redirect();
        }
        try {
            $controller->runAction($this->action);
        } catch (ActionNotMatchException $e) {
            $this->redirect();
        }
    }

    private function checkLogin()
    {
        session_start();
        if ($this->controller != "\\" . AuthController::class) {
            $user = (new User())->getCurrent();
            if (!$user) {
                $this->redirect();
            }
        }
    }
}