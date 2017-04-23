<?php

$username = checkNullValue($_POST['username']);
$password = checkNullValue($_POST['password']);
find ($username,$password);

function find ($username,$password) {
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
        session_start() ;
        $_SESSION['login_user']= $username;
        echo "welcome " .$_SESSION['login_user'];
    }
    else
        header ('Location:FillTheGap.html');
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