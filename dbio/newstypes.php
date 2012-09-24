<?php
include_once 'conn/DbConn.php';
include_once'newsarticles.php';
class  newstypes{
	//获取分类新闻
	function getTypeName($id) {
		$sql="select typeId,typeName from newstypes where typeId='{$id}'";
		$conn=new DbConn();
		$totalRow=$conn->executeQuery($sql);
			$conn->setCurrentRow(0);
			$arr=array(
			     "typeName"=>$conn->getValue(1),
			     "typeId"=>$conn->getValue(0),
			    );
		$conn->close();
		return $arr;
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
					"content"=>newsarticles::getTopNewsInfo($conn->getValue(0))
				);
				$newsType[] = $arr;
			}
			$conn->freeResult();
			$conn->close();
			return $newsType;
	}
	//获得新闻条数
	function getNewToalt() {
		$record=array();
		$sql="select * from newstypes";
		$conn=new DbConn();
		$totalRow=$conn->executeQuery($sql);
		for($i=0;$i<$totalRow;$i++){
			$conn->setCurrentRow($i);
			$arr=array(
			     "typeId"=>$conn->getValue(0),
			     "typeName"=>$conn->getValue(1),
			     "articleNums"=>$conn->getValue(2)
			    );
			$record[]=$arr;
		}
		$conn->close();
		return $record;
	}
}
?>