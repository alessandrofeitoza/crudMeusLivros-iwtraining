<?php
    ini_set('display_errors', 1);

    function base_url($caminho = ""){
        return "http://localhost/iw/meuslivros/$caminho";
    }

    function base_dir($caminho = ""){
        return $_SERVER['DOCUMENT_ROOT']."/iw/meuslivros/$caminho";
    }

    function redirect($caminho = ""){
        echo '<script>';
        echo "location.href='$caminho';";
        echo '</script>';
    }
?>
