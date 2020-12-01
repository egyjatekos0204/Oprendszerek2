<?php
	$query = "SELECT * FROM cities";
	$datas = getList($query);
	
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Név</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$i = 1;
  	foreach ($datas as $d):
  		?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$d['Name']?></td>
      <td><a href="<?='index.php?P=citiesEdit&id='.$d['cid'] ?>">Szerkesztés</a></td>
      <td><a href="<?='index.php?P=citiesDelete&id='.$d['cid'] ?>">Törlés</a></td>
    </tr>
<?php $i++;endforeach;?>
  </tbody>
</table>