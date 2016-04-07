<?php 
include 'sqlCredientials.php';
include 'util.php';
/*if (sql_login() == false) echo "202";*/ // Sql_login nic nie zwraca wiec dlatego ELO
sql_login();
$username = ($_POST['username'])? $_POST['username']: "No received";
$password = ($_POST['password'])? $_POST['password']: "No received";
$token = ($_POST['token'])? $_POST['token']: "No received";
$answer = authorize($username,$password,$GLOBALS['sql_connection'],$token);
echo $answer->code;
if ($answer->code == 100) echo ":".$answer->value;
$GLOBALS['sql_connection']->close();
?>