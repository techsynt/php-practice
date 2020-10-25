<?php
class News {
    public static function getNewsItemById($id) {
        $id = intval($id);
            if($id):
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM lesson11_db.news_category WHERE id ='.$id);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $newsItem = $result->fetch();
                return $newsItem;
        endif;
    }
    public static function getNewsList() {
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM lesson11_db.news_category');
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $newsList = array();
                $i = 0;
                
                while ($row = $result->fetch()):
                    $newsList[$i]['id'] = $row['id'];
                    $newsList[$i]['name'] = $row['name'];
                    $newsList[$i]['description'] = $row['desctiption'];
                    $i++;
                endwhile;
                return $newsList;
    }
}
