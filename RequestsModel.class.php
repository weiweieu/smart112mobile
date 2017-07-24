<?php


class RequestsModel extends Model {

	 protected static $table_name = 'ASSISTANCE_REQUEST';


	public static function getAssistanceRequests(){
    $test =static::query(static::$tableau_requetes['REQUESTS_LIST'])->fetchAll();
		return $test;

	}

  public function request_id() {
		return $this->props[self::$table_name.'_ID'];
		}

  public function request_device() {
    return $this->props['REQUEST_DEVICE'];
    }

  public function timestamp() {
    return $this->props['TIMESTAMP'];
    }

  public function request_type_of_incident() {
    return $this->props['REQUEST_TYPE_OF_INCIDENT'];
    }

	public function group_id() {
		return $this->props['GROUP_ID'];
		}

	public function status() {
		return $this->props['STATUS'];
	}

  public function caller_id() {
    return $this->props['CALLER_ID'];
  }

  public function is_victim() {
    return $this->props['VICTIM'];
  }

  public function caller_name() {
    return $this->props['CALLER_NAME'];
  }

  public function caller_surname() {
    return $this->props['CALLER_SURNAME'];
  }

  public function caller_phone_number() {
    return $this->props['CALLER_PHONE_NUMBER'];
  }

  public function caller_nationality() {
    return $this->props['CALLER_NATIONALITY'];
  }

  public function caller_location() {
    return $this->props['CALLER_LOCATION'];
  }

  public function called_number() {
    return $this->props['CALLED_NUMBER'];
  }
	}
