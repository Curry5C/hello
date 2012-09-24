<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
$smarty=new Smarty();
$smarty->display("header.html");
?>