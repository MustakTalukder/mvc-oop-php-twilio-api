<?php
class user_model{
    
    private $database = 'mvc';
	private $collection = 'users';
	private $collection_twilio = 'twilio';

    public function save($email, $password)
    {
        print_r($email);
        print_r($password);
    }

    function create_user($email, $password) {
		try {
			$user = array(
				'email' => $email,
				'password' => $password,
				'payment' => 0
			);
			
			$query = new MongoDB\Driver\BulkWrite();
            $query->insert($user);
            
			$connection = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            $result = $connection->executeBulkWrite($this->database.'.'.$this->collection, $query);
            
            return true;
          //  var_dump($result);

			// if($result == 1) {
			// 	return TRUE;
			// }
			
			// return FALSE;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}

		
	function is_user_exist($data) {

		try{

			$email = $data['email'];

			//var_dump($email);

			$filter = ['email' => $email];
			$query = new MongoDB\Driver\Query($filter);

			$connection = new MongoDB\Driver\Manager('mongodb://localhost:27017');
			
			$result = $connection->executeQuery($this->database.'.'.$this->collection, $query);

			//var_dump($result);

			$user = current($result->toArray());

			$database_password = $data['password'];
			$database_password = md5($database_password);

			if(!empty($user) && ($user->password == $database_password)){

				return $user;

			}else{
				return false;
			}

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching user: ' . $ex->getMessage(), 500);
		}

	}
    
}


?>