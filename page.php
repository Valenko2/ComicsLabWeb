<?php
    require'template/header.html';
    require'system/function.php';
    require'system/link.php';
    $q = 'SELECT * FROM `products` WHERE id = "'.$_GET["id"].'"';
    $res = mysqli_query($link, $q);
	$data = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>

<link rel="stylesheet" href="css/main.css">
<main class="product-desk">
    <div class="info">
        <div class="aplication">
            <img src="files/cover/<?php echo $data[0]['img']?>" alt="Comics" class="info-img">
            <div class="prompt-info">
                <p>Жанры: <?php echo $data[0]['tegs']?></p>
                <p class="price-info"><?php echo $data[0]['price']?> руб</p>
            </div>
        </div>
    </div>
    <div class="content">
        <h1 class="title-desk"><?php echo $data[0]['title'] ?></h1>
        <p class="desk"><?php echo $data[0]['desk'] ?></p>
        <h5 class="data"> Дата выхода: <?php echo $data[0]['data'] ?></h5>
        <p class="Comicslab">комикс создан командой Comicslab все права на него пренадлежат только ему</p>
    </div>
</main>