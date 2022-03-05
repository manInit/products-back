<?php

require_once './routing/Router.php';
require_once './constants.php';


if (isset($_GET['id'])) {
    $idProduct = intval($_GET['id']);

    Router::showProductPage($idProduct);
    die();
}

if (isset($_GET['cat_id'])) {
    $page = 1;
    if (isset($_GET['page'])) {
        $page = intval($_GET['page']);
    }

    $idCategory = intval($_GET['cat_id']);

    Router::showProductListPage($idCategory, $page);
    die();
}

Router::showCategoriesList();
die();