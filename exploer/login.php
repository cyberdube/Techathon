<?php 

session_start(); 

include "conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $user = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($user)) {

        header("Location: login.html?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.html?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE email='$user' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $user && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                // $_SESSION['email'] = $row['email'];

                $_SESSION['password'] = $row['password'];

                header("Location: meeting.php");

                exit();

            }else{

                header("Location: index.html#login?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.html#login?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.html#login");

    exit();

}