<?php
include_once 'conn/DbConn.php';
 class manager{
 	public function getManager($userName,$password){
 		$sql="select * from manager where userName='{$userName}' and password='{$password}'";
 		$conn=new DbConn();
 		$row=$conn->executeQuery($sql);
 		$conn->close();
 		return $row;
 	} 
 }
?>