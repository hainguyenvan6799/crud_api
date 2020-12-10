<?php 
class restful_api
{
	protected $method = '';
	protected $endpoint = '';
	protected $params = array();
	protected $file = null;
	// protected $response = '';

	public function __construct(){
		$this->_input();
		$this->_process_api();
	}

		// code of _input method
	private function _input(){
		header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");

		$this->params = explode("/", trim($_SERVER['PATH_INFO'], "/"));
		$this->endpoint = array_shift($this->params);

			// Get method of request
		$method = $_SERVER['REQUEST_METHOD'];
		$allow_method = array('GET', 'POST', 'PUT', 'DELETE');
		if(in_array($method, $allow_method))
		{
			$this->method = $method;
		}

			// receive data with each method
		switch ($this->method) {
			case 'GET':
				break;
			case 'POST': $this->params = $_POST;
			// echo $this->params;
				break;
			case 'PUT': 
			$this->params = $_POST;
			// $this->file = file_get_contents("php://input");
			// echo $this->file;
				break;
			case 'DELETE':
			// echo 'delete';
				break;
			default:
				$this->response(500, "Invalid method");
			break;
		}
	}

		// code of process api method
	private function _process_api(){
		if(method_exists($this, $this->endpoint))
		{
			$this->{$this->endpoint}();
		}
		else
		{
			$this->response(500, "UNKNOW ENDPOINT");
		}
	}

	protected function response($statusCode, $data = NULL){
		header($this->_build_http_header_string($statusCode));
		header("Content-Type: application/json");
		echo json_encode($data);
		die();
	}

	private function _build_http_header_string($statusCode){
		$status = array(
			200 => "OK",
			404 => "Not Found",
			405 => "Method Not Allow",
			500 => "Internal Server Error"
		);
		return "HTTP/1.1 " . $statusCode . " " . $status[$statusCode];
	}
}
?>