<?php
//this is for protected csrf
session_start();
require_once "config.php";
    try {
        $pdo = new PDO($atrr, $username, $password, $opts);
    }catch (PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }


    if(isset($_SESSION['admin'])){
        $sessid = $_COOKIE['PHPSESSID'];
    }

    print "
    <html lang = 'en'>

<head> 
    <meta charset = 'utf-8'>
    <meta name = 'viewport' content ='width= device-width, initial-scale =1, shrink-to-fit=no'>
    <title> Main menu </title>

</head>

<!--creating the text boxes that will have the username and the password fields, along with a submit button at the end--->
<body>
    <div style = 'margin-top: 2-px' class='container'>
        <h1> Create Account </h1>
        <form action='register_admin2.php' method ='post'>
        <div class = 'form-group'>
                <label for = 'password'>First Name</label>
                <input class = 'form-control' type = 'text' name = 'first_name'>
            </div>
            <div class = 'form-group'>
                <label for = 'password'>Last Name</label>
                <input class = 'form-control' type = 'text' name = 'last_name'>
            </div>
            <div class = 'form-group'>
                <label for = 'username'>New Username</label>
                <input class = 'form-control' type = 'text' name = 'admin_username'>
            </div>
            <div class = 'form-group'>
                <label for = 'password'>New Password</label>
                <input class = 'form-control' type = 'password' name = 'admin_password'> 
                <input type = 'hidden' name = 'sessionID' value = $sessid>
            </div>
            <div class = 'form-group'>
             
                <input type = 'hidden' name = 'sessionID' value = $sessid>
            </div>
                <input class='btn btn-primary' name='Submit' type='submit' value='Submit'>
            </div>
        </form>
    </div>
</body>
</html>
    ";
    ?>

