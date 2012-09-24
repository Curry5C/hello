<?php
header("content-type:text/html;charset=utf-8");
include_once 'dbio/reviews.php';
$id=$_GET['id'];
if(reviews::delReviews($id)){
	echo "<script language='javascript'>";
	echo "alert('删除成功');";
	echo "</script>";
}else{
	echo "<script language='javascript'>";
	echo "alert('删除失败');";
	echo "</script>";
}
?>