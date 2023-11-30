<?php require "../config/config.php";?>
<?php require "../libs/App.php";?>
<?php require "layouts/header.php";?>

<?php
      if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to the landing page
        echo "<script>window.location.href='".ADMINURL."'</script>";
        exit;
    }
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM items WHERE id='$id'"; 
        
        $one = $app->selectOne($query);

        unlink("itemimages/" . $one->image);

        $query = "DELETE FROM items WHERE id='$id'";
        $app = new App;

        $path = "showitems.php";
        $app->delete($query, $path);
    } 
?>