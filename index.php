<?php

require_once './routing/Router.php';

const ROOT_FOLDER = '/products';
const PUBLIC_PATH = ROOT_FOLDER . '/public';

if (isset($_GET['id'])) {
    $idProduct = intval($_GET['id']);

    Router::showProductPage($idProduct);
    die();
}

if (isset($_GET['cat_id'])) {
    $idCategory = intval($_GET['cat_id']);

    Router::showProductListPage($idCategory);
    die();
}

Router::showCategoriesList();
die();