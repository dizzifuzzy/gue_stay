<?php
session_start();
include_once("../config/Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $_GET['id'];
if($_SESSION['status']){
//deleting the row from table
$result = $crud->execute("DELETE FROM member WHERE id_member='$id'");

if ($result) {
	//redirecting to the display page (index.php in our case)
	header("Location:member.php");
}
}else{
	echo "anda belum login bos!";
}
?>