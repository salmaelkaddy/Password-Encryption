<?php
error_reporting(0);
include_once 'dbConnect.php';

?>

<?php
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($connection,$_POST['Name']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $Cpassword = mysqli_real_escape_string($connection,$_POST['cpassword']);

    if($password!=$Cpassword){
        echo "Please Try Again!";
    }
    else{
        $hash = password_hash($password,PASSWORD_BCRYPT);
        $sql = "INSERT INTO `registrationdata`(`name`, `email`, `password`) VALUES ('$name','$email',' $hash')";
        mysqli_query($connection,$sql);
        header("Location: ../index.php");

    
    }
    


}



?>