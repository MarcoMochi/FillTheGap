<?php
session_start();

$remember = $_POST['remember'];
$username = checkNullValue($_POST['username']);
$password = checkNullValue($_POST['password']);
find ($username,$password,$remember);

function find ($username,$password,$remember) {
    $flag = false;
    $myFile = fopen("data.txt", r) or die("Unable to open file!");
        while (!feof($myFile))  {
            $buffer = fgets($myFile);
            if(strpos ($buffer, ($username."-".$password)) == TRUE) {
               $flag = true;
            }
        }
    fclose($myFile);
    
    if ($flag) {
        $_SESSION['login_user'] = $username;
        if($remember) {
            setcookie("cookieName", $username, time() + 6000);
            setcookie("cookiePassword", $password, time() + 6000);
        }
        header ('Location:FillTheGapLogin.php');   	
    }
    else
        header ('Location:FillTheGap.php');
}

function checkNullValue ($data) {
    if (empty($data)) {
          header ('Location:FillTheGap.html');
       }   
        else {
          return $data;
        }
    }




?>