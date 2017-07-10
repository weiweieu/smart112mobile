<?php

class Request extends MyObject {

	private $controllerName;
	private $actionName;


	protected static $singleton;

	public static function getCurrentRequest(){
		if(is_null(static::$singleton))
			static::$singleton = new static();

		return static::$singleton;
	}

	public function __construct(){

		$this->controllerName = self::getControllerName();

	}

	public function getControllerName(){

		$this->controllerName = 'Anonymous';

		if(isset($_GET['controller'])){
			$this->controllerName= $_GET['controller'];
		}else if(isset($_POST['controller'])) {
				$this->controllerName= $_POST['controller'];
		}else if(isset($_SESSION['controller'])){
				$this->controllerName= $_SESSION['controller'];
		}else if(isset($_COOKIE['controller'])){
				$this->controllerName= $_COOKIE['controller'];
		}
	
		return $this->controllerName;
	}



	public function read($arg){
		if(isset($_GET[$arg])){
			return ($_GET[$arg]);
		}
		if(isset($_POST[$arg])){
			return ($_POST[$arg]);
		}
		if(isset($_SESSION[$arg])){
			return ($_SESSION[$arg]);
		}
	}

	public function getActionName(){
		return isset($_GET['action'])?$_GET['action']:'defaultAction';
	}


	public function setActionName($action){
		return $this->actionName = $action;
	}

	public function hasGET($var){
		return isset($_GET[$var]);
	}

	public function hasPOST($var){
		return isset($_POST[$var]);
	}

	public function has($var){
		return $this;
	}

	public function write($key,$newValue){
			if(!isset($_GET[$key]) || (isset($_GET[$key]) && $_GET[$key]!=$newValue)){
				$_GET[$key] = $newValue;
			}
			if(!isset($_POST[$key]) || (isset($_POST[$key]) && $_POST[$key]!=$newValue)){
				$_POST[$key] = $newValue;
			}
			if(!isset($_SESSION[$key]) || (isset($_SESSION[$key]) && $_SESSION[$key]!=$newValue)){
				$_SESSION[$key] = $newValue;
			}
			if(!isset($_COOKIE[$key]) || (isset($_COOKIE[$key]) && $_COOKIE[$key]!=$newValue)){
				$_COOKIE[$key] = $newValue;
			}

	}
}

?>
