<?php
include_once 'dbConnect.php';
?>

<?php

if(isset($_POST['Login'])){
     $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
     $sql = "SELECT `password` FROM `registrationdata` WHERE `email`='$email'";
     $row = mysqli_query($connection,$sql);
     $res = mysqli_num_rows($row);
     if($res > 0){
         $data = mysqli_fetch_assoc($row);
         if(password_verify($password, $data['password'])){
            
             header("Location: home.php");
         }else{
             echo "Please check inputs!";
         }
     }else{
        echo "Please check your inputs!";
     }
}


?>