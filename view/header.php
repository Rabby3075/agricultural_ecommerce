<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    if (!isset($_SESSION['uname']))
    {
        header('Location: ../view/login.html');
    }
    ?>
<div class="header">
    <div class="logo">
        <h1>Agricultural E-Commerce</h1>
    </div>
<div class="welcome-text">
    <h1>Welcome <?php echo $_SESSION['name']; ?> </h1>
</div>
</div>

<div class="menubar">
    <ul>
        <li><a href="../view/dashbord.php">Home</a></li>
        <li><a href="">View & Update Profile</a></li>
        <li><a href="">Change Password</a></li>
        <li><a href="../controller/logout.php">Logout</a></li>
    </ul>
</div>
</body>
</html>