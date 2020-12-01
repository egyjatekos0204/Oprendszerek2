<?php
require_once DATABASE_CONTROLLER;

if(isset($_POST['edit'])):
	$query = "INSERT INTO users (username,email,password,flags) VALUES (:username, :email, :password, :flags)";
	$params = [ 
	':username' => $_POST['username'],
	':email' => $_POST['email'],
	':password' => sha1($_POST['password']),
	':flags' => $_POST['flags']];
	if(!executeDML($query,$params)):
		echo 'Gebasz van<br>';
		print_r($_POST);
		echo '<br>';
		print_r($params);
	else:
		header('Location: index.php?P=admin');
	endif;

else:
	?>
	<div class="container-fluid p-4">
		<form method="POST">
			<div class="form-group">
				<label >Felhasználónév</label>
				<input name="username" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label >Email</label>
				<input name="email" type="email" class="form-control" >
			</div>
			<div class="form-group">
				<label >Jelszó</label>
				<input name="password" type="password" class="form-control" >
			</div>
			<div class="form-group">
				<label >Jogok</label>
				<input name="flags" type="text" class="form-control" >
			</div>
			<button name="edit" type="submit" class="btn btn-primary">Hozzáadás</button>
		</form>

	</div>
	<?php endif;?>