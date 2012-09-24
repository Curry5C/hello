<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newstypes.php';
include_once 'dbio/newsarticles.php';
$smarty=new Smarty();
$title=$_GET['title'];
$leixing=$_POST['leixing'];
$pageSize=8;
$page=$_GET['p'];
if($page==null){
	$page=1;
}
if($leixing=="1"){
	$smarty->assign("titleNews",newsarticles::getTitleNews($pageSize,$page,$title));
}elseif($leixing=="2"){
 $smarty->assign("titleNews",newsarticles::getTypeNews($pageSize,$page,$title));	
}
$totalRow=newsarticles::getCounts();
$pageRow=ceil($totalRow/$pageSize);
$count=array();
for($i=1;$i<=$pageRow;$i++){
$count[]=$i;
}
$smarty->assign("count",$count);
$smarty->assign("news",newsarticles::getNews($pageSize,$page));
$smarty->display("updatenews.html");
?>