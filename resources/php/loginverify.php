<?php
require_once("../../properties_conexion.php");
conectar();

$loginEmail = mysql_real_escape_string ($_POST['loginEmail']);
$password = $_POST['loginPass'];

$query = sprintf ("SELECT pass  FROM ximausrs WHERE email = '%s' and idstatus in (1,3,4,5)  LIMIT 1", $loginEmail);//
$result=mysql_query($query) or die(json_encode(array('success' =>false,'error' => $query." ".mysql_error())));
$row = mysql_fetch_array ($result);
//print_r($row);
//if($loginEmail=='xelasmi@gmail.com'){	echo json_encode(array('success' =>true,'error' => 'yes')); return; }

if (strtolower($row['pass']) === strtolower($password))
{ 
	echo json_encode(array('success' =>true,'error' => 'yes')); 
}
else
	echo json_encode(array('success' =>false,'error' => 'Email or password is incorrect..!!')); 

?>