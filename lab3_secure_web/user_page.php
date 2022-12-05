<html lang = "en">

<head> 
    <meta charset = "utf-8">
    <meta name = "viewport" content ="width= device-width, initial-scale =1, shrink-to-fit=no">
    <title> User Page </title>
    <body>
    <h1> user page</h1>    
    
    <?php
    session_start();
    include_once "config.php";
    
        try {
            $pdo = new PDO($atrr, $username, $password, $opts);
        }catch (PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        if($_SESSION['user']){  
            $curr_user = $_SESSION['user'];
            $query = "SELECT * FROM users WHERE username='" . $curr_user ."';";
            $result = $pdo->query($query);
            if($row = $result->fetch()){
                $username = htmlspecialchars($row['username']);
                $firstname = htmlspecialchars($row['first_name']);
                $lastname = htmlspecialchars($row['last_name']);
            //$last_log_in = htmlspecialchars($row['last_log_in']);
                //echo $username, $firstname, $lastname;
                //echo $username;
                //echo $$firstname;
                // echo $lastname;
                print "
                 user: $username 
                 first name: $firstname
                 last name : $lastname ";
            }
                
            }


        
    ?> 
 
</body>


<div class = 'form-group'>
                <a href='new_password.php'>change password</a><br><br> 
                
</div>
</head>
</html>

