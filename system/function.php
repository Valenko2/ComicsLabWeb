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

?>