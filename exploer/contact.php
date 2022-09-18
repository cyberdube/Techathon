<?php

if(count($_POST)>0)
{    
     include 'contactCon.php';

     $name = $_POST['name'];
     $message = $_POST['message'];
     $email = $_POST['email'];
 
     $query = "INSERT INTO contact_us (name,message,email)
     VALUES ('$name','$message','$email')";

     mysqli_query($dbCon, $query);

     $lastId = mysqli_insert_id($dbCon);
 
     if (!empty($lastId)) {
        $message = "Your contact information is saved successfully";
     }

}
  header ("Location: index.php");
?>