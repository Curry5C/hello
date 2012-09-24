<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newsarticles.php';
include_once 'dbio/newstypes.php';
$smarty=new Smarty();
$cid=$_GET['cid'];
$id=$_GET['id'];
$title=$_POST['title'];
$typeName=$_POST['type'];
$content=$_POST['content'];
if($title!=null){
  $row=newstypes::getId($typeName);
  $typeId=$row['typeId'];
  if(newsarticles::editNews($id,$title,$content,$typeId)){
	echo "<script language='javascript'>";
	echo "alert('修改成功');";
	echo "window.location='updatenews.php'";
	echo "</script>";
  }else{
	echo "<script language='javascript'>";
	echo "alert('修改失败');";
	echo "window.location='updatenews.php'";
	echo "</script>";
  }
}
$smarty->assign("id",$cid);
$smarty->assign("type",newstypes::getType());
$smarty->assign("info",newsarticles::getInfo($cid));
$smarty->display("editnews.html");
?>