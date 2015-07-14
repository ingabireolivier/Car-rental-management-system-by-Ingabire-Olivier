<?php

require_once(LIB_PATH.DS.'database.php');
class User{
	
	protected static $tbl_name = "useraccounts";
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
	function listOfmembers(){
		global $mydb;
		$mydb->setQuery("Select * from ".self::$tbl_name);
		$cur = $mydb->loadResultList();
		return $cur;
	
	}
	function single_user($id=0){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where `ACCOUNT_ID`= {$id} LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function find_all_user($name=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE  `ACCOUNT_NAME` ='{$name}'");
			$cur = $mydb->executeQuery();
			$row_count = $mydb->num_rows($cur);//get the number of count
			return $row_count;
	}

	 static function AuthenticateUser($email="", $h_upass=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM `useraccounts` WHERE `ACCOUNT_USERNAME`='" . $email . "' and `ACCOUNT_PASSWORD`='" . $h_upass ."' LIMIT 1");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);//get the number of count
		 if ($row_count == 1){
		 $found_user = $mydb->loadSingleResult();
		    $_SESSION['justadmin_ID'] 	 = $found_user->ACCOUNT_ID;
            $_SESSION['admin_ACCOUNT_NAME']    = $found_user->ACCOUNT_NAME;
            $_SESSION['admin_ACCOUNT_USERNAME']= $found_user->ACCOUNT_USERNAME;
            $_SESSION['admin_ACCOUNT_PASSWORD']= $found_user->ACCOUNT_PASSWORD;
            $_SESSION['admin_ACCOUNT_TYPE']    = $found_user->ACCOUNT_TYPE;
        	return true;
			}else{
				return false;
			}	
				
	} 	
/* 	static function AuthenticateMember($email="", $h_upass=""){
		global $mydb;
		$res=$mydb->setQuery("SELECT * FROM `user_info` WHERE `email`='" . $email . "' and `pword`='" . $h_upass ."' LIMIT 1");
		 $found_user = $mydb->loadSingleResult();
		   $_SESSION['member_id'] = $found_user['member_id'];
            $_SESSION['fName']     = $found_user['fName'];
            $_SESSION['lName']     = $found_user['lName'];
            $_SESSION['email']     = $found_user['email'];
            $_SESSION['pword']     = $found_user['pword'];
            $_SESSION['mm']        = $found_user['mm'];
            $_SESSION['dd']        = $found_user['dd'];
            $_SESSION['yy']        = $found_user['yy'];
            $_SESSION['gender']    = $found_user['gender'];
		return $found_user;	
	} */	
	
	/*---Instantiation of Object dynamically---*/
	static function instantiate($record) {
		$object = new self;

		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		} 
		return $object;
	}
	
	
	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  global $mydb;
	  $attributes = array();
	  foreach($this->db_fields() as $field) {
	    if(property_exists($this, $field)) {
			$attributes[$field] = $this->$field;
		}
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $mydb;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $mydb->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	
	/*--Create,Update and Delete methods--*/
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$tbl_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	echo $mydb->setQuery($sql);
	
	 if($mydb->executeQuery()) {
	    $this->id = $mydb->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update($id=0) {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tbl_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ACCOUNT_ID=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tbl_name;
		  $sql .= " WHERE ACCOUNT_ID=". $id;
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
	
	}
		
}
?>