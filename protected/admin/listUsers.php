<?php
	$query = "SELECT * FROM users";
	$datas = getList($query);
	
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Felhasználónév</th>
      <th scope="col">Email</th>
      <th scope="col">Jogok</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$i = 1;
  	foreach ($datas as $d):
  		?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$d['username']?></td>
      <td><?=$d['email']?></td>
      <td><?=$d['flags']?></td>
      <td><a href="<?='index.php?P=userEdit&id='.$d['id']?>">Szerkesztés</a></td>
      <td><a href="<?='index.php?P=userDelete&id='.$d['id']?>">Törlés</a></td>
    </tr>
<?php $i++;endforeach;?>
  </tbody>
</table>