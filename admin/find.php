<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newstypes.php';
include_once 'dbio/newsarticles.php';
$smarty=new Smarty();
$leixing=$_GET['leixing'];
$pageSize=10;
$page=$_GET['p'];
if($page==null){
	$page=1;
}
if($leixing=="1"){
	$title=$_GET['title'];
	$smarty->assign("news",newsarticles::getTitleNews($pageSize,$page,$title));
	$totalRow=newsarticles::getTitleToatl($title);
	$pageRow=ceil($totalRow/$pageSize);
	$count=array();
	for($i=1;$i<=$pageRow;$i++){
	$count[]=$i;
	}
	$smarty->assign("title",$title);
	$smarty->assign("count",$count);
}elseif($leixing=="2"){
	$title=$_GET['title'];
    $smarty->assign("news",newsarticles::getTypeNews($pageSize,$page,$title));
    $totalRow=newsarticles::getTypeToatl($title);
 	$pageRow=ceil($totalRow/$pageSize);
	$count=array();
	for($i=1;$i<=$pageRow;$i++){
	$count[]=$i;
	}
	$smarty->assign("title",$title);
	$smarty->assign("count",$count);
}

$smarty->display("find.html");
?>