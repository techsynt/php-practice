<?php
class News {
    public static function getNewsItemById($id) {
        $id = intval($id);
        if($db = Db::getConnection()):
            var_dump($db);
            $result = $db->query('SELECT * FROM `news`;');
//            $result->setFetchMode(PDO::FETCH_ASSOC);
            var_dump($result);
            $newsItem = $result->fetch();
            return $newsItem;
        else:
            return 'hi';
        endif;
    }
    public static function getNewsList() {
        // request to db
    }
}
