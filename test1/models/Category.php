<?php

class Category {
    public static function getCategoryList(){
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT id, name FROM lesson11_db.product_categories
                ORDER BY sort_order ASC');
        $i = 0 ;
        while ($row = $result->fetch()):
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        endwhile;
    return $categoryList;    
    }
}
