<?php require_once DATABASE_CONTROLLER;?>
<div class="row container-fluid mt-3">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Étterem lista</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Város lista</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Étterem hozzáadása</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Város hozzáadása</a>
      <a class="list-group-item list-group-item-action" id="list-users-list" data-toggle="list" href="#list-users" role="tab" aria-controls="settings">Felhasználók kezelése</a>
      <a class="list-group-item list-group-item-action" id="list-users-list" data-toggle="list" href="#list-add-user" role="tab" aria-controls="settings">Felhasználó hozzáadása</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><?php require_once PROTECTED_DIR.'admin/restaurantList.php';?></div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><?php require_once PROTECTED_DIR.'admin/citiesList.php';?></div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"><?php require_once PROTECTED_DIR.'admin/addRestaurant.php';?></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><?php require_once PROTECTED_DIR.'admin/addCity.php';?></div>
      <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list"><?php require_once PROTECTED_DIR.'admin/listUsers.php';?></div>
      <div class="tab-pane fade" id="list-add-user" role="tabpanel" aria-labelledby="list-users-list"><?php require_once PROTECTED_DIR.'admin/userAdd.php';?></div>
    </div>
  </div>
</div>