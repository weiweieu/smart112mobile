<?php

class AnonymousController extends Controller {


	function __construct($request){
		parent::__construct($request);
		/*//Language management
				if (isset($_GET['lang']) && $_GET['lang']!= '#' ) {
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
					$this->language = $tab_lang[0];
				}*/
}

	public function execute(){
		if(isset($_POST['login'])){
			return $this->validateConnection($this->request);
		}if(isset($_POST['validateStep1'])){
					return $this->validateStep1($this->request);
		}if(isset($_GET['lang'])){
				return $this->connection($this->request);
		}
		parent::execute();
	}

	public function defaultAction($arg) {
		$view = new AnonymousView($this, 'anonymousContent');

	/*//Language management
			if (isset($_GET['lang'])) {
				$this->language = $_GET['lang'];
				// register the session and set the cookie
				$_SESSION['lang'] = $this->language;
				setcookie('lang', $this->language, time() + (3600 * 24 * 30));

			}else if(isSet($_SESSION['lang'])){
				$this->language = $_SESSION['lang'];
			}else if(isSet($_COOKIE['lang'])){
				$this->language = $_COOKIE['lang'];
			}else{
				$tab_lang = explode(“_”, $_SERVER[‘HTTP_ACCEPT_LANGUAGE’]);
				$this->language = $tab_lang[0];
			}
*/

		$view->setArg('language',$this->language);
		$view->render();
	}




	//action d'inscription, renvoie vers le template d'inscription qui une fois
	//remplit set la variable POST inscritpion qui permet l'execution de validate inscription



	//action
	public function inscription($args) {
		$services=JurisdictionModel::getAllServices();
		$countries=JurisdictionModel::getAllCountries();


		$login = $args->read('inscLogin');
		$password = $args->read('inscPassword');
		$surname = $args->read('inscSurname');
		$name = $args->read('inscName');
		$email = $args->read('inscEmail');
		$service = $args->read('inscService');
		if($service == ''){
			$service='#serv';
		}
		$country = $args->read('inscCountry');
		if($country == ''){
			$country='#count';
		}

		if(isset($services) && isset($countries)){
		//Language management
					if (isset($_GET['lang']) && $_GET['lang']!= '#' ) {
						$this->language = $_GET['lang'];
						// register the session and set the cookie
						$_SESSION['lang'] = $this->language;
						setcookie('lang', $this->language, time() + (3600 * 24 * 30));

					}else if(isSet($_SESSION['lang']) && $_SESSION['lang']!= '#'){
						$this->language = $_SESSION['lang'];
					}else if(isSet($_COOKIE['lang']) && $_COOKIE['lang']!= '#'){
						$this->language = $_COOKIE['lang'];
					}else{
						$tab_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
						if(strcmp($tab_lang,'en') != 0  || strcmp($tab_lang,'fr') != 0 || strcmp($tab_lang,'es') != 0 ){
							$this->language = $tab_lang;
						}else{
							$this->language = 'en';
						}
					}
			$view = new AnonymousView($this, 'inscription');
			$view->setArg('login',$login);
			$view->setArg('password',$password);
			$view->setArg('surname',$surname);
			$view->setArg('name',$name);
			$view->setArg('email',$email);
			$view->setArg('service',$service);
			$view->setArg('country',$country);

			$view->setArg('services',$services);
			$view->setArg('countries',$countries);

			$view->setArg('language',$this->language);

			$view->render();
		}

	}


//action
  public function validateStep1($args){
		$services=JurisdictionModel::getAllServices();
		$countries=JurisdictionModel::getAllCountries();

		$login = $args->read('inscLogin');
		$password = $args->read('inscPassword');
		$surname = $args->read('inscSurname');
		$name = $args->read('inscName');
		$email = $args->read('inscEmail');
		$service = $args->read('inscService');

		$country = $args->read('inscCountry');


		$departments=JurisdictionModel::getDepartmentsFromCountry($country);
		if(UserModel::isLoginUsed($login)) {
			$view = new AnonymousView($this,'inscription');
			$view->setArg('login',$login);
			$view->setArg('password',$password);
			$view->setArg('surname',$surname);
			$view->setArg('name',$name);
			$view->setArg('email',$email);
			$view->setArg('service',$service);
			$view->setArg('country',$country);

			$view->setArg('services',$services);
			$view->setArg('countries',$countries);

			$view->setArg('language',$this->language);

			$view->setArg('inscErrorText','ALREADY_USED_LOGIN');
			$view->render();
		}	else if(UserModel::isEmailUsed($email)) {
			$view = new AnonymousView($this,'inscription');
			$view->setArg('login',$login);
			$view->setArg('password',$password);
			$view->setArg('surname',$surname);
			$view->setArg('name',$name);
			$view->setArg('email',$email);
			$view->setArg('service',$service);
			$view->setArg('country',$country);

			$view->setArg('services',$services);
			$view->setArg('countries',$countries);

			$view->setArg('language',$this->language);

			$view->setArg('inscErrorText','ALREADY_USED_MAIL');
			$view->render();
		} else {
			if(strlen(utf8_decode($login))<3){
				$view = new AnonymousView($this,'inscription');
				$view->setArg('login',$login);
				$view->setArg('password',$password);
				$view->setArg('surname',$surname);
				$view->setArg('name',$name);
				$view->setArg('email',$email);
				$view->setArg('service',$service);
				$view->setArg('country',$country);

				$view->setArg('services',$services);
				$view->setArg('countries',$countries);

				$view->setArg('language',$this->language);

				$view->setArg('inscErrorText', 'LOGIN_SUP_3');
				$view->render();
			}else if(strlen(utf8_decode($password))<3){
				$view = new AnonymousView($this,'inscription');
				$view->setArg('login',$login);
				$view->setArg('password',$password);
				$view->setArg('surname',$surname);
				$view->setArg('name',$name);
				$view->setArg('email',$email);
				$view->setArg('service',$service);
				$view->setArg('country',$country);

				$view->setArg('services',$services);
				$view->setArg('countries',$countries);

				$view->setArg('language',$this->language);

				$view->setArg('inscErrorText', 'PWD_SUP_3');
				$view->render();
			}else if(strpos($email,'@')== false){
				$error = 'INVALID_EMAIL';
				if($email==NULL){
					$error = 'UNSPECIFIED_EMAIL';
				}
				$view = new AnonymousView($this,'inscription');
				$view->setArg('login',$login);
				$view->setArg('password',$password);
				$view->setArg('surname',$surname);
				$view->setArg('name',$name);
				$view->setArg('email',$email);
				$view->setArg('service',$service);
				$view->setArg('country',$country);

				$view->setArg('services',$services);
				$view->setArg('countries',$countries);

				$view->setArg('language',$this->language);

				$view->setArg('inscErrorText', $error);
				$view->render();
			}else if($service =='#serv'){
					$view = new AnonymousView($this,'inscription');
					$view->setArg('login',$login);
					$view->setArg('password',$password);
					$view->setArg('surname',$surname);
					$view->setArg('name',$name);
					$view->setArg('email',$email);
					$view->setArg('service',$service);
					$view->setArg('country',$country);

					$view->setArg('services',$services);
					$view->setArg('countries',$countries);

					$view->setArg('language',$this->language);

					$view->setArg('inscErrorText', 'SELECT_SERVICE');
					$view->render();
				}else if($country =='#count'){
							$view = new AnonymousView($this,'inscription');
							$view->setArg('login',$login);
							$view->setArg('password',$password);
							$view->setArg('surname',$surname);
							$view->setArg('name',$name);
							$view->setArg('email',$email);
							$view->setArg('service',$service);
							$view->setArg('country',$country);

							$view->setArg('services',$services);
							$view->setArg('countries',$countries);

							$view->setArg('language',$this->language);

							$view->setArg('inscErrorText', 'SELECT_COUNTRY');
							$view->render();
						}else{
							$user = UserModel::create($login,$password,$email,$surname,$name,$service,$country);
							UserModel::attributeLocation($login,$password);
						}
							}
			if(!isset($user)) {
				$view = new AnonymousView($this,'inscription');
				$view->setArg('login',$login);
				$view->setArg('password',$password);
				$view->setArg('surname',$surname);
				$view->setArg('name',$name);
				$view->setArg('email',$email);
				$view->setArg('service',$service);
				$view->setArg('country',$country);

				$view->setArg('services',$services);
				$view->setArg('countries',$countries);

				$view->setArg('language',$this->language);

				$view->setArg('inscErrorText', 'REGISTRATION_IMPOSSIBLE');
				$view->render();
			}else {
				$newRequest = new Request();
				$newRequest->write('controller','User');
				$newRequest->write('userLogin',$user->USER_LOGIN );
				$newRequest->write('country',$country );
				$newRequest->write('language',$this->language );
				$newController = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
				$newController->execute();
		//	$newController->inscriptionStep2($newRequest,$country);
					/*$view = new UserView($this, 'inscriptionLocation');
					$view->setArg('departments',$departments);
					$view->render();*/
			}
		}




		//action
		public function connection($args) {
		$this->defaultAction($args);
	}

		public function validateConnection($args) {
		$login = $args->read('inscLogin');
		$password = $args->read('inscPassword');
		if(!UserModel::isLoginUsed($login)) {
			$view = new View($this,'anonymousContent');
			$view->setArg('language', $this->language);
			$view->setArg('inscErrorText','CONNECTION_LOGIN');
			$view->render();
		}else if(!UserModel::isAccountValidated($login)){
			$view = new View($this,'anonymousContent');
			$view->setArg('language', $this->language);
			$view->setArg('inscErrorText','ACCOUNT_NOT_REGISTERED');
			$view->render();
		}else {
			$user = UserModel::tryConnect($login,$password);
			if($user==NULL) {
				$view = new View($this,'anonymousContent');
				$view->setArg('language', $this->language);
				$view->setArg('inscErrorText', 'CONNECTION_PWD');
				$view->render();
			} else {

				$newRequest = new Request();
				$newRequest->write('controller','User');
				$newRequest->write('userLogin',$user->USER_LOGIN );
				$newController = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
				$newController->execute();
			}
		}

	}



/*
//action
	public function validateInscription($args) {


		$department = $args->read('inscDepartment');



		if($department =='-- Choisir un departement --' ){
							$department='';
		}
		$location = UserModel::createLocation($department);

		if(!isset($location)) {
			$services=JurisdictionModel::getAllServices();
			$countries=JurisdictionModel::getAllCountries();
			$login = $args->read('inscLogin');
			$password = $args->read('inscPassword');
			$surname = $args->read('inscSurname');
			$name = $args->read('inscName');
			$email = $args->read('inscEmail');
			$service='-- Choisir un service --';
			$country='-- Choisir un pays --';
				$view = new AnonymousView($this,'inscription');
				$view->setArg('services',$services);
				$view->setArg('countries',$countries);
				$view->setArg('login',$login);
				$view->setArg('password',$password);
				$view->setArg('surname',$surname);
				$view->setArg('name',$name);
				$view->setArg('email',$email);
				$view->setArg('service',$service);
				$view->setArg('country',$country);
				$view->setArg('inscErrorText', 'Impossible de valider l\'inscription');
				$view->render();
		}else {
				$newRequest = new Request();
				$newRequest->write('controller','User');
				//$newRequest->write('userLogin',$user->USER_LOGIN );
				$newController = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
				$newController->execute();
		}
	}

*/
	//action
	public function inscriptionValidated($requete) {
		$view = new AnonymousView($this, 'inscriptionValidated');
		$view->setArg('language',$this->language);
		$view->render();
	}
	//action
	public function deconnexion($requete) {
		$this->defaultAction($requete);
	}


	//action
	public function apropos($arg){
			$view = new AnonymousView($this, 'apropos');
			$view->render();
	}
}
?>
