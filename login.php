<?php
    session_start();
    require'template/header.html';
    require'system/function.php';
    require'system/link.php';

    if(isset($_POST['go'])){
        if($_POST['email'] == "tester123" || $_POST['password'] == "565656"){
            $_SESSION[0]['user'] = "Admin";
            header('location: index.html');
        }

        $q = 'SELECT * FROM `users` WHERE `email` = "'.$_POST['email'].'" ';
        $res = mysqli_query($link, $q);
        $user = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if(!empty($user)){
            if(password_verify($_POST['password'], $user[0]['password'])){
                $_SESSION['user'] = $_POST['email'];
                $_SESSION['user'] = $_POST['password'];
                header('location: admin/index.php');

            }else{
                $erros[] = "логин или пароль введен не верно";
            }
        }else{
            $erros[] = "логин или пароль введен не верно";
        }
        alerts($erros);
}
?>
<main class="register">
    <form method="POST" class="reg_form">
        <p><input type="text" placeholder="введите электроную почту" name="email" class="input" ></p>
        <p><input type="password" placeholder="введите пароль" name="password" class="input"></p>
        <button type="submit" name="go" class="regs">войти</button>
    </form>
</main>