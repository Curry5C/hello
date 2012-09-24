<?php
header("content-type:text/html;charset=utf-8");
include_once 'dbio/reviews.php';
include_once 'dbio/newsarticles.php';
$id=$_GET['id'];
if(reviews::delTotal($id)){
	if(newsarticles::delNews($id)){
		echo "<script language='javascript'>";
		echo "alert('删除成功');";
		echo "</script>";
	}
}
   else{
		echo "<script language='javascript'>";
		echo "alert('删除失败');";
		echo "</script>";
     }

?>