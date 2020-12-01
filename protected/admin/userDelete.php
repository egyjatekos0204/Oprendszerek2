<?php
if($_SESSION['flags'] > 5){
	require_once DATABASE_CONTROLLER;

	$query = "DELETE FROM users WHERE id = :id";
	$params = [':id' => $_GET['id']];
	if(!executeDML($query,$params))
	{
		echo 'Hiba történt a törlés során!';
	}

	else {
		header('Location: index.php?P=admin');
	}

}
else {
	header('Location: index.php');
}
?>