<?php

session_start();

if (isset($_POST['login_admin'])) {

    include('server1.php');

    $fname = $_POST['fname'];
    $password = $_POST['password'];
    $passworduse = ($password);

    $query = "SELECT * FROM admins WHERE admin_fname = '$fname' AND admin_password = '$passworduse'";
    $result = mysqli_query($conn, $query);

    echo $fname . $password ;
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION['adminid'] = $row['admin_id'];
        $_SESSION['admin'] = $row['admin_fname'] . " " . $row['admin_lname'];

        if(mysqli_num_rows($result) == 1){
            $_SESSION['admin']= $fname;
            $_SESSION['success'] = "Your are now logged in";
            header("location: ../admin/booking/booking.php");
        }else{
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username/password try again";
            header("location: loginadmin.php");
        }
    } else {
    
        $_SESSION['error'] = "Wrong firstname/password try again";
        header("location: loginadmin.php");
    }
}