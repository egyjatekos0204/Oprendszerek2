<?php
require_once DATABASE_CONTROLLER;

if(isset($_POST['edit'])):
	$query = "UPDATE restaurants SET name = :name , szall_ido = :szall_ido , szall_dij = :szall_dij , ertekeles_ossz = :ertekeles_ossz , ertekelok_szama = :ertekelok_szama , cityId = :cityId WHERE id = :id";
	$params = [ 
	':name' => $_POST['name'],
	':szall_ido' => $_POST['szall_ido'],
	':szall_dij' => $_POST['szall_dij'],
	':ertekeles_ossz' => $_POST['ertekeles_ossz'],
	':ertekelok_szama' => $_POST['ertekelok_szama'],
	':cityId' => $_POST['cityId'],
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
	$query = "SELECT * FROM restaurants WHERE id = :id";
	$params = [':id' => $_GET['id']];
	$d = getRecord($query,$params);
	?>

<div class="container-fluid p-4">
	<form method="POST">
		<input type="hidden" name="id" value="<?=$d['id']?>">
		<div class="form-group">
			<label >Név</label>
			<input name="name" type="text" class="form-control" value="<?=$d['name']?>">
		</div>
		<div class="form-group">
			<label >Szállítási idő</label>
			<input name="szall_ido" type="text" class="form-control" value="<?=$d['szall_ido']?>">
		</div>
		<div class="form-group">
			<label >Szállítási díj</label>
			<input name="szall_dij" type="text" class="form-control" value="<?=$d['szall_dij']?>">
		</div>
		<div class="form-group">
			<label >Értékelés összesen</label>
			<input name="ertekeles_ossz" type="text" class="form-control" value="<?=$d['ertekeles_ossz']?>">
		</div>
		<div class="form-group">
			<label >Értékelők száma</label>
			<input name="ertekelok_szama" type="text" class="form-control" value="<?=$d['ertekelok_szama']?>">
		</div>
		<div class="form-group">
			<label >Város id</label>
			<input name="cityId" type="text" class="form-control" value="<?=$d['cityId']?>">
		</div>
		<button name="edit" type="submit" class="btn btn-primary">Frissítés</button>
	</form>
</div>
<?php endif;?>