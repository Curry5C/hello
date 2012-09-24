<?php
header("content-type:text/html;charset=utf-8");
include_once 'header.php';
include_once 'library/smarty/smarty.class.php';
$smarty=new Smarty();
$id=$_GET['id'];
$pageSize=5;
$page=$_GET['p'];
if($page==null){
	$page=1;
}
$totalRow=newsarticles::getTypeTotal($id);
$pageRow=ceil($totalRow/$pageSize);
$count=array();
for($i=1;$i<=$pageRow;$i++){
$count[]=$i;
}
$typeName=newstypes::getTypeName($id);
$smarty->assign("typeName",$typeName);
$smarty->assign("totalRow",$totalRow);
$smarty->assign("count",$count);
$smarty->assign("id",$id);
$smarty->assign("typeNews",newsarticles::getTypeNews($id,$pageSize,$page));
$smarty->display("news.html");
?>