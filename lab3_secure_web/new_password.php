<html lang = "en">

<head> 
    <meta charset = "utf-8">
    <meta name = "viewport" content ="width= device-width, initial-scale =1, shrink-to-fit=no">
    <title> Main menu </title>

</head>

<!--creating the text boxes that will have the username and the password fields, along with a submit button at the end--->
<body>
    <div style = "margin-top: 2-px" class="container">
        <h1> Change password </h1>
        <form action="change_password.php" method ="post">
            <div class = "form-group">
                <label for = "password">New Password</label>
                <input class = "form-control" type = "password" name = "new_password">
            </div>
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
