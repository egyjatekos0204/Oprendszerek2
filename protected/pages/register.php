
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Regisztráció</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="registerUsername">Felhasználónév</label>
            <input type="text" class="form-control" id="inputRegisterUsername" name="inputRegisterUsername" aria-describedby="userHelp">            
          </div>
          <div class="form-group">
            <label for="registerEmail">Email cím</label>
            <input type="email" class="form-control" id="inputRegisterEmail" name="inputRegisterEmail" aria-describedby="emailHelp">            
            <label for="registerEmail1">Email cím mégegyszer</label>
            <input type="email" class="form-control" id="inputRegisterEmail1" name="inputRegisterEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="registerPassword">Jelszó</label>
            <input type="password" class="form-control" id="inputRegisterPassword" name="inputRegisterPassword">
            <label for="registerPassword1">Jelszó mégegyszer</label>
            <input type="password" class="form-control" id="inputRegisterPassword1" name="inputRegisterPassword1">
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input"value="true" name="yes">
            <label class="form-check-label">Elolvastam és elfogadom a felhasználási feltételeket!</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
          <button type="submit" name="regisztracio" class="btn btn-primary" id="elkuldes">Regisztráció</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 

if(isset($_POST['regisztracio']))
{
    //Adatbázis müveletek importálása
  require_once PROTECTED_DIR.'database.php';

    //Mezők ellenörzése
  $username = test_input($_POST['inputRegisterUsername']);
  $email = test_input($_POST['inputRegisterEmail']);
  $email1 = test_input($_POST['inputRegisterEmail1']);
  $password = test_input($_POST['inputRegisterPassword']);
  $password1 = test_input($_POST['inputRegisterPassword1']);


  // Hibák összegyüjtése
  $hiba = "";
  if(!isset($_POST['yes']))
    $hiba .= "Kérled fogadd el a felhasználási feltételeket!";
  if (empty($email) || empty($email1) || empty($password) || empty($password1) || empty($username))
    $hiba .= "Kérlek tölts ki minden mezőt! <br>";
  if($email != $email1)
    $hiba .= "A két email nem egyezik meg! <br>";
  if($password != $password1)
    $hiba .= "A két jelszó nem egyezik meg! <br>";

  
  if(!getConnection()){
    echo 'Sikertelen a csatlakozás!';
  }

  $query = "SELECT email FROM users WHERE email=:email";
  $server = getField($query,[":email" => $email]);

  if($server != "") $hiba .= "Ez az emailcím már foglalt!";

  if($hiba != ""){
    echo '<div class="alert alert-danger alert-dismissible fade show succRegister" role="alert">
  <strong>Sikertelen regisztráció!</strong> '.$hiba.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  else {
      // Kódolás
    $codedpass = sha1($password);
    $query = "INSERT INTO users (username,email, password) VALUES (:username, :email, :password)";
    if(executeDML($query, [":username" => $username,":email" => $email, ":password" => $codedpass])){
      echo '<div class="alert alert-success alert-dismissible fade show succRegister" role="alert">
  <strong>Sikeres regisztráció!</strong> Most már bejelentkezhet.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
  }

}

?>

