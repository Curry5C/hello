<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newstypes.php';
$smarty=new Smarty();
$type=$_POST['type'];
if($type!=null){
	if(newstypes::insertType($type)){
		echo "<script language='javascript'>";
		echo "alert('添加分类成功');";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
		echo "alert('添加分类失败');";
		echo "</script>";
	}
}
$smarty->display("addtype.html");
?>