<html lang = "en">

<head> 
    <meta charset = "utf-8">
    <meta name = "viewport" content ="width= device-width, initial-scale =1, shrink-to-fit=no">
    <title> admin Page </title>

    <body>
    <h1> admin page</h1>    
    <?php
    require_once "config.php";
    
        try {
            $pdo = new PDO($atrr, $username, $password, $opts);
        }catch (PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        $query = "SELECT * FROM users;";
        $result = $pdo->query($query);
        while($row = $result->fetch()){
            $user = htmlspecialchars($row['username']);
            echo $user."<br>";

        }

        
    ?>

</body>

</head>
</html>