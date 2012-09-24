<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newstypes.php';
$smarty=new Smarty();
$smarty->assign("typeName",newstypes::getType());
$smarty->display("updatetype.html");
?>