<?php
header("content-type:text/html;charset=utf-8");
include_once 'library/smarty/smarty.class.php';
include_once 'dbio/newstypes.php';
include_once 'dbio/newsarticles.php';
function  getExt($file){
	$ext=strtolower(pathinfo($file,PATHINFO_EXTENSION));
	return $ext;
}
$smarty=new Smarty();
$title=$_POST['title'];
$type=$_POST['type'];
$time=$_POST['time'];
$content=$_POST['content'];
$photo_name=$_FILES['file']['name'];
$photo_tmpname=$_FILES['file']['tmp_name'];
$photo_error=$_FILES['file']['error'];
$writer=$_POST['writer'];
$sender=$_POST['sender'];
$laiyuan=$_POST['laiyuan'];
if($photo_error == UPLOAD_ERR_OK){
		
  $photo_new_name = date('YmdHis') . mt_rand(1000,9999) . "." . getExt($photo_name);
 
  move_uploaded_file($photo_tmpname,"../newspicture/" . $photo_new_name);
		
}
if($title!=null){
	$row=newstypes::getId($type);
	$typeId=$row['typeId'];
	if(newsarticles::insertNews($title,$typeId,$time,$content,$photo_new_name,$writer,$sender,$laiyuan)){
	 echo "<script language='javascript'>";
	 echo "alert('添加新闻成功');";
     echo "</script>";
	}else{
	 echo "<script language='javascript'>";
	 echo "alert('添加新闻失败');";
     echo "</script>";
	}
}
$smarty->assign("type",newstypes::getType());
$smarty->display("addnews.html");
?>