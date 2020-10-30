<?php


class UserController{
    
public function actionRegister(){
    
    if(isset($_POST['submit'])):
        
        
        $name = '';
        $password = '';
        $email =  '';
        
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $errors = false;
        
        if (!User::checkName($name)):
            $errors[] = 'имя не должно быть меньше двух символов';
        endif;
        if (!User::checkEmail($email)):
            $errors[] = 'email ne должen быть меньше двух символов';
        endif;
        if (!User::checkPassword($password)):
            $errors[] = 'password не должen быть меньше двух символов';
        endif;
        
        if(User::checkEmailExist($email)):
             $errors[] = 'this email used chage it !';
        endif;
    endif;
    
    
    
    if($errors == false):
        $result = User::register($name, $email, $password);
    endif; 
    
    
    
    require_once ROOT.'/views/user/register.php';
    return 'true';   
}
public function actionLogin()
    {
        $email = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
                        
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet/"); 
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    
   
//      Удаляем данные о пользователе из сессии
    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }
}


