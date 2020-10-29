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
}

