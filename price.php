<?php

	require'template/header.html';
    require'system/function.php';
    require'system/link.php';
    $q = 'SELECT * FROM `products`';
    $res = mysqli_query($link, $q);
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>
<link rel="stylesheet" href="css/main.css">
<main class="catalog-list">
    <div class="catalog">
    <?php
    foreach($data as $d){
        echo '<div class="price-list">
                <h3 class="title">'.$d['title'].'</h3>
                <a href="page.php?id='.$d['id'].'"><img src="files/cover/'.$d['img'].'" alt="aaa"  class="link-page"></a>
                <p class="price">'.$d['price'].' руб</p>
            </div>';
        }
    ?>
        
    </div>
</main>
