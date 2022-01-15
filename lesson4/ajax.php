<?php

require '../engine/core.php';

function routeIndex() {
    echo render('ajax/main');
}

function routeJsonitem() {
    $item = [
        'login' => 'aleksey',
        'email' => 'test@example.com',
        'password' => '123123',
        'roles' => [
            'user', 'manager',' admin'
        ],
    ];

    renderJson($item);
}

function routeInput() {
    renderJson($_POST);
}

function routeObject() {
    renderJson($_POST['user']);
}

route();