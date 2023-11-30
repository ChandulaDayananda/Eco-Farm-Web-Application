<?php require "../config/config.php";?>
<?php require "../libs/App.php";?>
<?php require "layouts/header.php";?>

<?php
  $query = "SELECT * FROM items";
  $app = new App;
  $app->validateSessionAdminInside();
  $items = $app->selectAll($query);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Items</h5>
              <a  href="createitems.php" class="btn btn-primary mb-4 text-center float-right">Add New Items</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($items as $item) : ?>
                  <tr>
                    <th scope="row"><?php echo $item->id ;?></th>
                    <td><?php echo $item->name ;?></td>
                    <td><img style="width: 50px; height: 50px" src="../images/<?php echo $item->image ;?>"></td>
                    <td><?php echo $item->price ;?></td>
                    <td><a href="deleteitems.php?id=<?php echo $item->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "layouts/footer.php";?>