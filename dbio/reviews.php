<?php
include_once 'conn/DbConn.php';
class reviews{
	//插入留言
	public function insertReviews($cid,$userName,$body,$face){
		$sql="insert into reviews(articleId,userName,body,face) values ({$cid},'{$userName}','{$body}','{$face}')";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		return $row;
	}
	//查询留言
	public function getReviews($cid){
		$record=array();
		$sql="select * from reviews where articleId='{$cid}'";
		$conn=new DbConn();
		$row=$conn->executeQuery($sql);
		for ($i = 0; $i < $row; $i++) {
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