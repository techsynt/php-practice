<?php

class User {
    
    public static function checkName($name){
        if(strlen($name) >= 2):
            return true;
        else:
            return false;
        endif;
    }
        public static function checkPassword($password){
        if(strlen($password) >= 6):
            return true;
        else:
            return false;
        endif;
    }
        public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;
        else:
            return false;
        endif;
    }
    
    public static function checkEmailExist($email){
        $db = Db::getConnection();
        $request = 'SELECT COUNT(*) FROM lesson11_db.user WHERE email = :email';
        $result  = $db->prepare($request);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn()):
            return true;
        else:
            return false;
        endif;
    }
    
    public static function register($name, $password, $email) {
        $db = Db::getConnection();
        $sql = 'INSERT INTO lesson11_db.user (name, email, password) '
                .'VALUES (:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name , PDO::PARAM_STR);
        $result->bindParam(':email', $email , PDO::PARAM_STR);
        $result->bindParam(':password', $password , PDO::PARAM_STR);
        return $result->execute();
    }
}

