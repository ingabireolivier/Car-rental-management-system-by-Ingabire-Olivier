<?php
require_once(LIB_PATH.DS.'database.php');
class StudPagination {
	
	protected static $tbl_name = "tblstudent";
	public $current_page;
	public $per_page;
	public $total_count;
	
	public function __construct($page=1, $per_page=20, $total_count=0){
		$this->current_page = (int)$page;
		$this->per_page = (int)$per_page;
		$this->total_count = (int)$total_count;
	}
	
	function count_allrecords(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tbl_name);
		$retval= $mydb->executeQuery();
		$total_count= $mydb->num_rows($retval);
		return $total_count;
	}
	
	public function offset(){
		//get the off set current page minus 1 multiply by record per page	
		return ($this->current_page - 1) * $this->per_page;
	}
	
	public function total_pages(){
		//it gets the result of total_count over per page
		return ceil($this->total_count/$this->per_page);
	}
	
	public function previous_page(){
		//move to previous record by subtracting one into the current record
		return  $this->current_page - 1;
	}
	public function next_page(){
		//mvove to next record by incrementing the current page by one		
		return  $this->current_page + 1;
		
	}
	
	public function has_previous_page(){
		//check if previous record is still greater than one then it returns to true
		return $this->previous_page() >= 1 ? true : false;
	}
	
	public function has_next_page(){
		//check if Next record is still lesser than one total pages then it returns to true
		return  $this->next_page() <= $this->total_pages() ? true : false;
	}	
	

	/*-Comon SQL Queries-*/
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
	
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
	
	
	
}	
	
?>