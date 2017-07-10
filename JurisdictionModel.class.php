<?php


class JurisdictionModel extends Model {

	 protected static $table_name = 'JURISDICTION';


	public static function getAllCountries() {
		return static::query(static::$tableau_requetes['COUNTRY_LIST'])->fetchAll();
	}

  public static function getAllServices() {
    return static::query(static::$tableau_requetes['SERVICE_LIST'])->fetchAll();
  }

	public static function getAllDepartments() {
    return static::query(static::$tableau_requetes['DEPARTMENT_LIST'])->fetchAll();
  }

	public static function getDepartmentsFromCountry($country){
		$r = static::execute('DEPARTMENTS_GET_WITH_COUNTRY',
					array(':country' => $country));
		return ($r->rowCount() !== 0) ? $r->fetchAll() :  null;
	}

	public function id() {
		return $this->props[self::$table_name.'_ID'];
		}
	public function country() {
		return $this->props[self::$table_name.'_COUNTRY'];
	}
  public function serviceName() {
		return $this->props['SERVICE_NAME'];
	}

	public function departmentName() {
		return $this->props['DEPARTMENT_NAME'];
	}

	public function departmentNumber() {
		return $this->props['DEPARTMENT_NUMBER'];
	}

	}
