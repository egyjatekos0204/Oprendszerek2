
<!--

Aktuális-Rendelések:
    id
    userid
    restaurantid
    rendelesek
    status



-->

<?php
require_once DATABASE_CONTROLLER;

if (getConnection()):
    if($_SESSION['flags'] > 5){
      $query = "SELECT * FROM rendelesek WHERE status = 0";
      $params = [];
    }
    else {
      $query = "SELECT * FROM rendelesek WHERE restaurantid = :restaurantid and status = 0";
      $params = [ ':restaurantid' => $_SESSION['userid']];
    }
    
    $rendelesek = getList($query,$params);

    $usernames = [];

    for ($i=0; $i < count($rendelesek); $i++) { 
      $query = "SELECT username FROM users WHERE id = :id";
      $params1 = [':id' => $rendelesek[$i]['userid']];
      $username = getField($query, $params1) ? getField($query, $params1) : null;
      $usernames[] = $username;
    }
    

    //var_dump($rendelesek);
    //var_dump($usernames);
?>
<div class="container mt-3">
  <table class="table table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ügyfél</th>
        <th scope="col">Rendelés(ek)</th>
        <th scope="col">&nbsp; </th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php for ($i=0; $i < count($rendelesek); $i++):?>
      <tr>
        <th scope="row"><?=$i+1?></th>
        <td>
        <?php
        if($usernames[$i] != ""){
          printf($usernames[$i]);
        }
        else {
          printf('<span style="color: red;">Törölt felhasználó</span>');
        }
        ?>
        
        </td>
        <td><?=$rendelesek[$i]['rendelesek']?></td>
        <td><a class="btn btn-success" href="index.php?P=orderReady&id=<?=$rendelesek[$i]['id']?>" >Elkészült</a></td>
        <td><a class="btn btn-danger" href="index.php?P=orderDelete&id=<?=$rendelesek[$i]['id']?>" >Rendelés törlése</a></td>
      </tr>
      <?php endfor;endif;?>
    </tbody>
  </table>
</div>
