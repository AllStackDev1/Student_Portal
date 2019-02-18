<?php
@header("Access-Control-Allow-Origin: *");
@header("Access-Control-Allow-Methods: *");
@header("Content-Type: application/json");
@header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require_once 'studentportalprocess_.php';

class StudentPortalApi extends StudentPortalProcess{

    protected $request    	= null;
    protected $inputdata  	= null;
	protected $file 		= Null;
    protected $method   	= '';
	protected $endpoint 	= '';
	protected $verb     	= '';
    public    $version    	= 'v1.2';
	protected $args 		= Array();

    function __construct($request,$origin) {

		$this->requestinfo = explode('/',$request);
		$this->requestinfoCount = count($this->requestinfo) - 2;
		$this->endpoint = $this->requestinfo[$this->requestinfoCount];
		// echo $this->endpoint;
		$this->method = $_SERVER['REQUEST_METHOD'];
		if($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD',$_SERVER)) {
	        if($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
	            $this->method = 'DELETE';
	        }else if($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
	            $this->method = 'PUT';
	        }else {
	            throw new Exception("Unexpected Header");
	        }
	     }
		//clean all the output
		switch($this->method) {
			case 'DELETE':
			case 'POST':
			    $this->request = $this->_cleanInputs($_POST);
			    break;
			case 'GET':
			    $this->request = $this->_cleanInputs($_GET);
			    break;
			case 'PUT':
			    $this->request = $this->_cleanInputs($_GET);
			    $this->file = file_get_contents("php://input");
			    break;
			default:
			    $this->_response('Invalid Method',405);
			break;
		}
	}
   
   	// set the top request
    public function get_request() {
      return $this->request;
    }

    public function set_request($_request) {
       $this->request = $_request;
    }
    
    //set the input data
    public function get_inputdata() {
        return $this->inputdata;
    }
    public function set_inputdata($_inputdata) {
        $this->inputdata = $_inputdata;
    }
	
	public function processAPI(){

		if(method_exists($this,$this->endpoint)) {
		    
		    return $this->_response($this->{$this->endpoint}($this->args));
		} else {
			
			return $this->_response("No EndPoint : $this->endpoint",404);
		}
	}

	private function _response($data,$status = 200) {
		@header("HTTP/1.1 ".$status ." ". $this->_requestStatus($status));
		return $data;
	}

	private function _cleanInputs($data) {
	  $clean_input = Array();
	  if(is_array($data)){
	      foreach($data as $k => $v)
	      {
	          $clean_input[$k] = $this->_cleanInputs($v);
	      }
	  }else{
	      $clean_input = trim(strip_tags($data));
	  }
	  return $clean_input;
	}

	public function get_request_method() {

		return $_SERVER['REQUEST_METHOD'];
	}

	private function _requestStatus($code) {
	  
	  $status = array(
	      100 => 'Continue',  
	      101 => 'Switching Protocols',  
	      200 => 'OK',
	      201 => 'Created',  
	      202 => 'Accepted',  
	      203 => 'Non-Authoritative Information',  
	      204 => 'No Content',  
	      205 => 'Reset Content',  
	      206 => 'Partial Content',  
	      300 => 'Multiple Choices',  
	      301 => 'Moved Permanently',  
	      302 => 'Found',  
	      303 => 'See Other',  
	      304 => 'Not Modified',  
	      305 => 'Use Proxy',  
	      306 => '(Unused)',  
	      307 => 'Temporary Redirect',  
	      400 => 'Bad Request',  
	      401 => 'Unauthorized',  
	      402 => 'Payment Required',  
	      403 => 'Forbidden',  
	      404 => 'Not Found',  
	      405 => 'Method Not Allowed',  
	      406 => 'Not Acceptable',  
	      407 => 'Proxy Authentication Required',  
	      408 => 'Request Timeout',  
	      409 => 'Conflict',  
	      410 => 'Gone',  
	      411 => 'Length Required',  
	      412 => 'Precondition Failed',  
	      413 => 'Request Entity Too Large',  
	      414 => 'Request-URI Too Long',  
	      415 => 'Unsupported Media Type',  
	      416 => 'Requested Range Not Satisfiable',  
	      417 => 'Expectation Failed',  
	      500 => 'Internal Server Error',  
	      501 => 'Not Implemented',  
	      502 => 'Bad Gateway',  
	      503 => 'Service Unavailable',  
	      504 => 'Gateway Timeout',  
	      505 => 'HTTP Version Not Supported'
	  );
	  return ($status[$code])?$status[$code]:$status[500];
	}
}

//echo "Server :".var_dump($_SERVER);
if(!array_key_exists('HTTP_ORIGIN',$_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try{

    if(count($_REQUEST) >= 1) {
        $postdata = json_encode($_REQUEST);
        $dataObj = json_decode($postdata,false);
          
    } else {
        $postdata = file_get_contents("php://input");
        $dataObj = json_decode($postdata,false);
    }

    $API = new StudentPortalApi($_SERVER['REQUEST_URI'],$_SERVER['HTTP_ORIGIN']);
    $API->set_request($_SERVER['REQUEST_URI']);
    $API->set_inputdata($dataObj);

    echo (string) @$API->processAPI(); 

}catch(Exception $e) {
   echo json_encode(Array('error',$e->getMessage()));    
}

