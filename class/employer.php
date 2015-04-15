<?php 
	class employer {
	public $surname;
	public $name;
	public $patronimic;
	public $age;
	
	public function get_age() {
		return $this->age;
	}
	public function set_age($val) {
		$val=intval($val);
		if ($val>=10 && $val<=65) {
		$this->age=$val;
		return TRUE;
		}
		else {
		return FALSE;
		
	}
	
}
	public function get_info(){
		return $this->surname." ".$this->name." ".$this->patronimic." ";
	}	
	public function get_full_info() {
		return $this->get_info()." ".$this->get_age()." ";
	}

	
	
	
	}
?>