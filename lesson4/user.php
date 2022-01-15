<?php

// поключаем конфигурации приложения
require '../engine/core.php';

function routeIndex()
{
    // перехват стандартного действия
    routeLogin();
}

// страница с формой входа
function routeLogin()
{
    // редирект если уже авторизован
    if (isLoggedUser()) {
        header("Location: /user.php?action=home");
    }

    // проверка данных из формы
    if (isset($_POST['login_user'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = getItem("select * from users where login='{$login}'");

        if ($user != false) {
            if (password_verify($password, $user['password'])) {
                if (isset($_POST['remember'])) {
                    loginUser($login, true);
                } else {
                    loginUser($login);
                }

                header("Location: /user.php?action=home");
            }
        }
    }

    echo render('user/login');
}

function routeLogout()
{
    logoutUser();
}

function routeHome()
{
    echo render('user/home');
}

function routeOrder()
{
    if (isAdmin()) {
        echo render('shop/orders');
    }

}

function routeOrders()
{
    if (isAdmin()) {
        echo render('user/orders');
    }

}

function routeRegister()
{
    if (isset($_POST['reg_user'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into users (`login`, `password`) values ('{$login}', '{$password}')";
        if (execute($sql)) {
            loginUser($login, true);
            header("Location: /user.php?action=home");
        }
    }

    echo render('user/register');
}

function routeDelete_order()
{

    $id = $_GET['id'];
    $sql = "delete from orders where id={$id}";
    execute($sql);

}

function routeMy_order(){
    echo render('user/myOrder');
}

route();