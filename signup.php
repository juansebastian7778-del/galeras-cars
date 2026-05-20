<?php
// signup.php
  include ('config/database.php');
    //get data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $e_mail = $_POST['email'];
    $m_phone = $_POST['phone'];
    $p_ssword = $_POST['password'];
    $enc_pass= md5($p_ssword);
    //query to insert into sql
    $sql = "INSERT INTO users (firstname, lastname, mphone, email, passwd) VALUES 
    ('$f_name', '$l_name', '$m_phone', '$e_mail', '$enc_pass')";
    //execute query
    $res_local = pg_query($local_conn, $sql);
      if($res_local){
    //echo "Listo. Usuario registrado";
      echo"<script>alert('Listo. Usuario registrado')</script>";
      
    } else {
      echo"<script>alert('Error. Usuario no registrado')</script>";
    }     
      header('refresh:0;url = login.html');
      $res = pg_query($supa_conn, $sql);
      if($res){
    //echo "Listo. Usuario registrado";
      echo"<script>alert('Listo. Usuario registrado')</script>";
      
    } else {
      echo"<script>alert('Error. Usuario no registrado')</script>";
    }     
      header('refresh:0;url = login.html');