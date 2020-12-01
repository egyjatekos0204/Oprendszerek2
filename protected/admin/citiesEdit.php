<?php
require_once DATABASE_CONTROLLER;

if(isset($_POST['edit'])):
	$query = "UPDATE cities SET Name =:nev WHERE cid = :id";
	$params = [ 
		":nev" => $_POST["Name"],
		":id" => $_POST["cid"]];
	if(!executeDML($query,$params)):
		echo 'Gebasz van<br>';
		print_r($_POST);
		echo '<br>';
		print_r($params);
	else:
		header('Location: index.php?P=admin');
	endif;

else:
	$query = "SELECT * FROM cities WHERE cid = :id";
	$params = [':id' => $_GET['id']];
	$d = getRecord($query,$params);
	?>

<div class="container-fluid p-4">
    <form method="POST">
        <input type="hidden" name="cid" value="<?=$d['cid']?>">
        <div class="form-group">
            <label >Város neve</label>
            <input name="Name" type="text" class="form-control" value="<?=$d['Name']?>">
        </div>
        <button name="edit" type="submit" class="btn btn-primary">Frissítés</button>
    </form>
</div>
<?php endif;?>