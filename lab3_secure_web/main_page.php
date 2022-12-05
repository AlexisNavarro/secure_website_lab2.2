<html lang = "en">

<head> 
    <meta charset = "utf-8">
    <meta name = "viewport" content ="width= device-width, initial-scale =1, shrink-to-fit=no">
    <title> Main menu </title>

</head>

<!--creating the text boxes that will have the username and the password fields, along with a submit button at the end--->
<body>
    <div style = "margin-top: 2-px" class="container">
        <h1> Main menu </h1>
<?php
session_start();
require_once("config.php");
//include_once "check_users.php";
//$_SESSION['logged_in'] = false;

//if user is logged in
if(isset($_SESSION['user'])){
    $username = $_SESSION['user'];
    print "
            user: $username
            <div class = 'form-group'>
                <a href='user_page.php'>user page</a><br><br> 
                <a href='logout.php'>user log out</a><br><br> 
            </div>
            ";
//if admin is logged in
}else if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
    $sessid = $_COOKIE['PHPSESSID'];
    print "
            admin: $admin
            sessid : $sessid
            <div class = 'form-group'>
            <a href='list_users.php'>user page</a><br><br> 
            <a href='admin.php'>admin page</a><br><br> 
            <a href='create_admin.php'>create new UNPROTECTED admin</a><br><br> 
            <a href='create_adminv2.php'>create new PROTECTED admin</a><br><br> 
            <a href='logout.php'>admin log out</a><br><br> 
            </div>
            ";
//if no one is logged in
}else{
    print "<form action='sign_in.php' method ='post'>
    <div class = 'form-group'>
        <a href='sign_in.php'>visitor sign in</a><br><br> 
        <a href='create_account.php'>create account</a><br><br> 
    </div>
    ";
}

?>

</div>
</body>
</html>
