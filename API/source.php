<?php 
	class source
	{	
		private $conn;
		public function __construct(){
			$this->mysql_connect_db();
		}
		function mysql_connect_db(){
			$connect = mysqli_connect("localhost", "hai", "123456", "congnghemoi");
			if (!$connect){
				die("kkncsdl");
				exit();
			}
			else
			{
				mysqli_set_charset($connect, "utf8");
				$this->conn = $connect;
				return $this->conn;
			}

		}
		function query($sql)
		{
			$link = $this->mysql_connect_db();
			$result = mysqli_query($link, $sql);
			return $result;
		}
		function fetch_all(){
			$result = $this->query("Select * from user");
			$t = mysqli_num_rows($result);
			if($t > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$ketqua[] = [
						"id"=>$row["id"],
						"ho" => $row["ho"],
						"ten" => $row["ten"],
						"lop" => $row["lop"]
					];
				}
				// header("Content-Type: application/json;charset=UTF-8");
				return ($ketqua);
			}
		}
		function them($ho, $ten, $lop)
		{
			$sql = "INSERT INTO `user` (`id`, `ho`, `ten`, `lop`) VALUES (NULL, '".$ho."', '".$ten."', '".$lop."')";
			$this->query($sql);
			
		}

		function sua($id, $ho, $ten, $lop)
		{
			$sql = "UPDATE `user` SET `ho` = '$ho', `ten` = '$ten', `lop` = '$lop' WHERE `user`.`id` = $id";
			$this->query($sql);
		}
		function xoa($id)
		{
			$sql = "DELETE FROM `user` WHERE `user`.`id` = $id";
			$this->query($sql);
		}
	}
 ?>