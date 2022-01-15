<?php
namespace app\controllers;
class ServiceController extends Controller
{
    public function actionIndex()
    {
        $this->actionError404();
    }

    public function actionError404()
    {
        $this->useLayout = false;
        $product = (object) array('name'=>'Ошибка 404', 'description'=>'Страница не найдена');
        echo $this->render("card", ['product' => $product]);
    }
}