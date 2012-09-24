<?php
header("content-type:text/html;charset=utf-8");
include_once 'header.php';
include_once 'library/smarty/smarty.class.php';
$smarty=new Smarty();
$cid=$_GET['cid'];
$userName=$_POST['username'];
$face=$_POST['face'];
$body=$_POST['content'];
if($body!=null){
	if(reviews::insertReviews($cid,$userName,$body,$face)){
		echo "<script language='javascript'>";
		echo "alert('发表成功');";
		echo "</script>";
	}else{
	    echo "<script language='javascript'>";
		echo "alert('发表失败');";
		echo "</script>";
	}
}
$smarty->assign("reviews",reviews::getReviews($cid));
$smarty->assign("cid",$cid);
$smarty->assign("content",newsarticles::getContent($cid));
$smarty->display("content.html");
?>