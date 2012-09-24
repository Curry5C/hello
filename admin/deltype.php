<?php
header("content-type:text/html;charset=utf-8");
include_once 'dbio/newstypes.php';
include_once 'dbio/reviews.php';
include_once 'dbio/newsarticles.php';
$tid=$_GET['tid'];
if(newstypes::delType($tid)){
	echo "<script language='javascript'>";
	echo "alert('删除成功');";
	echo "window.location='addtype.php';";
	echo "</script>";
}else{
	echo "<script language='javascript'>";
	echo "alert('删除失败');";
	echo "</script>";
}
?>