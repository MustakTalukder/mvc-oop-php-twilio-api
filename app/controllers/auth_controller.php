<?php
 include_once '../models/user_model.php';

// require_once __DIR__ . '../../vendor/autoload.php';

if(!isset($_SESSION)){
    session_start();
}



class Auth_controller{


    protected $user_model;

    function __construct()
    {
        $this->user_model = new user_model();
    }


    public function index()
	{
      //  print_r($_SESSION['email']);

        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $payment = $_SESSION['payment'];


            if($payment == 0){

                header('location: /stripe-payment/');
            }else{
                header('location: /app/views/twilio.php');
            }

        }



    }

    public function home()
    {
        header('location: ../views/home.php');
    }



    public function registration($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $password = md5($password);

       $this->user_model->create_user($email, $password);

       $_SESSION['registration_successfull'] = 'registration_successfull !!!';

       header('location: /app/views/login.php');

    }

    public function check_login($data){
        $email = $data['email'];
        $password = $data['password'];

        $data = array(
            'email' => $email,
            'password' => $password
          //  'payment' => 1
        );

        $result = $this->user_model->is_user_exist($data);
        
        if($result == false){

           $_SESSION['logn_failed'] = 'Login failed !!!';
           header('location: ../views/login.php');

            
        }else{


            $_id = (string) $result->_id;


            $_SESSION['logn_succes'] = 'Login successfull !!!';
            $_SESSION['email'] = $email;
            $_SESSION['payment'] = $result->payment;


            header('location: /app/controllers/auth_controller.php/?controller=index');
    
        }
        
    }

    public function logout(){

       session_destroy();
     //   var_dump($_SESSION['email']);
       header('location: ../views/login.php');
    }
    
    
}

$obj = new Auth_controller();


// var_dump($_POST);

 // var_dump($_GET['controller']);

if(isset($_GET['controller']) == "index" ){
    $obj->index();
}

if(isset($_GET['user']) == "logout" ){
    $obj->logout();
}

if(isset($_POST['registration'])){
    $obj->registration($_POST);

}

if(isset($_POST['login'])){
    $obj->check_login($_POST);
}



?>