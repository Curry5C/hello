<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/reviews.php';
$smarty=new Smarty();
$cid=$_GET['cid'];
$smarty->assign("reviews",reviews::getReviews($cid));
$smarty->display("reviews.html");
?>