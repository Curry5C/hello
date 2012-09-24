<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newsarticles.php';
include_once 'dbio/newstypes.php';
include_once 'dbio/reviews.php';
include_once 'dbio/manager.php';
$smarty=new Smarty();
$type=newstypes::getType();
$smarty->assign("type",$type);
$smarty->display("header.html");
?>