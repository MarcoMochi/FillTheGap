<?php 

    $flag = true;
    $username = checkNullValue($_POST['username']);    
    $email = checkNullValue($_POST['email']);
    $password = checkNullValue($_POST['password']);
    $confirmPassword = checkNullValue($_POST['confirmPassword']);
   
    checkPassword ($password, $confirmPassword);
    uniqueUsername ($username);
    uniqueEmail ($email);
    registration($username, $email,  $password);
    

    function checkNullValue ($data) {
        global $flag;
        if (empty($data)) {
            echo "Non sono stati inseriti tutti i campi";
            $flag = false;
        }   
        else {
            return ( trim ($data));
        }
    }
    
    function checkPassword ($psw1, $psw2) {
        global $flag;
        if ($psw1 != $psw2) {
            echo "La password non é stata confermata correttamente";     
            $flag = false;
        }
    }
    
    function uniqueUsername ($username) {
        global $flag;
        $myFile = fopen("data.txt", r) or die("Unable to open file!");
        while (!feof($myFile))  {
            $buffer = fgets($myFile);
            if(strpos ($buffer, $username) !== FALSE) {
                $flag = false;
                echo "Username giá utilizzato";
                break;
            }
        }
        fclose($myFile);
    }

     function uniqueEmail ($email) {
        global $flag;
        $myFile = fopen("data.txt", r) or die("Unable to open file!");
        while (!feof($myFile))  {
            $buffer = fgets($myFile);
            if(strpos ($buffer, $email) !== FALSE) {
                $flag = false;
                echo "Email giá utilizzata";
                break;
            }
        }
        fclose($myFile);

    }

    function registration ($username, $email,  $password) {
        global $flag;
      
        if ($flag) {
            $myfile = fopen("data.txt", "a+") or die("Unable to open file!");
            $txt = $email."-".$username."-".$password."\r\n";
            fwrite($myfile, $txt);
            fclose($myfile);
            sleep (1);
            header ('Location:FillTheGap.html');
        }
       
        else
            echo "Registration failed";
    }








?>