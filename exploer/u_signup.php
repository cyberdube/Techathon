<?php  
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conn.php';
    $username = $_POST["uname"];
    $email = $_POST["uemail"];
    $pass = $_POST["upassword"];
    // $cpass = $_POST["cpassword"];
    // check whether this username exist.
    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Username already exist";
    }
    else{
        // if ($pass) {
             $sql = "INSERT INTO `users` ( `name`, `email`, `password`, `time`) VALUES ('$username', '$email', '$pass', current_timestamp())";
             $result = mysqli_query($conn, $sql);
             if ($result) {
                  $showError = true;
                  header("location: index.html#login?signupsuccess=true");
                  exit();
             }
        // }
        // else{
        //     $showError = "Password does't match.";
        // }
    }
    header("location: index.html#?signupsuccess=false&error=$showError");
}
?>