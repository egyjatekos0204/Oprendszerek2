<?php
require_once DATABASE_CONTROLLER;

if(isset($_POST['edit'])):
	$query = "UPDATE users SET username=:username, email=:email,flags=:flags WHERE id = :id";
	$params = [ 
	':username' => $_POST['username'],
	':email' => $_POST['email'],
	':flags' => $_POST['flags'],
	':id' => $_POST['id']];
	if(!executeDML($query,$params)):
		echo 'Gebasz van<br>';
		print_r($_POST);
		echo '<br>';
		print_r($params);
	else:
		header('Location: index.php?P=admin');
	endif;

else:
	$query = "SELECT * FROM users WHERE id = :id";
	$params = [':id' => $_GET['id']];
	$d = getRecord($query,$params);
	?>


<div class="container-fluid p-4">
    <form method="POST">
        <input type="hidden" name="id" value="<?=$d['id']?>">
        <div class="form-group">
            <label >Felhasználónév</label>
            <input name="username" type="text" class="form-control" value="<?=$d['username']?>">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input name="email" type="text" class="form-control" value="<?=$d['email']?>">
        </div>
        <div class="form-group">
            <label >Jogok</label>
            <input name="flags" type="text" class="form-control" value="<?=$d['flags']?>">
        </div>
        <button name="edit" type="submit" class="btn btn-primary">Frissítés</button>
    </form>
</div>
<?php endif;?>