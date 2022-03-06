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
      
        if (empty($data['main'])) {
          header('location: 404.php');
        }
      
        $data['main'] = $data['main'][0];
        Router::showTemplate('product', $data);
    }

    public static function showProductListPage($idCategory, $page = 1)
    {
        $productPage = new ProductsPage();
        $category = new Category();

        $dataPage = $productPage->getPage($idCategory, $page);
        $dataCategory = $category->getCategory($idCategory);

        if (empty($dataPage) || empty($dataCategory)) {
            header('location: 404.php');
        }

        Router::showTemplate('productsList', [
            'products' => $dataPage, 
            'category' => $dataCategory[0], 
            'page' => $page,
            'cat_id' => $idCategory
        ]);
    }

    public static function showCategoriesList()
    {
        $categoriesList = new CategoriesList();
        $categoriesData = $categoriesList->getCategories();

        if (empty($categoriesData)) {
            header('location: 404.php');
        }

        Router::showTemplate('categoriesList', $categoriesData);
    }

    public static function showForm($data = [])
    {
        Router::showTemplate('forms', $data);
    }

    private static function showTemplate($templateName, $dataTemplate)
    {
        $data = $dataTemplate;
        require_once('./templates/' . $templateName . '.php');
    }
}