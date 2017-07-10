<?php
	class DatabasePDO extends PDO {

	protected static $singlePDO = null;

	public function __construct(){

		$DB_HOST = '127.0.0.1';
		//$DB_HOST = 'localhost';
		$DB_NAME = '112Mobile';
		$DB_USER = 'root';
		$DB_PWD = 'root';

		try{
			parent::__construct("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",
				$DB_USER,
				$DB_PWD,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		catch(Exception $e){
			 echo 'Connexion échouée : ' . $e->getMessage();
			die('Error while connecting to MySQL.');
		}
	}

	public static function getSinglePDO(){
		if(static::$singlePDO == null)
			static::$singlePDO = new static;

		return static::$singlePDO;
	}

	}

?>
