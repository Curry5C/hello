<?php
	//数据库封装类
	class DbConn
	{
		private $conn = NULL;//连接对象
		private $db = NULL;//数据库对象
		private $rs = NULL;//结果集对象
		private $record = NULL;//记录对象
		private $totalRow = 0;//总记录数
		
		//连接数据库
		public function __construct()
		{
			$this->conn = mysql_connect("localhost","root","123456");
			mysql_query("set names utf8");
			$this->db = mysql_select_db("news");
		}
		//执行select查询，返回总记录数
		public function executeQuery($sql)
		{
			$this->rs = mysql_query($sql);
			$this->totalRow = mysql_num_rows($this->rs);
			return $this->totalRow;
		}
		//执行insert、update、delete操作，返回受影响的行数
		public function executeUpdate($sql)
		{
			$this->rs = mysql_query($sql);
			$row = mysql_affected_rows($this->conn);
			return $row;
		}
		//定位游标
		public function setCurrentRow($index)
		{
			mysql_data_seek($this->rs,$index);
			$this->record = mysql_fetch_array($this->rs);
		}
		//通过列名取值
		public function getValue($colName)
		{
			return $this->record[$colName];
		}
		//释放结果集
		public function freeResult()
		{
			mysql_free_result($this->rs);
		}
		//关闭数据库
		public function close()
		{
			mysql_close($this->conn);
		}
	}
?>