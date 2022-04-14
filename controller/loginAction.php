<?php
include '../model/authentic.php';
$uname = $pass = "";
$flag = false;
function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD']==="POST"){
    if (empty($_POST['uname'])){
        echo "Username required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['pass'])){
        echo "Password required";
        echo "<br>";
        $flag = true;
    }
}
if (!$flag){
    $uname = input_data($_POST['uname']);
    $pass = input_data($_POST['pass']);
    $res = login($uname,$pass);
    if($res){
        
        session_start();
        $_SESSION['name'] = $res['name'];
        $_SESSION['fname'] = $res['fname'];
        $_SESSION['mname'] = $res['mname'];
        $_SESSION['gender'] = $res['gender'];
        $_SESSION['religion'] = $res['religion'];
        $_SESSION['dob'] = $res['dob'];
        $_SESSION['phone'] = $res['phone'];
        $_SESSION['nid'] = $res['nid'];
        $_SESSION['uname'] = $uname;
        $_SESSION['email'] = $res['email'];
        $_SESSION['pass'] = $pass;
        $_SESSION['image'] = $res['image'];
        echo "<h2 style='color: green;'>Login done successfully</h2>";
        
        header("location:../view/dashbord.php");
    }
    else{
       // sleep(30);
        echo "<h2 style='color: red;'>Login Failed</h2>";
    }
}
?>