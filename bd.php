<?php
    function getBD(){
        $bdd = new PDO('mysql:host=localhost;dbname=GironMania;charset=utf8',
        'root', '');
        return $bdd;
    }
?>