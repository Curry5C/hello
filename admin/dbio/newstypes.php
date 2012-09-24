<?php
include_once 'conn/DbConn.php';
class  newstypes{
	//删除一个分类
	public function delType($tid){
		$sql="call deltype($tid)";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
	//插入新分类
	public function insertType($type){
		$sql="insert into newsTypes (typeName) values ('{$type}')";
		$conn=new DbConn();
		$row=$conn->executeUpdate($sql);
		$conn->close();
		return $row;
	}
	//获得新闻分类
	function getType() {
			$newsType = array();//存储所有记录
			$sql = "select * from newsTypes";
			$conn = new DbConn();
			$row = $conn->executeQuery($sql);
			for($i=0;$i<$row;$i++)
			{
				$conn->setCurrentRow($i);
				$arr = array(
					"typeId"=>$conn->getValue(0),
					"typeName"=>$conn->getValue(1),
					"articleNums"=>$conn->getValue(2),
				);
				$newsType[] = $arr;
			}
			$conn->freeResult();
			$conn->close();
			return $newsType;
	}
	//获得分类的ID
	public function getId($type){
		$sql="select typeId from newsTypes where typeName='{$type}'";
		$conn=new DbConn();
		$row=$conn->executeQuery($sql);
		$conn->setCurrentRow(0);
		$arr=array(
		     "typeId"=>$conn->getValue(0)
		     );
    $conn->close();
	return $arr;
	}

}
?>