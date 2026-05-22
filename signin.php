<?php

    session_start();
    if(isset($_SESSION['users_id'])){
        header('refresh:0;url = index.php');
    }
    // Database connection
  require ("config/database.php");
    //get data from form
        $e_mail = $_POST['email'];
        $p_ssword = $_POST['password'];
        $enc_pass= md5($p_ssword);
    //query to select from sql

        $sql_login = "SELECT u.id, u.email,u.firstname ||'' || u.lastname AS full_name FROM users u WHERE u.email='$e_mail' AND u.passwd='$enc_pass'";
    //execute query
        $res = pg_query($supa_conn, $sql_login);
    if($res){
            $num = pg_num_rows($res);
            $row = pg_fetch_assoc($res);
        if($num > 0){ 
            $_SESSION['users_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['full_name'] = $row['full_name'];

            header('refresh:0;url = index.php');
    }else{
            echo"<script>alert('Email or password not found')</script>";
            header('refresh:0;url = login.html');
        }
    } else {
        echo "Query error |||. ";
    }

?>