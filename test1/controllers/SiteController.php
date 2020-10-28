<?php


include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
class SiteController {
    public function actionIndex() {
        $categories = array();
        $categories = Category::getCategoryList();
        
        
        $latest_products = array();
        $latest_products = Product::getLatestProducts(5);
        
        
        require_once ROOT.'/views/site/index.php';
        return true;
    }
}

