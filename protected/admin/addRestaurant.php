<?php
require_once DATABASE_CONTROLLER;

if(isset($_POST['edit'])):
	$query = "INSERT INTO restaurants (name, szall_ido, szall_dij, ertekeles_ossz, ertekelok_szama, cityId) VALUES (:email, :szall_ido, :szall_dij, :ertekeles_ossz, :ertekelok_szama, :cityId)";
	$params = [ 
	':name' => $_POST['name'],
	':szall_ido' => $_POST['szall_ido'],
	':szall_dij' => $_POST['szall_dij'],
	':ertekeles_ossz' => $_POST['ertekeles_ossz'],
	':ertekelok_szama' => $_POST['ertekelok_szama'],
	':cityId' => $_POST['cityId']];
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
			<input type="hidden" name="id">
			<div class="form-group">
				<label >Étterem neve</label>
				<input name="name" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label >Szállítási idő</label>
				<input name="szall_ido" type="text" class="form-control" >
			</div>
			<div class="form-group">
				<label >Szállítási díj</label>
				<input name="szall_dij" type="text" class="form-control" >
			</div>
			<div class="form-group">
				<label >Értékelés összesen</label>
				<input name="ertekeles_ossz" type="text" class="form-control" >
			</div>
			<div class="form-group">
				<label >Értékelők száma</label>
				<input name="ertekelok_szama" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label >Város id</label>
				<input name="cityId" type="text" class="form-control">
			</div>
			<button name="edit" type="submit" class="btn btn-primary">Hozzáadás</button>
		</form>

	</div>
	<?php endif;?>