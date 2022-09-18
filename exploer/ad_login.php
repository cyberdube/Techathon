<?php  
$login = "false";
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conn.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

   $sql = "SELECT * FROM ad_singup WHERE email= '$email' AND password='$password'";
   $result = mysqli_query($conn, $sql);
   $numRows = mysqli_num_rows($result);
   if($numRows==1){
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        echo "logged in". $email;
        header("location: /exploer/admin_panel.php");
    }
        else{
            $showError = "Invalid Credentials";
            header("location: /exploer/index.php?signupsuccess=false&error=$showError");
            }
}

?>
<?php
if($showError){
    echo "<script>alert('$showError,')</script>";
}
?>
<?php
if($showError){
    echo "<script>alert('Invalid credentials,')</script>";
}
?>