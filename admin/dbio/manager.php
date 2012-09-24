<?php
include_once 'conn/DbConn.php';
class manager{
	//添加用户
	public function insertUser($userName,$password,$type,$remark){
		$sql="insert into manager(userName,password,userType,remark) values('{$userName}','{$password}','{$type}','{$remark}')";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
}
?>