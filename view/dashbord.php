<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['uname']))
{
    header('Location: ../view/login.html');
}
?>

<h2><?php echo $_SESSION['uname']; ?></h2>

<a href="../controller/logout.php">Logout</a>

</body>
</html>