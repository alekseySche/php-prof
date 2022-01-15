<?php
namespace app\controllers;
use app\services\Request;
use app\services\RequestNotMatchException;
use app\services\AutoloaderNotMatchException;
class FrontController extends Controller
{
    private $controller;
    private $action;

    private $defaultController = "Product";

    public function redirect() {
        $redirect = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/service/error404';
        header('location:' . $redirect);
        exit;
    }

    public function actionIndex()
    {
        try{
            $rm = new Request();
        }catch (RequestNotMatchException $e){
            $this->redirect();
        }

        $controllerName = $rm->getControllerName() ?: $this->defaultController;
        $this->action = $rm->getActionName();

        $this->controller = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

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
}