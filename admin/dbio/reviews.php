<?php
include_once 'conn/DbConn.php';
class reviews{
	//删除一个分类的所有评论
	public function delAllReviews($tid){
		$sql="delete from reviews where articleId in (select articleId from newsArticles where typeId=tid)";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
	//删除一条新闻后的评论
	public function delTotal($id){
		$sql="delete from reviews where articleId={$id}";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
	//删除一条评论
	public function delReviews($id){
		$sql="delete from reviews where id={$id}";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
	//获得评论
	public function getReviews($cid){
		$record=array();
		$sql="select * from reviews where articleId='{$cid}'";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		for($i=0;$i<$row;$i++){
			$conn->setCurrentRow($i);
			$arr=array(
			     "id"=>$conn->getValue(0),
			     "userName"=>$conn->getValue(2),
			     "body"=>$conn->getValue(3),
			     "face"=>$conn->getValue(4),
			     "dateandtime"=>$conn->getValue(5)
			     );
			$record[]=$arr;
		}
		$conn->close();
		return $record;
	}
}
?>