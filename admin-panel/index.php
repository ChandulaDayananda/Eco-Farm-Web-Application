<?php require "../config/config.php";?>
<?php require "../libs/App.php";?>
<?php require "layouts/header.php";?>

<?php
  $app = new App;
  $app->validateSessionAdminInside();

  $query = "SELECT COUNT(*) AS count_items FROM items";
  $count_items = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_orders FROM orders";
  $count_orders = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_consultations FROM consultations";
  $count_consultations = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_admins FROM admins";
  $count_admins = $app->selectOne($query);
?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Items</h5>
              <p class="card-text">number of items: <?php echo $count_items->count_items;?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?php echo $count_orders->count_orders;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Consultations</h5>
              
              <p class="card-text">number of consultations: <?php echo $count_consultations->count_consultations;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Officers</h5>
              
              <p class="card-text">number of Officers: <?php echo $count_admins->count_admins;?></p>
              
            </div>
          </div>
        </div>
      </div>
<?php require "layouts/footer.php";?>