<?php
    session_start();
    require_once "config.php";
    require_once "new_password.php";
    
        try {
            $pdo = new PDO($atrr, $username, $password, $opts);
        }catch (PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        if(!empty($_POST)){
            if(isset($_POST['Submit'])){
                if(isset($_POST['new_password'])){
                    $curr_user = $_SESSION['user'];
                    $new = $_POST['new_password'];

                    $hash = hashPassword($new);
                    $query =  "UPDATE users SET user_password='" .$hash."';";
                    $result = $pdo->query($query);

                    header("Location: main_page.php");
                }
            }
        }
       

        //hashes the password 
function hashPassword($input_password){

    $new_salt = '0123';
    $temp_password = $input_password.$new_salt;    
    $hash = password_hash($temp_password, PASSWORD_DEFAULT);
    
    return $hash;

}

    ?>
</body>