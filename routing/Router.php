<?php 

require_once './database/Product.php';
require_once './database/ProductsPage.php';
require_once './database/Category.php';
require_once './database/CategoriesList.php';

class Router
{
    public static function showProductPage($idProduct) 
    {
        $product = new Product();
        $data = $product->getProduct($idProduct);
      
        if (!isset($data['main'][0])) {
          header('location: 404.php');
        }
      
        $data['main'] = $data['main'][0];
        Router::showTemplate('product', $data);
    }

    public static function showProductListPage($categoryId, $page = 1)
    {
        $productPage = new ProductsPage();
        $category = new Category();

        $dataPage = $productPage->getPage($categoryId, $page);
        $dataCategory = $category->getCategory($categoryId);

        if (!isset($dataPage[0]) || !isset($dataCategory[0])) {
            header('location: 404.php');
        }

        Router::showTemplate('productsList', ['products' => $dataPage, 'category' => $dataCategory]);
    }

    public static function showCategoriesList()
    {
        $categoriesList = new CategoriesList();
        $categoriesData = $categoriesList->getCategories();

        if (!isset($categoriesData[0])) {
            header('location: 404.php');
        }

        Router::showTemplate('categoriesList', $categoriesData);
    }

    private static function showTemplate($templateName, $dataTemplate)
    {
        $data = $dataTemplate;
        require_once('./templates/' . $templateName . '.php');
    }
}