<?php 
	require 'restful_api.php';
	require 'source.php';

	class api_test extends restful_api
	{
		public function __construct(){
			parent::__construct();
		}
		public function user(){
			if($this->method == 'GET')
			{
				header("Content-Type: application/json;charset=UTF-8");
				$source = new source();
				// $datas = json_encode($api->fetch_all());
				// $result = json_decode($datas);
				// $this->response(200, $result);

				$datas = $source->fetch_all();
				$this->response(200, $datas);
				

				// $result = json_decode($users);
				// var_dump($result);
				// foreach($result as $u)
				// {
				// 	echo $u->ho . '<br>';
				// 	echo $u->ten . '<br>';
				// 	echo $u->lop . '<br>';
				// 	echo '-----------------------' . '<br>';
				// }
				// echo $users;
				// echo "I'm in user Get Method";
				// echo gettype($datas);
				// echo $datas;

			}
			if($this->method == 'POST')
			{
				$ho = $this->params['ho'];
				$ten = $this->params['ten'];
				$lop = $this->params['lop'];
				$source = new source();
				$source->them($ho, $ten, $lop);
				$this->response(200, "Created a new data in database.");
			}
			if($this->method == 'PUT')
			{
				// $id = (int)file_get_contents("php://input");
				$content = file_get_contents("php://input");
				$arr = explode('|', $content);

				$source = new source();
				$ho = $arr[1];
				$ten = $arr[2];
				$lop = $arr[3];
				$source->sua($arr[0], $ho, $ten, $lop);
				$this->response(200, file_get_contents("php://input"));
			}
			if($this->method == 'DELETE')
			{
				$idDelete = (int)file_get_contents("php://input");
				$source = new source();
				$source->xoa($idDelete);
				$this->response(200, "Deleted");
			}
		}
	}
 ?>

 <?php 
 	$abc = new api_test();
  ?>