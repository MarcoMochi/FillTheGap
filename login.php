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
    if ($flag) 
        echo "Ok";
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