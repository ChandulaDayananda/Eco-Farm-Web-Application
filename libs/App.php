<?php

    class App{
        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $pass = PASS;

        public $link;

        //Create Constructor
        public function __construct(){
        $this->connect();
        }

        public function connect(){
            $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user, $this->pass);

            
        }

        //Select All
        public function selectAll($query){
            $rows = $this->link->query($query);
            $rows->execute();

            $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

            if($allRows){
                return $allRows;
            }else{
                return false;
            }
        }

        //Select One Row
        public function selectOne($query){
            $row = $this->link->query($query);
            $row->execute();

            $singleRow = $row->fetch(PDO::FETCH_OBJ);

            if($singleRow){
                return $singleRow;
            }else{
                return false;
            }
        }

        //Validate Cart
        public function validateCart($q){
            $row=$this->link->query($q);
            $row->execute();
            $count=$row->rowCount();
            return $count;
        }

        //Insert Query
        public function insert($query,$arr,$path){
            if($this->validate($arr) == "empty"){
                echo "<script> alert('one or more inputs are empty')</script>";
            }else{
                $insert_record = $this->link->prepare($query);
                $insert_record->execute($arr);

                echo "<script>window.location.href='".$path."'</script>";
            }
        }

        //Update Query
        public function update($query,$arr,$path){
            if($this->validate($arr) == "empty"){
                echo "<script> alert('one or more inputs are empty')</script>";
            }else{
                $update_record = $this->link->prepare($query);
                $update_record->execute($arr);

                header("location: ".$path."");
            }
        }

        //Delete Query
        public function delete($query,$path){
            $delete_record = $this->link->prepare($query);
            $delete_record->execute($arr);

            echo "<script>window.location.href='".$path."'</script>";
        }

        //Validate
        public function validate($arr){
            if(in_array("",$arr)){
                echo "empty";
            }
        }

        //Register
        public function register($query,$arr,$path){
            if($this->validate($arr) == "empty"){
                echo "<script> alert('one or more inputs are empty')</script>";
            }else{
                $register_user = $this->link->prepare($query);
                $register_user->execute($arr);

                header("location: ".$path."");
            }
        }

        //Login
        public function login($query,$data,$path){
            //Email Validation
            $login_user = $this->link->query($query);
            $login_user->execute();

            $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

            //Passowrd Validation
            if($login_user->rowCount() > 0) {
                if(password_verify($data['password'],$fetch['password'])){
                    //Start Session Vars
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['user_id'] = $fetch['id'];

                    header("location: ".$path."");
                }
            }
        }

        //Starting Session
        public function startingSession(){
            session_start();
        }

        //Validating Sessions
        public function validateSession(){
            if(isset($_SESSION['user_id'])){
                // header("location: ".APPURL."");
                echo "<script>window.location.href='".APPURL."'</script>";
            }
        }

        public function validateSessionAdmin(){
            if(isset($_SESSION['email'])){
                // header("location: ".APPURL."");
                echo "<script>window.location.href='".ADMINURL."/index.php'</script>";
            }
        }

        public function validateSessionAdminInside(){
            if(!isset($_SESSION['email'])){
                // header("location: ".APPURL."");
                echo "<script>window.location.href='".ADMINURL."/adminlogins.php'</script>";
            }
        }
    }
?>