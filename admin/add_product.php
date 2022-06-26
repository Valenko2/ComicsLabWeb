<?php
     require 'header.php';
     require '../system/function.php';
     require '../system/link.php';

    $img_file = array('jpg', 'jpeg', 'gif', 'png');
    $zip = array('zip');

    if(isset($_POST['go'])){
        $success = array();
        $errors = array();
        $tmp_name = $_FILES['unfile']['tmp_name'];
        $file_name =  $_FILES['unfile']['name'];
        $file_ext = getFileExt($file_name);
        $newName = generaterFileName($file_name);

        $tmp_zip = $_FILES['pages']['tmp_name'];
        $zip_name =  $_FILES['pages']['name'];
        $zip_ext = getFileExt($file_name);
        $newName = generaterFileName($file_name);


        if(!in_array($file_ext, $img_file)){
            $errors[] = 'выберите другугю обложку';
        }
        if(!in_array($file_ext, $img_file)){
            $errors[] = 'зип не корректный';
        }
        if($_POST['title'] == ''){
            $errors[] = 'введите название ';
        }
        if(empty($errors)){
            $newName = generaterFileName($file_name);
            $zipName = generaterFileName($zip_name);
            move_uploaded_file($tmp_name, "../files/cover/" . $newName);
            move_uploaded_file($tmp_zip, "../files/" . $zipName);
            $q = "INSERT INTO `products` ( `title`, `price`, `desk`, `img`, `flouder`, `data`, `tegs`)
             VALUES ( '".$_POST['title']."', '{$_POST["price"]}', '".$_POST['content']."', '".$newName."', '".$zipName."', '2022-06-15', '".$_POST['tegs']."')";
            $res = mysqli_query($link, $q);
            if($res){
                $success[] = 'Товар добавлен';
                alerts_bootstrap('success', $errors);
            }
        }else{
            alerts_bootstrap('danger', $errors);
        }
           

    }
?>

<main class="flex-shrink-0">
        <div class="container">
            <a  class="btn btn-success mt-3" href="product.php">назад</a>
            <h1 class="mt-5">Добавить продукт</h1>

            <form method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Цена (в рублях)</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea  name="content" class="form-control" rows="3" ></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Файл обложки</label>
                    <input type="file" name="unfile" class="form-control" placeholder="введите url">
                </div>
                <div class="mb-3">
                    <label class="form-label">Зип файл со страницами </label>
                    <input type="file" name="pages" class="form-control" placeholder="введите url">
                </div>                <div class="mb-3">
                    <label class="form-label">Теги писать через запятую с пробелами, пример: хорро, комедия</label>
                    <input type="text" name="tegs" class="form-control" placeholder="введиет название" >
                </div>

               <button type="submit" class="btn btn-primary" name="go">Загрузить</button>
            </form>
        </div>
    </main>