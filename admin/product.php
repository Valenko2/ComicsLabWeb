<?php
    require 'header.php';
    require '../system/function.php';
    require '../system/link.php';
    $q = 'SELECT * FROM `products`';
    $res = mysqli_query($link, $q);
	$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>
<main class="flex-shrink-0">
		<div class="container">
			<a  class="btn btn-success mt-3" href="add_product.php ">добавить</a>

			<h1 class="mt-5">Продукты:</h1>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">файл обложки</th>
                    <th scope="col">папка страниц</th>
                    <th scope="col">дата</th>
                    <th scope="col">теги</th>
                    <th scope="col">цена</th>
                    <th scope="col">Операция</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $d){
                            echo '<tr>';
                                    echo '<th scope="row">'.$d['id'].'</th>';
                                    echo '<td>'.$d['title'].'</td>';
                                    echo '<td>'.$d['img'].'</td>';
                                    echo '<td>'.$d['flouder'].'</td>';
                                    echo '<td>'.$d['data'].'</td>';
                                    echo '<td>'.$d['tegs'].'</td>';
                                    echo '<td>'.$d['price'].'</td>';
                                    echo '<td>
                                        <a  class="btn btn-warning" href = "edit_menu.php?id='.$d["id"].'">редактировать</a>
                                        <a  class="btn btn-danger" href = "del_menu.php?id='.$d["id"].'")>удалить</a>
                                    </td>
                                </tr>';
                                
                        }
                    ?>
                </tbody>
            </table>
		</div>
	</main>
