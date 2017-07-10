<?php

abstract class Model extends MyObject {


	protected static $tableau_requetes =array();
	protected $props;

	public function __construct($props = array()) {
		$this->props = $props;
	}

	public function __get($prop) {
		return $this->props[$prop];
	}

	public function __set($prop, $val) {
		$this->props[$prop] = $val;
	}


		protected static function db(){
			return DatabasePDO::getSinglePDO();
	}

	// Execute la requete $sql et retourne des objets modeles
	protected static function query($sql){
		$st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
		$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
		return $st;

	}

	public static function execute($key,$tab=array()){
			$sql = static::db()->prepare(static::$tableau_requetes[$key]);
		//	echo 'tableau_requetes';
		//	print_r(static::$tableau_requetes);
			$sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());

			foreach ($tab as $key => $value){
				$sql->bindParam($key,$value);
			}
			$sql->execute($tab);
			return $sql;
	}

	public static function addSqlQuery($action,$requete_sql){
			static::$tableau_requetes[$action] = $requete_sql;
	}
}
