  
<?php

session_start();
if (isset($_SESSION['uname'])) {
session_unset();
session_destroy();


header("location: ../view/login.html");


}


else{


header("location:../view/login.html");


}


?>

