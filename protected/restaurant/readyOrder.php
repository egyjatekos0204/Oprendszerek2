<?php 

if($_SESSION['flags'] == 3 || $_SESSION['flags'] > 5 ){
    require_once DATABASE_CONTROLLER;

    if(isset($_GET['id']) && $_GET['id'] != ""){
        $query = "UPDATE rendelesek SET status = 1, rendelesElkeszult = :rendelesElkeszult WHERE id = :id";
        $date = date('Y-m-d H:i:s');
        $params = [
            ':id' => $_GET['id'],
            ':rendelesElkeszult' => $date
    ];

        if(!executeDML($query, $params)){
            echo 'Hiba történt a rendelés állapotában változtatása során!';
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