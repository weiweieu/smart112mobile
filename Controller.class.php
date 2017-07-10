<?php


abstract class Controller extends MyObject {

	protected $action;
	protected $request;
	protected $name;
	protected $viewClassName;
	protected $language;

	public function __construct($request) {

			$this->request = $request;
			$this->viewClassname = $this->defaultViewClassName();
			$this->action = $this->getActionName();
			$this->name= $request->getControllerName().'Controller';
			// echo $this->name;
// 			echo '<br>';
			//var_dump($request->getControllerName());

			//Language management
			if($request->read('language')!=NULL) {
				$this->language = $request->read('language');
				$_SESSION['lang'] = $this->language;
				setcookie('lang', $this->language, time() + (3600 * 24 * 30));
			}else if (isset($_GET['lang']) && $_GET['lang']!= '#' ) {
				$this->language = $_GET['lang'];
				// register the session and set the cookie
				$_SESSION['lang'] = $this->language;
				setcookie('lang', $this->language, time() + (3600 * 24 * 30));

			}else if(isSet($_SESSION['lang']) && $_SESSION['lang']!= '#'){
				$this->language = $_SESSION['lang'];
			}else if(isSet($_COOKIE['lang']) && $_COOKIE['lang']!= '#'){
				$this->language = $_COOKIE['lang'];
			}else{
				$tab_lang = explode(“_”, $_SERVER[‘HTTP_ACCEPT_LANGUAGE’]);
				if($tab_lang[0] == en || $tab_lang[0] == fr || $tab_lang[0] == es){
					$this->language = $tab_lang[0];
				}else{
					$this->language = 'en';
				}
			}

	}


	public abstract function defaultAction($request);

	public function getActionName() {
		return $this->request->getActionName();
	}


	public function defaultViewClassName() {
		return 'View';
	}

	public function execute(){
		$methodName = $this->request->getActionName();

		if(!method_exists($this,$methodName))
			throw new Exception('Action "' . $this->action . '" does not exists on controller ' . get_class($this));

		$this->$methodName($this->request);
	}

}
?>
