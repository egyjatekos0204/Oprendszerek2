<?php

if($_SESSION['flags'] == 3 || $_SESSION['flags'] > 5 ){
    require_once DATABASE_CONTROLLER;

    if(isset($_GET['id']) && $_GET['id'] != ""){
        $query = "DELETE FROM rendelesek WHERE id = :id";
        $params = [':id' => $_GET['id']];

        if(!executeDML($query, $params)){
            echo 'Hiba történt a rendelés törlése során!';
        }
        else {
            header('Location: index.php?P=orders');
        }
    }
    else {
        header('Location: index.php');
    }
   

}




?>