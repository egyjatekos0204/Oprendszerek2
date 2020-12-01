<?php
	$query = "SELECT * FROM restaurants";
	$datas = getList($query);
	
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Név</th>
      <th scope="col">Szállítási idő</th>
      <th scope="col">Szállítási díj</th>
      <th scope="col">Értékelés összesen</th>
      <th scope="col">Értékelők száma</th>
      <th scope="col">Város id</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$i = 1;
  	foreach ($datas as $d):
  		?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$d['name']?></td>
      <td><?=$d['szall_ido']?></td>
      <td><?=$d['szall_dij']?></td>
      <td><?=$d['ertekeles_ossz']?></td>
      <td><?=$d['ertekelok_szama']?></td>
      <td><?=$d['cityId']?></td>
      <td><a href="<?='index.php?P=restaurantEdit&id='.$d['id']?>">Szerkesztés</a></td>
      <td><a href="<?='index.php?P=restaurantDelete&id='.$d['id']?>">Törlés</a></td>
    </tr>
<?php $i++;endforeach;?>
  </tbody>
</table>