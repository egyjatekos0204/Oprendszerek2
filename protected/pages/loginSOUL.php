<?php
// Megnézem a felhasználó bevan-e jelentkezve, és bepipálta-e a bejelentkeve maradok mezőt
if(isset($_SESSION['logged']) && !isset($_SESSION['stayLogin'])){
    //Ha több mint 30 perce jelentkezett be akkor kijelentkeztetem
  if(time() - $_SESSION['login_time'] >= 1800){
    session_destroy(); // Elpusztítom a sessiont.
    header("Location: index.php?P=logout"); // Átírányítom a kijelentkeztetős oldalra
    die(); // Lezárom az oldalt
  }
  else {        
   $_SESSION['login_time'] = time(); // Frissítem a login_time-ot az aktuális időre
   
 }
}

// Ha a bejelentkezes nevű submit gomb igaz akkor belépek
if(isset($_POST['bejelentkezes']))
{
    //Adatbázis müveletek importálása
  require_once PROTECTED_DIR.'database.php';

  if (getConnection()) {

    // Mezők ellenörzése
    $email = test_input($_POST['loginEmail']);
    $password = test_input($_POST['loginPassword']);

    if (!empty($email) || !empty($password)) {
        // Lekérdezés szövege
      $query = "SELECT email, password FROM users WHERE email=:email and password=:password";

        //Ha van eredmény akkor be tudunk jelentkezni
      if (getField($query, [":email" => $email, ":password" => sha1($password)])) {
        $query = "SELECT * FROM users WHERE email=:email and password=:password";
        $datas = getRecord($query, [":email" => $email, ":password" => sha1($password)]);

        //Session adatok betöltése
        $_SESSION['logged'] = true;
        $_SESSION['username'] =  $datas['username'];
        $_SESSION['flags'] = $datas['flags'];
        $_SESSION['login_time'] = time();
        $_SESSION['userid'] = $datas['id'];
        //Ha bepipálta a Bejelentkezve maradok-ot akkor azt is lementem
        if (isset($_POST['stayLogin'])) {
          $_SESSION['stayLogin'] = $_POST['stayLogin'];
        }
        
        // Fejlesztői ellenörző kódsorok
        // print_r($datas);
        // echo "<br>";
        // print_r($_SESSION);
      }
    }
    // Sikertelen bejelentkezés esetén feldobunk egy piros hiba ablakot
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show succRegister" role="alert">
      <strong>Kérlek adj meg minden adatot a bejelentkezéshez!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }

  }
}
?>

