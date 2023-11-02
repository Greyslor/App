<?php 
    session_start();
?>

<html>

<head>
<link rel="stylesheet" href="style.css">

</head>
<body>
<?php 
    if(!empty($_SESSION["user"]))
    {
        echo "<h1>Welcome ".$_SESSION["user"]."</h1>";
    }
    else
    {
    ?>
    Welcome stranger, <a href="/login.php" class=login>inicia sesión</a>
    <?php
    }
?>
</body>

</html>