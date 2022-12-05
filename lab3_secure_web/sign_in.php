<html lang = "en">

<head> 
    <meta charset = "utf-8">
    <meta name = "viewport" content ="width= device-width, initial-scale =1, shrink-to-fit=no">
    <title> Sign in page </title>

</head>

<!--creating the text boxes that will have the username and the password fields, along with a submit button at the end--->
<body>
    <div style = "margin-top: 2-px" class="container">
        <h1> User Login </h1>
        <form action="check_users.php" method ="post">
            <div class = "form-group">
                <label for = "username">Username</label>
                <input class = "form-control" type = "text" name = "username">
            </div>
            <div class = "form-group">
                <label for = "password">Password</label>
                <input class = "form-control" type = "password" name = "user_password">
            </div>
            <div class = "form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>

