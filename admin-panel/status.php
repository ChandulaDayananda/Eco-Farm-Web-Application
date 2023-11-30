<?php require "../config/config.php";?>
<?php require "../libs/App.php";?>
<?php require "layouts/header.php";?>

<?php
  $app = new App;

  if(isset($_GET['id'])){

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        
        // Check if the form field name matches the $_POST key
        $status = $_POST['price'];

        $query = "UPDATE orders SET status=:status WHERE id='$id'";

        $arr = [
            ":status" => $status
        ];

        $path = "showorders.php";
        $app->update($query,$arr,$path);

        header("Location: $path");
    }
  }
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Order Status</h5>
        <form method="POST" action="status.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
          <!-- Status select input -->
          <div class="form-outline mb-4 mt-4">
            <select name="price" class="form-select form-control" aria-label="Default select example">
              <option selected>Update Status</option>
              <option value="Pending">Pending</option>
              <option value="Confirmed">Confirmed</option>
            </select>
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require "layouts/footer.php";?>
