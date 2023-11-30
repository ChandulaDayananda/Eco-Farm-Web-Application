<?php require "config/config.php";?>
<?php require "libs/App.php";?>
<?php require "includes/header.php";?>

<?php
      if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to the landing page
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }
?>


    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $date_consultation = $_POST['date_consultation'];
            $consultation_area = $_POST['consultation_area'];
            $description = $_POST['description'];
            $status = "Pending";
            $user_id = $_SESSION['user_id'];
            
            if($date_consultation > date("m/d/Y h:i:sa")){
                $query = "INSERT INTO consultations (name,email,date_consultation,consultation_area,description,status,user_id) 
                        VALUES (:name, :email, :date_consultation, :consultation_area, :description, :status, :user_id)";
    
                $arr = [
                    ":name" => $name,
                    ":email" => $email,
                    ":date_consultation" => $date_consultation,
                    ":consultation_area" => $consultation_area,
                    ":description" => $description,
                    ":status" => $status,
                    ":user_id" => $user_id,
                ];
    
                $path = "contact.php";
        
                $app->insert($query,$arr,$path);
            } else {
                echo "<script>alert('Invalid date pick a date starting from tomorrow')</script>";
                echo "<script>window.location.href='contact.php'</script>";
            }
        }
    ?>
<?php require "includes/footer.php";?>