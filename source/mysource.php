<?php
	class mysource
	{
		function mysql_connect_db(){
			$conn = mysqli_connect("localhost", "hai", "123456", "congnghemoi");
			if (!$conn){
				die("kkncsdl");
				exit();
			}
			else
			{
				mysqli_set_charset($conn, "utf8");
				return $conn;
			}

		}
		function query($sql)
		{
			$link = $this->mysql_connect_db();
			$result = mysqli_query($link, $sql);
			return $result;
		}
		function xem($sql){
			$result = $this->query($sql);
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
				header("Content-Type: application/json;charset=UTF-8");
				echo json_encode($ketqua);
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