<?php
session_start();

require'template/header.html';
require'system/link.php';
require'system/function.php';

varDump($_SESSION['rand']);
$errors = array();

if(isset($_POST['go'])){
    if($_POST['emailPass'] == $_SESSION['rand']){

       $pass = password_hash($_SESSION['time_user'][0], PASSWORD_DEFAULT);

        $q = 'INSERT INTO `users` (`password`, `email`) VALUES ("'.$pass.'", "'.$_SESSION['time_user'][1].'")';
         mysqli_query($link, $q);
        $_SESSION['user'] = $_SESSION['time_user'];
        header('location: index.html');
    }else{
        $errors[] = "Код введен не верно";
        alerts($errors);
    }
}

?>

<main class="register">
    <form method="POST" class="reg_form">
            <input type="text" name="emailPass" class="input" placeholder="введите код из сообщения">
            <button type="submit" name="go" class="regs">Отправить</button>
            <p class="prompt">
                Если вы не получили код убедитесь, что вы правильно указали <a href="reg.php">почту</a> , также проверьте не попало ли сообщение в спам.
                Если все правильно но сообщения нету то попробуйте пройти форму заново, возможно произошла ошибка.
            </p>
    </form>
</main>