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
  
    
        $query = "SELECT * FROM users;";
        $result = $pdo->query($query);

        while($row = $result->fetch()){
            $username = htmlspecialchars($row['username']);
            $firstname = htmlspecialchars($row['first_name']);
            $lastname = htmlspecialchars($row['last_name']);

            print "
            user: $username 
            first name: $firstname
            last name : $lastname <br>";
        }
      

        ?>

</body>


</div>
</head>
</html>

