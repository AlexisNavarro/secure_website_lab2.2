<?php
session_start();
require_once "config.php";
require_once "create_account.php";

    try {
        $pdo = new PDO($atrr, $username, $password, $opts);
    }catch (PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }


#CREATING A NEW ACCOUNT 
    if(!empty($_POST)){
        if(isset($_POST['Submit'])){
            if(isset($_POST['new_username']) && isset($_POST['new_password'])){
                $input_username = $_POST['new_username'];
                $input_password = $_POST['new_password'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                //$currentDate = date_default_timezone_get();


                $hashed_password = hashPassword($input_password);

                $query = "INSERT INTO users (username, user_password, first_name, last_name) VALUES ('".$input_username."', '".$hashed_password."','".$first_name."', '".$last_name."');";
                $result = $pdo->query($query);
                header("Location: main_page.php");
                
            }//end 3rd if
        }//2nd if
}//main if


//hashes the password 
function hashPassword($input_password){

    $new_salt = '0123';
    $temp_password = $input_password.$new_salt;    
    $hash = password_hash($temp_password, PASSWORD_DEFAULT);
    
    return $hash;

}

//make a salt that will concatnate with the password that the user gave.
function generate_string(){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $salt = '';
    $num = 2;
    for ($i = 0; $i < $num; $i++) {
        $curr = rand(0, strlen($char) - 1);
        $salt .= $char[$curr];
    }
  
    return $salt;
}

?>