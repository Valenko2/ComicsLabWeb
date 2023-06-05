<?php
session_start();

require'template/header.html';
require'system/function.php';
require'system/link.php';

if(isset($_POST['go'])){

    $errors = array();
    //логин

    if($_POST['email'] == '' ){
        $errors[] = "Почта введена не корректно"; 
    }
    $q = 'SELECT * FROM `users` WHERE `email` = "'.$_POST['email'].'" ';
    $res = mysqli_query($link, $q);
    $us = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if( $us != ''){
        $errors[] = "пользователь с такой почтой уже существует"; 
    }

    if(mb_strlen($_POST['password']) < 5 ){
        $errors[] = 'пароль должен быть больше 5 символов';
    }
    if($_POST['password2'] != $_POST['password']){
        $errors[] = 'повторный пароль не совпадает';
    }
    
    if(empty($errors)){
            $rand = mt_rand(1111, 9999);
            $_SESSION['rand'] = $rand;
            $m = array($_POST['password'], $_POST['email'] );
            $_SESSION['time_user'] = $m;
            

            $email = $_POST['email'];
            header('location: pass.php ');
    }else{
       
        alerts($errors);
       
    }

}

?>


<link rel="stylesheet" href="css/main.css">
<main class="register">
    <form method="POST" class="reg_form">
        <p><input type="email" placeholder="введите электроную почту" name="email" class="input" ></p>
        <p><input type="password" placeholder="введите пароль" name="password" class="input"></p>
        <p><input type="password" placeholder="введите пароль повторно" name="password2" class="input"></p>
        <button type="submit" name="go" class="regs">Регистрация</button>
    </form>
</main>
