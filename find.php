<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'header.php';
$smarty=new Smarty();
$value=$_GET['keywords'];
$pageSize=10;
$page=$_GET['p'];
if($page==null){
   $page=1;
}
	$totalRow=newsarticles::getSearchCount($value);
    $pageRow=ceil($totalRow/$pageSize);
    $count=array();
    for($i=1;$i<=$pageRow;$i++){
    	$count[]=$i;
    }
$smarty->assign("count",$count);
$smarty->assign("value",$value);
$smarty->assign("record",newsarticles::search($value,$pageSize,$page));
$smarty->display("find.html");
?>