<?php

    function varDump($a){
        echo '<pre>';
        var_dump($a);
        echo '</pre>';
    }
    function alerts( $array){
        foreach ($array as $error){
            echo '<div class="danger">
                    <p class="danger_prompt">'.$error.'</p>
                  </div>';
        }
    }
    function getFileExt($name){
        $nameArr = explode('.', $name);
        $ext = array_pop($nameArr);
        $ext = strtolower($ext);
        return $ext;
    }
    function generaterFIleName($name){
        $ext = getFileExt($name);
        $time = time();
        $newName = md5($time.$name). '.' . $ext;
        return $newName;
    }
    function alerts_bootstrap($type, $array){
        foreach($array as $a){
            echo '<div class="mt-1 alert alert-'.$type.' alert-dismissible fade show" role="alert">
            '.$a.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
    }

?>