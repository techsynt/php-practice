<?php


include_once ROOT.'/models/News.php';

class NewsController{
    public function actionIndex() {
        echo 'список новостей';
        $newList = array();
        $newList = News::getNewsList();
        return true;
    }
    public function actionView($id) {
        if($id):
            $newsItem = News::getNewsItemById($id);
            print_r($newsItem);
        endif;
        echo 'просмотр одной новости!<br>';
        echo $category.'<br>';
        echo $id;
    }
}
