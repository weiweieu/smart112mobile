<?php


class UserModel extends Model {

	 protected static $table_name = 'USER';


	public static function tryConnect($log,$pwd){

		$stmt=static::execute('USER_CONNECT',
				array(':login'=>$log,
						':password'=>$pwd
				));
		return $stmt->fetch();
	}

//
	public static function getWithLogin($login) {
		$r = static::execute('USER_GET_WITH_LOGIN',
					array(':login' => $login));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function getWithId($id) {
		$r = static::execute('USER_GET_WITH_ID',
					array(':id' => $id));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function isLoginUsed($login){
		$u = static::getWithLogin($login);
		return  $u !== null;
	}
//
	public static function getWithPassword($password) {
		$r = static::execute('USER_GET_WITH_PWD',
					array(':pwd' => $password));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function isPasswordUsed($password){
		$u = static::getWithPassword($password);
		return  $u !== null;
	}
//
		public static function getWithEmail($mail) {
		$r = static::execute('USER_GET_WITH_EMAIL',
					array(':email' => $mail));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function isEmailUsed($mail){
		$u = static::getWithEmail($mail);
		return  $u !== null;
	}


	public static function isAccountValidated($login){
		$u = static::getWithLogin($login);
		return ($u->USER_IS_VALIDATED == 1) ;
	}
//


	public static function getAllUsers(){
		return static::query(static::$tableau_requetes['USER_LIST'])->fetchAll();
	}

	public static function create($login,$password,$email,$surname,$name,$service,$country){

			if(!static::isLoginUsed($login)){
				static::execute('USER_CREATE',
					array(':login' => $login,
							':pwd' => $password,
							':email' => $email,
							':name' => $name,
							':surname' => $surname,
							':service' => $service,
							':country' => $country
							));
			 }
		$user = static::tryConnect($login,$password);
		 return $user;
	}

	public static function getIdWithLogin($login){
		$r = static::execute('USER_GET_ID_WITH_LOGIN',
					array(
						':login' => $login
				));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function attributeLocation($login){
			$user=static::getIdWithLogin($login);
		$user_id=$user->USER_ID;
		static::execute('USER_ATTRIBUTE_LOCATION',
			array(
					':user_id' => $user_id
					));

}

	public static function createLocation($login,$department,$postcode,$town){
		$user=static::getIdWithLogin($login);
		$user_id=$user->USER_ID;
		static::execute('USER_CREATE_LOCATION',
			array(
					':user_id' =>$user_id,
					':department_name' => $department,
					':postcode' => $postcode,
					':town' => $town
					));
			 $location = static::getLocation($user_id);
			 return $location;
	}

	public static function getLocation($user_id){
		$r = static::execute('GET_LOCATION_WITH_USER_ID',
					array(
						':user_id' => $user_id
				));
		return ($r->rowCount() !== 0) ? $r->fetch() :  null;
	}

	public static function changeLogin($currentLogin,$newLogin){
			static::execute('USER_CHANGE_LOGIN',
				array(':currentLogin'=>$currentLogin,
						':newLogin'=>$newLogin
				));
				$user = static::tryConnect($login,$password);
				return $user;
				//echo 'login has changed';
	}



	public function id() {
		return $this->props[self::$table_name.'_ID'];
		}
	public function nom() {
		return $this->props[self::$table_name.'_SURNAME'];
	}
	public function prenom() {
		return $this->props[self::$table_name.'_NAME'];
	}
	public function login() {
		return $this->props[self::$table_name.'_LOGIN'];
	}

	}
