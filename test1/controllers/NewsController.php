<?php


include_once ROOT.'/models/News.php';

class NewsController{
    public function actionIndex() {
        $newsList = array();
        $newsList = News::getNewsList();
//        
        require_once ROOT.'/views/news/index.php';
    }
    public function actionView($id) {
        if($id):
            $newsItem = News::getNewsItemById($id);
            echo 'новость '.$newsItem['id'];
        endif;
    }
}
