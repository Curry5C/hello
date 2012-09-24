<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/manager.php';
$smarty=new Smarty();
$userName=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type'];
$remark=$_POST['remark'];
if($userName!=null){
	if(manager::insertUser($userName,$password,$type,$remark)){
		echo "<script language='javascript'>";
		echo "alert('添加用户成功');";
		echo "</script>";
	}else{
	    echo "<script language='javascript'>";
		echo "alert('添加用户失败');";
		echo "</script>";	
	}
}
$smarty->display("adduser.html");
?>