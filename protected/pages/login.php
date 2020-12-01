
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="index.php">
        <div class="modal-header">
          <h5 class="modal-title">Bejelentkezés</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="emailInput">Email cím</label>
            <input type="email" class="form-control" name="loginEmail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Soha nem oszd meg senkivel a jelszavad!</small>
          </div>
          <div class="form-group">
            <label for="passwordInput">Jelszó</label>
            <input type="password" class="form-control" name="loginPassword">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="stayLogin" value="1">
            <label class="form-check-label" for="staylogin">Bejelentkezve maradok</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
          <button type="submit" name="bejelentkezes" class="btn btn-primary">Bejelentkezés</button>
        </div>
      </form>
    </div>
  </div>
</div>

