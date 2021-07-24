<?php
session_start();
include_once("../config/Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $_GET['id'];
if($_SESSION['status']){
//deleting the row from table
$result = $crud->execute("DELETE FROM penginapan WHERE id_penginapan='$id'");

if ($result) {
	//redirecting to the display page (index.php in our case)
	header("Location:penginapan.php");
}
}else{
	echo "anda belum login bos!";
}
?>