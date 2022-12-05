<?php
session_start();
require_once "config.php";
require_once "sign_in.php";

    try {
        $pdo = new PDO($atrr, $username, $password, $opts);
    }catch (PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }


#CREATE A READER METHOD TO READ THE HASHED PASSWORDS
    if(!empty($_POST)){
        if(isset($_POST['Submit'])){
            if(isset($_POST['username']) && isset($_POST['user_password'])){
                //verify the user password from the input
                if(verification($_POST['user_password'], $_POST['username'], $pdo )){   
                    $input_username = $_POST['username'];
                    $input_password = $_POST['user_password'];
    
                    $query = "SELECT * FROM users WHERE username='" . $input_username ."';";
                    $result = $pdo->query($query);
                    
                    //allows to enter log in info if right, if not it will print user not found if log in info is wrong
                    //if the input is from a user then will search in the user table
                    if($row = $result->fetch()){
                        //$_SESSION['user'] = $input_username;
                        $_SESSION['user'] = $row['first_name']; //will send the first name of the user into the main page
                        header("Location: main_page.php");
                    }else{ //if the input is not found in the user table then we search inside the admin table to find the information
                        $input_username = $_POST['username'];
                        $input_password = $_POST['user_password'];
                        
                        $query = "SELECT * FROM admin WHERE username='" . $input_username ."';";
                        $result = $pdo->query($query);
                        
                        //allows to enter log in info if right, if not it will print user not found if log in info is wrong
                        if($row = $result->fetch()){
                            $_SESSION['admin'] = $input_username;
                            header("Location: main_page.php");
                        }else{
                            echo "User not found.";
                        }
                      
                    }//END IF ELSE

             
            }else{
                echo "Password is invalid";
            }//end verify if
        }//end 3rd if
    }//end 2nd if
}//main if


//authenticate the user with the hashed password contents
function verification($user_password, $username, $pdo){

 
    $salt = "0123";
    $temp = $user_password.$salt;
    $hash = password_hash($salt, PASSWORD_DEFAULT);
    
    $query = "SELECT * FROM users WHERE username='" . $username ."';";
    $result = $pdo->query($query);

    if($row = $result->fetch()){
        $db_pass = $row['user_password']; //will send the first name of the user into the main page       
         //echo $hash;
        if(password_verify($temp, $db_pass)){
            return true;

        }else{
            return false;
        }
    }else{ //if the input is not found in the user table then we search inside the admin table to find the information
        
        
        $query = "SELECT * FROM admin WHERE username='" . $username ."';";
        $result = $pdo->query($query);
        
        //allows to enter log in info if right, if not it will print user not found if log in info is wrong
        if($row = $result->fetch()){
            $db_pass = $row['user_password']; //will send the first name of the user into the main page  
        }

        return true;
        // if(password_verify($user_password, $db_pass)){
        //     return true;

        // }else{
        //     return false;
        // }
    }

   
   
}
?>