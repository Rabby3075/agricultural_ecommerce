<?php
//include'../model/dbconnect.php';
include'../model/registrationdb.php';

$name = $fname = $mname = $gender= $religion = $dob = $phone = $nid = $uname = $pass = "";
$success = $error = "";
$flag = false;
$destination = "../upload/";
$fileName = $_FILES['image']['name'];
$tempFile = $_FILES['image']['tmp_name'];
$target_file = $destination . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }

if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (empty($_POST['name'])) {
        echo "Name Required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['fname'])) {
        echo "Father name required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['mname'])) {
        echo "Mother name required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['gender'])) {
        echo "Gender selection required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['religion'])) {
        echo "Religion required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['dob'])) {
        echo "Date of Birth required";
        echo "<br>";
    }
    if (empty($_POST['phone'])) {
        echo "Phone no required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['nid'])) {
        echo "NID required";
        echo "<br>";
        $flag = true;
    }
    
    if (empty($_POST['uname'])) {
        echo "Username required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['email'])) {
        echo "Email required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['pass'])) {
        echo "Password required";
        echo "<br>";
        $flag = true;
    }
    if (empty($_POST['cpass'])) {
        echo "Confirm Password required";
        echo "<br>";
        $flag = true;
    }
    
    if (strcmp($_POST['pass'],$_POST['cpass'])!=0) {
        echo "Password and Confirm password doesn't match";
        echo "<br>";
        $flag = true;
    }
    if (strlen($_POST['pass'])<8) {
        echo "Please give atleast 8 digit password";
        echo "<br>";
        $flag = true;
    }
    if ($imageFileType != "jpg") {
        echo "Sorry, only JPG files are allowed.";
        echo "<br>";
        $flag = true;
    }
    if (strlen($_POST['phone'])!=11) {
        echo "Invalid Phone Number";
        echo "<br>";
        $flag = true;
    }

}
if (!$flag) {
    $name = input_data($_POST['name']);
    $fname = input_data($_POST['fname']);
    $mname = input_data($_POST['mname']);
    $gender = input_data($_POST['gender']);
    $religion = input_data($_POST['religion']);
    $dob = input_data($_POST['dob']);
    $phone = input_data($_POST['phone']);
    $nid = input_data($_POST['nid']);
    $uname = input_data($_POST['uname']);
    $email = input_data($_POST['email']);
    $pass = input_data($_POST['pass']);
//sleep(40);
    $check = get($uname);
    if (!$check){
        $result = register($name,$fname,$mname,$gender,$religion,$dob,$phone,$nid,$uname,$email,$pass,$fileName);
        if ($result) {
            echo"<h2 style='color: green;'>Registration done successfully</h2>";
            move_uploaded_file($tempFile, $destination . "" . $fileName);
        }
        else{
            echo "<h2 style='color: green;'>Registration Failed</h2>";
        }
    }
    else{
        echo "<h2 style='color: red;'>User already exist</h2>";
    }

}
?>