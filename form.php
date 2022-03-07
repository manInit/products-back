<?php

require_once './routing/Router.php';
require_once './constants.php';
require_once './database/Form.php';

if (isset($_POST['username'])) {

    if (!isset($_POST['agree'])) $_POST['agree'] = 0;
    else $_POST['agree'] = 1;

    $form = new Form();
    $errors = $form->saveFormData($_POST);

    if (count($errors) != 0) {
        $data = ['form' => $_POST, 'err' => $errors];
        Router::showForm($data);
        die();
    } else {
        $cookieTime = time() + 3600;

        setcookie('username', $_POST['username'], $cookieTime);
        setcookie('email', $_POST['email'], $cookieTime);
        setcookie('birthYear', $_POST['birthYear'], $cookieTime);
        setcookie('gender', $_POST['gender'], $cookieTime);

        Router::showTemplate('formSuccess', []);
        die();
    }
}

Router::showForm();