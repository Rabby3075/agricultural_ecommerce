<?php
include'../model/dbconnect.php';
function login($userName,$password){
   
    $conn = connect();
    $query = $conn->prepare("SELECT * FROM admin_reg WHERE uname = ? and pass = ?");
    $query->bind_param("ss",$userName,$password);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_assoc();
   
  
}

?>