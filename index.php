<?php
header("content-type:text/html;charset=utf-8");
session_start();
include_once 'header.php';
include_once 'library/smarty/smarty.class.php';
$smarty=new Smarty();
$smarty->assign("record",newsarticles::getNews());
$totalRow=newstypes::getNewToalt();
$total=0;
foreach ($totalRow as $v){
	$total+=$v["articleNums"];
}
$userName=$_POST['username'];
$password=$_POST['password'];
$yanzheng=$_POST['yanzheng'];
if($userName!=null){
	if(manager::getManager($userName,$password)&&$yanzheng==$_SESSION['vode']){
		echo "<script language='javascript'>";
		echo "alert('登陆成功');";
		echo "window.location='admin/index.php'";
		echo "</script>";
	}elseif(manager::getManager($userName,$password)&&$yanzheng!=$_SESSION['vode']){
		echo "<script language='javascript'>";
		echo "alert('验证码错误');";
		echo "window.location='index.php'";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
		echo "alert('登陆失败');";
		echo "window.location='index.php'";
		echo "</script>";
	}
}
$type=newstypes::getType();
$smarty->assign("total",$total);
$smarty->assign("totalRow",$totalRow);
$smarty->assign("type",$type);
$smarty->display("index.html");
?>