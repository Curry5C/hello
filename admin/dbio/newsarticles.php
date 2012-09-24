<?php
include_once 'conn/DbConn.php';
class newsarticles {
 //删除一个分类下的所有新闻
 public function delAll($tid){
 	$sql="delete from newsarticles where typeId={$tid}";
 	$conn=new DbConn();
 	$row=$conn->executeQuery($sql);
 	$conn->close();
 	return $row;
 }
 //获得一个分类下的所有新闻的ID
 public function getAll($tid){
 	$record=array();
 	$sql="select articleId from newsarticles where typeID={$tid}";
 	$conn=new DbConn();
 	$row=$conn->executeQuery($sql);
 	for($i=0;$i<$row;$i++){
 		$conn->setCurrentRow($i);
 		$arr=array(
 		     "articleId"=>$conn->getValue("articleId")
 		     );
 		  $record[]=$arr;   
 	}
 	$conn->close();
 	return $record;
 }
 //修改一条新闻
 public function editNews($id,$title,$content,$typeId){
 	$sql="update newsarticles set title='{$title}',content='{$content}',typeId={$typeId}
 	      where articleId={$id}";
 	$conn=new DbConn();
 	$row=$conn->executeUpdate($sql);
 	echo $sql;
 	$conn->close();
 	return $row;
 	
 }
 //删除一条新闻
 public function delNews($id){
 	$sql="delete from newsarticles where articleId={$id}";
 	$conn=new DbConn();
	$row=$conn->executeUpdate($sql);
	$conn->close();
	return $row;
 }
 //获取某一条新闻
 public function getInfo($cid){
 	$sql="select * from myview where articleId={$cid}";
 	$conn=new DbConn();
 	$row=$conn->executeQuery($sql);
 	$conn->setCurrentRow(0);
 	$arr=array(
 	     "articleId"=>$conn->getValue(0),
 	     "content"=>$conn->getValue(1),
 	     "title"=>$conn->getValue(2),
 	     "typeId"=>$conn->getValue(3),
 	     "typeName"=>$conn->getValue(11)
 	     );
 	$conn->close();     
 	return $arr;
 }
 //获得新闻数目
	function getCounts() {
		$sql="select * from myview";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
		$conn->close();
		return $totoalRow;
	}
 //按类型查询
	function getTypeNews($pageSize,$page,$title) {
		$record=array();
		$first=($page-1)*$pageSize;
        $last=$first+$pageSize;
		$sql="select * from myview where typeName like '%{$title}%'";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
	    if($last > $totoalRow){
        $last=$totoalRow;
        }
		for ($i = $first; $i < $last; $i++) {
			$conn->setCurrentRow($i);
			$arr=array(
                   "typeName"=>$conn->getValue("typeName"),
			       "articleId"=>$conn->getValue("articleId"),
			       "title"=>$conn->getValue("title"),
			       "dateandtime"=>$conn->getValue("dateandtime")
			     );
			 $record[]=$arr;
		}
		$conn->close();
		return $record;
	}
	//获得按类型查询的总数
	function getTypeToatl($title) {
		$sql="select * from myview where title like '%{$title}%'";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
		$conn->close();
		return $totoalRow;
	}
	//获得按标题查询的总数
	function getTitleToatl($title) {
		$sql="select * from myview where title like '%{$title}%'";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
		$conn->close();
		return $totoalRow;
	}
 //按标题查询
	function getTitleNews($pageSize,$page,$title) {
		$record=array();
		$first=($page-1)*$pageSize;
        $last=$first+$pageSize;
		$sql="select * from myview where title like '%{$title}%'";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
	    if($last > $totoalRow){
        $last=$totoalRow;
        }
		for ($i = $first; $i < $last; $i++) {
			$conn->setCurrentRow($i);
			$arr=array(
                   "typeName"=>$conn->getValue("typeName"),
			       "articleId"=>$conn->getValue("articleId"),
			       "title"=>$conn->getValue("title"),
			       "dateandtime"=>$conn->getValue("dateandtime")
			     );
			 $record[]=$arr;
		}
		$conn->close();
		return $record;
	}
 //新闻查询
	function getNews($pageSize,$page) {
		$record=array();
		$first=($page-1)*$pageSize;
        $last=$first+$pageSize;
		$sql="select * from myview order by articleId";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
	    if($last > $totoalRow){
        $last=$totoalRow;
        }
		for ($i = $first; $i < $last; $i++) {
			$conn->setCurrentRow($i);
			$arr=array(
                   "typeName"=>$conn->getValue("typeName"),
			       "articleId"=>$conn->getValue("articleId"),
			       "title"=>$conn->getValue("title"),
			       "dateandtime"=>$conn->getValue("dateandtime")
			     );
			 $record[]=$arr;
		}
		$conn->close();
		return $record;
	}
 //新闻添加
  public function insertNews($title,$typeId,$time,$content,$photo_new_name,$writer,$laiyuan){
  $sql="insert into newsarticles
        (title,typeId,dateandtime,content,imagepath,writer,source) 
        values('{$title}','{$typeId}','{$time}','{$content}','{$photo_new_name}','{$writer}','{$laiyuan}')";
  $conn=new DbConn();
  $row=$conn->executeUpdate($sql);
  return $row;
  }
}
?>