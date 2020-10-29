<?php


include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';
class CatalogController {
    public function actionIndex() {
        $categories = array();
        $categories = Category::getCategoryList();
        
        
        $latest_products = array();
        $latest_products = Product::getLatestProducts(5);
        
        
        require_once ROOT.'/views/catalog/index.php';
        return true;
    }
    public function actionCategory($categoryId, $page = 1) {
        $categories = array();
        $categories = Category::getCategoryList();
        
        $total = Product::getTotalProductsInCategory($categoryId);
        
        //создаем объект постраничной навигации
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, '');
        
        $category_products = array();
        $category_products = Product::getProductsListByCategory($categoryId);
        require_once ROOT.'/views/catalog/category.php';
        return true;
    }
}

