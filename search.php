<?php
$text = $_POST;
if ( is_numeric($text['search']) == true ) {
	$search_id = $text['search'];
} else $search_name = $text['search'];

if ( $text['check1'] ) {
	$search_check = 'work';
} elseif ( $text['check2'] ) {
	$search_check = 'connecting';
} else $search_check = 'disconnected';

class Fabriq {
	public static $db_connect = NULL;

	public static function getDBconnect() {
		if (self::$db_connect == null) {
			self::$db_connect = new Fabriq;
		}
		return self::$db_connect;
	}

	function __construct() {
		$this->mysqli = new mysqli('localhost','mysql','mysql','test');
		if ($mysqli->connect_error) {
			die('Connect Error(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
		}
	}

	public function select($query_params) {
		$result = $this->mysqli->query($query_params, MYSQLI_USE_RESULT);
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
			$stack[] = $row;
		}
		return json_encode($stack);
	}

	public function __destruct() {
		if ($this->mysqli) {
			$this->mysqli->close();
		}
	}
}

$obj = Fabriq::getDBconnect();
$result = $obj->select("SELECT
obj_customers.id_customer,
obj_customers.name_customer,
obj_customers.company,
obj_contracts.id_contract,
obj_contracts.number,
obj_contracts.date_sign,
obj_contracts.staff_number,
obj_services.id_service,
obj_services.title_service,
obj_services.`status`
FROM
obj_contracts
INNER JOIN obj_services ON obj_services.id_contract = obj_contracts.id_contract
INNER JOIN obj_customers ON obj_contracts.id_customer = obj_customers.id_customer
WHERE obj_services.status='$search_check' AND obj_customers.id_customer='$search_id' OR obj_customers.name_customer='$search_name'");
print_r($result);