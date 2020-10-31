<?php

class Product {
    const SHOW_BY_DEFAULT = 2;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT){
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();
        $result = $db->query('SELECT id, name, price, image, description, is_new FROM lesson11_db.product WHERE status = 1 LIMIT '.$count);
////            .'ORDER BY sort_order ASC'
        $i = 0 ;
        while ($row = $result->fetch()):
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['image'] = $row['image'];
            $categoryList[$i]['price'] = $row['price'];
            $categoryList[$i]['is_new'] = $row['is_new'];
            $categoryList[$i]['description'] = $row['description'];
            $i++;
        endwhile;
    return $categoryList;    
    }
    public static function getProductsListByCategory($categoryId = false, $page = 1){
        $page = intval($page);
        $offset = ($page -1) * self::SHOW_BY_DEFAULT;
        if($categoryId):
        $db = Db::getConnection();
        $productsList = array();
//        $result = $db->query('SELECT id, name, price, image, description, is_new FROM lesson11_db.product WHERE status = 1 AND category_id ='.$categoryId.' OFFSET '.$offcet);

        $result = $db->query("SELECT id, name, price, image, description, is_new FROM lesson11_db.product "
        . "WHERE status = '1' AND category_id = '$categoryId' "
        . "ORDER BY id ASC "                
        . "LIMIT ".self::SHOW_BY_DEFAULT
        . ' OFFSET '. $offset);
        $i = 0 ;
        while ($row = $result->fetch()):
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['description'] = $row['description'];
            $i++;
        endwhile;
    return $productsList;
    endif;
    }
    public static function getProductById($id) {
        $id = intval($id);
        $db =Db::getConnection();
        $result = $db->query('SELECT * FROM lesson11_db.product WHERE id =' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }
       public static function getTotalProductsInCategory($categoryId) {

        $db =Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM lesson11_db.product '
                . 'WHERE status="1" AND category_id ="'.$categoryId.'"');        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row =  $result->fetch();
        return $row['count'];
    }
       public static function getProdustsByIds($idsArray)
    {
        $products = array();
        
        $db = Db::getConnection();
        
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM lesson11_db.product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }
}
