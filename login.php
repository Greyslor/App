<?php
    session_start();

    if(!empty($_SESSION["user"]))
    {
        header("Location: /index.php");
        die();
    }
    
    if ( !empty($_POST["validate"]) )
    {
        if ( !empty($_POST["user"]) )
        {
                
            $user=$_POST["user"];

            if ( !empty($_POST["password"]) )
            {
                $password=$_POST["password"];

                if ($user == "hola" && $password == "mundo")
                {
                    $_SESSION["user"] = $user;

                    header("Location: /index.php");
                    die();
                }
                else
                {
                    $error = 3;
                }
            }
            else
            {
                $error = 2;
            }
        }
        else
        {
            $error = 1;
        }

    }
    else
    {
        $error = 0;
    }
?>
<html>

<head>
        
</head>
<body>
    <form class="form" action="" method="POST">
        <label class="label" for="user">Usuario</label>
        <input type="text" id="user" name="user" placeholder="Ingresa usuario" value="<?php if($error>=2){ echo $user;} ?>" />
        <br />
        <label class="password" for="password">Password</label>
        <input type="text" id="password" name="password" placeholder="Ingresa password"/>
        <input type="hidden" name="validate" value="1" />
        <br />
        <br />
        <input type="submit" value="Ingresar" />
        <link rel="stylesheet" href="style.css">
    </form>
    <?php
        if ($error > 0)
        {
    ?>
    <div>
        <h3 style="color:red">Error</h3>
        <p><?php 
            switch($error)
            {
                case 1:
                    echo "El campo Usuario está¡ vacío";
                    break;

                case 2:
                    echo "El campo Password está¡ vacío";
                    break;
                
                case 3:
                    echo "El usuario y/o contraseña no corresponden a la base de datos";
                    break;
            }
        ?></p>
    </div>
    <?php
        }

        echo ($error);
    ?>

</body>

</html>