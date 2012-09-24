<?php
include_once 'conn/DbConn.php';
class newsarticles  {
		public function getTopNewsInfo($typeId)
		{
			$sql = "select * from newsArticles
			          where typeId={$typeId}
			          order by dateandtime desc limit 0,2";
			$result = "";//两个标题的字符串
			$conn = new DbConn();
			$row = $conn->executeQuery($sql);
			for($i=0;$i<$row;$i++)
			{
				$conn->setCurrentRow($i);
				$title = $conn->getValue("title");
				$articleId=$conn->getValue("articleId");
				$len = mb_strlen($title,"utf-8");//返回字符串长度
				if($len > 13)
				{
					$title = mb_substr($title,0,11,"utf-8")."...";
				}
				
				$result .= "<img src='images/makealltop.gif' align='absmiddle'><a href='content.php?cid={$articleId}'><font color='red' style='line-height:20px'>{$title}</font></a><br>";
			}
			return $result;
		}
//获得搜索总记录数
	public function getSearchCount($value){
		$sql="select * from newsarticles where title like '%{$value}%'";
		$conn=new DbConn();
		$row=$conn->executeQuery($sql);	
		$conn->close();
		return $row;

	}		
    //搜索
    public function search($value,$pageSize,$page){
    	$record=array();
    	$first=($page-1)*$pageSize;
        $last=$first+$pageSize;
		$sql="select * from newsarticles where title like '%{$value}%'";
		$conn=new DbConn();
		$row=$conn->executeQuery($sql);
        if($last > $row){
        $last=$row;
            }
		for($i=$first;$i<$last;$i++){
			$conn->setCurrentRow($i);
			$arr=array(
                 "title"=>$conn->getValue(2),
                 "articleId"=>$conn->getValue(0),
			     "content"=>$conn->getValue(1)
			     );
			     $record[]=$arr;
		}
		$conn->close();
		return $record;
    }
	//获取新闻显示内容
	function getContent($cid){
		$sql="select * from newsarticles where articleId='{$cid}'";
		$conn=new DbConn();
		$row=$conn->executeQuery($sql);
		$conn->setCurrentRow(0);
		$arr=array(
		      "title"=>$conn->getValue("title"),
		      "content"=>$conn->getValue("content"),
		      "imagepath"=>$conn->getValue("imagepath")
		     );
		     $conn->close();
		     return $arr;
	}
	//分页显示
	function getTypeNews($id,$pageSize,$page) {
		$record=array();
	    $first=($page-1)*$pageSize;
	    $last=$first+$pageSize;
		$sql="select * from newsarticles where typeId='{$id}'";
		$conn=new DbConn();
		$totalRow=$conn->executeQuery($sql);
		if($last > $totalRow){
    	   $last=$totalRow;
        }
		for($i=$first;$i<$last;$i++){
			$conn->setCurrentRow($i);
           $arr=array(
                 "title"=>$conn->getValue(2),
                 "articleId"=>$conn->getValue(0),
			     "content"=>$conn->getValue(1)
                );
            $record[]=$arr;
		}
		$conn->close();
		return $record;
		
		
	}
	//获取分类新闻条数
	function getTypeTotal($id) {
		$sql="select * from newsarticles where typeId='{$id}'";
		$conn=new DbConn();
		$totalRow=$conn->executeQuery($sql);
		return $totalRow;
	}
	//获取热点新闻
	function getNews() {
		$record=array();
		$sql="select * from myview order by hints desc limit 6";
		$conn=new DbConn();
		$totoalRow=$conn->executeQuery($sql);
		for ($i = 0; $i < $totoalRow; $i++) {
			$conn->setCurrentRow($i);
			$arr=array(
//			       "articleId"=>$conn->getValue(0),
//			       "content"=>$conn->getValue(1),
//			       "title"=>$conn->getValue(2),
//			       "typpeid"=>$conn->getValue(3),
//			       "username"=>$conn->getValue(4),
//			       "writer"=>$conn->getValue(5),
//			       "source"=>$conn->getValue(6),
//			       "hints"=>$conn->getValue(7),
//			       "dateandtime"=>$conn->getValue(8),
//			       "checkup"=>$conn->getValue(9),
//			       "imagepath"=>$conn->getValue(10)
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
}
?>