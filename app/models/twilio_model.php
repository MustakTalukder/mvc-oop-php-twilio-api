<?php

class twilio_model {
	
	private $database = 'mvc';
	private $collection = 'twilio';
	
	function __construct() {
		// parent::__construct();
		// $this->load->library('mongodb');
		// $this->conn = $this->mongodb->getConn();
	}
	
	
	function add_multiple_phone_number($checkbox){


		$email = $_SESSION['email'];


		$query = new MongoDB\Driver\BulkWrite();
		$query->update(
			['email' => $email], 
			['$set' => array('number' => $checkbox )]);
	
		$connection = new MongoDB\Driver\Manager('mongodb://localhost:27017');
		$result = $connection->executeBulkWrite($this->database.'.'.$this->collection, $query);
		
		return $result;

	}


	function save_twilio_auth_data($twilio_sid, $twilio_token ){

		$email = $_SESSION['email'];


		try {
			$twilio_data = array(
    
				'email' => $email,
				'twilio_sid' => $twilio_sid,
				'twilio_token' => $twilio_token,
				'twilio_status' => 1
			);
			
			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($twilio_data);
			
			$connection = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			$result = $connection->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
            return $result;

			// if($result == 1) {
			// 	return TRUE;
			// }
			
			// return FALSE;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}



	function save_twilio_auth_update_data($twilio_sid, $twilio_token ){

        $_id = $this->session->userdata('_id');
		$email = $this->session->userdata('email');
		
		try {

			$query = new MongoDB\Driver\BulkWrite();
			$query->update(
				['email' => $email], 
				['$set' => array('twilio_sid' => $twilio_sid, 'twilio_token' => $twilio_token)]);


            $result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
            
            return $result;

			// if($result == 1) {
			// 	return TRUE;
			// }
			
			// return FALSE;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}

	function get_user_twilio_info(){
        $_id = $this->session->userdata('_id');
        $email = $this->session->userdata('email');

		try {

            $filter = ['email' => $email];
			$query = new MongoDB\Driver\Query($filter);
			
            $result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);
			$result = current($result->toArray());
			
            return $result;


		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			print_r("sdkfh");
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}


	function get_saved_data(){

		try {

			$email = $_SESSION['email'];

			$filter = ['email' => $email];
			$query = new MongoDB\Driver\Query($filter);
			
			$connection = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			$result = $connection->executeQuery($this->database.'.'.$this->collection, $query);
			
			$result = current($result->toArray());

			return $result;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			return false;
		}

	}




	
}