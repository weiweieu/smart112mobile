<?php

class UserController extends Controller {
	protected $user;
	protected $country;

	public function __construct($request) {
		parent::__construct($request);
		if (session_status() != PHP_SESSION_ACTIVE) {
			session_start();
		}

		$userLogin = NULL;
		if(($request->read('userLogin'))) {
			$userLogin = $request->read('userLogin');
			$_SESSION['userLogin'] = $userLogin;
		}
		if(($request->read('country'))) {
			$this->country = $request->read('country');
		}
		if(!is_null($userLogin)) {
			$this->user = UserModel::getWithLogin($userLogin);
		} else{
			throw new Exception('a user must be defined');
		}



}


public function execute(){
			if(isset($_POST['validateStep2'])){
				return $this->validateStep2($this->request);
			}


		parent::execute();
	}


public function defaultViewClassName() {
		return 'UserView';
	}

//action
public function defaultAction($arg) {

//	echo "<h1>Hello " . $this->user->USER_LOGIN . "</h1>";

//	echo "<pre>";
//	print_r($this->user);
//	echo "</pre>";
		if(isset($_POST['validateStep1'])){
			return $this->inscriptionStep2($this->request);
		}

		$assistance_requests=RequestsModel::getAssistanceRequests();
		$emergency_types = ['ALL','FIRE','ACCIDENT'];
		$operator_types = ['OP_ALL','FIREMAN','POLICEMAN'];

		$view = new UserView($this, 'userContent');
		$view->setArg('emergency_types',$emergency_types);
		$view->setArg('operator_types',$operator_types);
		$view->setArg('requests',$assistance_requests);
		$view->setArg('language',$this->language);
		$view->render();

	}

//args = requete

//action
	public function inscriptionStep2($args){
			$departments=JurisdictionModel::getDepartmentsFromCountry($this->country);

			$view = new AnonymousView($this, 'inscriptionLocation');
			$view->setArg('language',$this->language);
			$view->setArg('departments',$departments);
			$view->render();
	}

//action
	public function validateStep2($args) {
		$department = $args->read('inscDepartment');
		if($department =='#' ){
							$department='';
		}
		$postcode = $args->read('inscPostcode');
		$town = $args->read('inscTown');
		$location = UserModel::createLocation($this->user->USER_LOGIN,$department,$postcode,$town);
/*
			$view = new UserView($this, 'userContent');
			$view->render();*/
			$this->inscriptionValidated($args);

	}


// action
	public function map($args) {
		$v = new UserView($this->user,'map');
		$v->setArg('language',$this->language);
		$v->renderDashboard();
	}
//

//action
public function inscriptionValidated($args) {
	$currentRequest = Request::getCurrentRequest();
	$currentRequest->write('controller','Anonymous');
	$newController = Dispatcher::getCurrentDispatcher()->dispatch($currentRequest);
	$newController->inscriptionValidated($args);
	session_destroy();
}

//action
	public function deconnexion($args) {
		$currentRequest = Request::getCurrentRequest();
		$currentRequest->write('controller','Anonymous');
		$newController = Dispatcher::getCurrentDispatcher()->dispatch($currentRequest);
		$newController->execute();
		session_destroy();
	}

}
