<?php  
$showAlert = "false";
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conn.php';
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    // check whether this username exist.
    $existSql = "SELECT * FROM `ad_singup` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already exist";
    }
    else{
         $sql = "INSERT INTO ad_singup (`username`, `name`, `email`, `password`) VALUES ('$username', '$name', '$email', '$pass')";
         $result = mysqli_query($conn, $sql);
         if ($result) {
              $showAlert = true;
              header("location: /exploer/index.php?signupsuccess=true");
              exit();
         }
    }
    header("location: /exploer/index.php?signupsuccess=false&error=$showError");
}
?>