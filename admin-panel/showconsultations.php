<?php require "../config/config.php";?>
<?php require "../libs/App.php";?>
<?php require "layouts/header.php";?>

<?php
  $query = "SELECT * FROM consultations";
  $app = new App;
  $app->validateSessionAdminInside();
  $consultations = $app->selectAll($query);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">consultations</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Area</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($consultations as $consultation) : ?>
                  <tr>
                    <th scope="row"><?php echo $consultation->id; ?></th>
                    <td><?php echo $consultation->name; ?></td>
                    <td><?php echo $consultation->email; ?></td>
                    <td><?php echo $consultation->date_consultation; ?></td>
                    <td><?php echo $consultation->consultation_area; ?></td>
                    <td><?php echo $consultation->description; ?></td>
                    <td><a href="consultationstatus.php?id=<?php echo $consultation->id; ?>" class="btn btn-primary  text-center ">Status</a></td>
                    <td><?php echo $consultation->created_at; ?></td>
                     <td><a href="deleteconsultation.php?id=<?php echo $consultation->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "layouts/footer.php";?>