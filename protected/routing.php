<?php

function check_admin_flag(){
	if(isset($_SESSION['flags'])&&$_SESSION['flags'] > 5)
	{
		return true;
	}
		
}

function check_user_is_restaurant(){
	if(isset($_SESSION['flags']) && $_SESSION['flags'] == 3){
		return true;
	}
}


if(empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home':
		if(!isset($_GET['V'])){
			require_once PROTECTED_DIR.'pages/home.php';

		}
		else {
			require_once PROTECTED_DIR.'pages/ettermek.php';
		}
		require_once PROTECTED_DIR.'pages/login.php';
		require_once PROTECTED_DIR.'pages/register.php';
		require_once PROTECTED_DIR.'database.php';
		break;

	case 'logout':
		session_destroy();
		header("Location: index.php?");
		die();
		break;
		
	case 'etlap':
	require_once PROTECTED_DIR.'pages/etlap.php';
	require_once PROTECTED_DIR.'pages/login.php';
	require_once PROTECTED_DIR.'pages/register.php';
	require_once PROTECTED_DIR.'database.php';
	break;
		
	case 'admin':
		if(isset($_SESSION['flags'])&&$_SESSION['flags'] > 5){
			require_once PROTECTED_DIR.'admin/adminIndex.php';
		}
		else{
			header('Location: index.php');
		}
		break;
	case 'citiesEdit':
		if(check_admin_flag()){
			require_once PROTECTED_DIR.'admin/citiesEdit.php';
		}
		else{
			header('Location: index.php');
		}
		break;

	case 'restaurantEdit':
		if(check_admin_flag()){
			require_once PROTECTED_DIR.'admin/restaurantEdit.php';
		}
		else{
			header('Location: index.php');
		}
	break;
	
	case 'userAdd':
		if(check_admin_flag()){
			require_once PROTECTED_DIR.'admin/userAdd.php';
		}
		else{
			header('Location: index.php');
		}
		break;
	case 'userDelete':
		if(check_admin_flag()){
			require_once PROTECTED_DIR.'admin/userDelete.php';
		}
		else{
			header('Location: index.php');
		}
		break;
	case 'userEdit':
		if(check_admin_flag()){
			require_once PROTECTED_DIR.'admin/userEdit.php';
		}
		else{
			header('Location: index.php');
		}
		break;

	case 'orders':
		if(check_user_is_restaurant() || check_admin_flag()){
			require_once PROTECTED_DIR.'pages/orders.php';
		}
		else{
			header('Location: index.php');
		}
	break;
	
	case 'orderDelete':
		if(check_user_is_restaurant() || check_admin_flag()){
			require_once PROTECTED_DIR.'restaurant/deleteOrder.php';
		}
		else {
			header('Location: orders.php');
		}
	break;

	case 'orderReady':
		if(check_user_is_restaurant() || check_admin_flag()){
			require_once PROTECTED_DIR.'restaurant/readyOrder.php';
		}
		else {
			header('Location: orders.php');
		}
	break;
}
?>