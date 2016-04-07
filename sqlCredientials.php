<?php
$GLOBALS['sql_connection']='0';
function sql_login(){
	$sql_servername = "localhost";
	$sql_username = "bluelist";
	$sql_password = "qwertybluelist098765";
	$sql_database = "bluelist";
	$GLOBALS['sql_connection'] = new mysqli($sql_servername,$sql_username,$sql_password,$sql_database);
	echo $GLOBALS['sql_connection']->connect_error;
/*function check_connect_to_DB($conn){
		if($conn->connect_error){
			echo $conn->connect_error."DUPA";
		return false;
		}
	echo $conn->connect_error."POLACZYLEM SIE MAJKEL CWEL";
	return true;
	}*/
}
?>