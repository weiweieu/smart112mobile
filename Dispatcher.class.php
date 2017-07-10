<?php

class Dispatcher extends MyObject {
	
	
	//singleton
	protected static $singleDisp = NULL;

	public static function getCurrentDispatcher(){
		if(is_null(static::$singleDisp))
			static::$singleDisp = new static();

		return static::$singleDisp;
	}
	
	
	
	public static function dispatchToController($controllerName, $request){
		$controllerClassName = ucfirst($controllerName) . 'Controller';
		
		if($controllerClassName == 'UserController'){
			if(!isset($_SESSION['user'])){
				$controllerClassName == 'AnonymousController';
			}
		}
		
		if(!class_exists($controllerClassName))
			throw new Exception("$controllerName does not exists");
		
		return new $controllerClassName($request);
	}
	
	
	
	public static function dispatch($request){
		if($request->getControllerName()=='Anonymous'){
			if(isset($_SESSION['user'])){
				$request->write('controller','User');
			}
		}
		return static::dispatchToController($request->getControllerName(),$request);
	}

}

?>