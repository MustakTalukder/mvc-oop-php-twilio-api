<?php


include_once '../../vendor/twilio/sdk/Twilio/Rest/Client.php';

include_once '../models/twilio_model.php';


if(!isset($_SESSION)){
    session_start();
}


use Twilio\Rest\Client;

require_once "../../vendor/twilio/sdk/Twilio/autoload.php";

class twilio_controller {



    function __construct(){

        $this->twilio_model = new twilio_model();


    }

    public function index(){

     //   redirect(base_url()."twilio_controller/twilio_auth");
     //   $this->load->view('twilio');

    }





    public function save_twilio_auth_data($data){

        $twilio_sid = $data['twilio_sid'];
        $twilio_token = $data['twilio_token'];

        // print_r($twilio_sid);
        // print_r($twilio_token);

       
        $result = $this->twilio_model->save_twilio_auth_data($twilio_sid, $twilio_token );


        header('location: /app/views/twilio.php');
    }

    public function twilio_status(){
        $result = $this->twilio_model->get_user_twilio_info();

        if(empty($result->twilio_status)){
            print_r($result);
        }else{
            
            $result2 = $result->twilio_status;
            return $result2;
        }
        
        

        // $twilio_status = $result->twilio_status;


        // if($twilio_status == 1){
        //     $this->load->view('twilio');
        // }else{
        //     $this->load->view('twilio_auth');
        // }
    }


    public function get_data($data){

        $areacode = $data['area_code'];

     //   print_r($areacode);

        $sid    = "AC946f0e6e709b0501e976d5ed996dd940";
        $token  = "cce3496147c67a25d1aea652e00e1584";



        // $sid    = $sid;
        // $token  = $token;

        try{

            $twilio = new Client($sid, $token);
  
  
            $data = $twilio->availablePhoneNumbers("US")
                      ->local
                      ->read(array("areaCode" => $areacode), 20);
      
            $_SESSION['twilio_phone_numbers'] = $data;
     


            $my_array=array();

            foreach ($data as $record) {
              //  print($record->phoneNumber);

                array_push($my_array, $record->phoneNumber);
            }

            $_SESSION['twilio_number']=$my_array;
                // echo "<pre>";
          

             
            header('location: /app/views/twilio_list.php');
    

        } catch(Exception $error ){
            
          //  $session_data['twilio_auth_invalid'] = "Your auth is invalid! Please update your sid & token.";

          //  $this->session->set_userdata($session_data);

          //  redirect(base_url()."twilio_controller/twilio_auth_update");
            
        }
    }

                  
                  //  $this->load->view('twilio_list', $data);
                  //     echo "<pre>";
                  // print_r($data);
    // foreach ($local as $record) {
    //   echo $record->friendlyName;
    //     print($record->friendlyName);
    // }
                
                
    public function add_database($phonNumber){


        $result = $this->user_model->add_single_phone_number($phonNumber);

        echo "<pre>";
        print_r($result);
        

    }

    public function add_multiple_number($data){


        if(isset($_POST['save_twilio_list']))
        {
            $checkbox = $_POST['check_list']; 
        }

    
        $result = $this->twilio_model->get_saved_data();

        //print_r($result);


        if(empty($result->number)){

            $result = $this->twilio_model->add_multiple_phone_number($checkbox);

            header('location: /app/views/twilio.php');

       }else{

        $result = array_merge($result->number, $checkbox);

        $result = $this->twilio_model->add_multiple_phone_number($result);

        header('location: /app/controllers/twilio_controller.php?user=number');
        // redirect(base_url()."twilio_controller/twilio_number_list");

       }

    }


    public function twilio_number_list(){

        $result = $this->twilio_model->get_saved_data();

        $numbers = $result->number;

      //  $data = current($result->toArray());
       
        $number_array = array();

        foreach ($numbers as $number) {

          array_push($number_array, $number);
        }

       $_SESSION['my_numbers']= $number_array;


       header('location: /app/views/twilio_numbers.php');






        // $email = $this->session->userdata('email');
        // $payment = $this->session->userdata('payment');

        // if(empty($email)){
        //     $this->load->view('login');
        // }elseif (empty($payment) || $payment == 0) {
        //     redirect(base_url()."stripe_controller/");
        // }
        // else{

        //     $result = $this->user_model->get_saved_data();
            
        //     if(empty($result)){
        //         redirect(base_url()."twilio_controller/twilio_auth");
        //     }elseif (empty($result->number)) {

        //         $session_data['Number_not_abilable'] = "Number not found! Please buy new number";
        //         $this->session->set_userdata($session_data);

        //         redirect(base_url()."twilio_controller/twilio_auth");
        //     }
        //     else{
                
        //         $previous_number = $result->number;
        //         $data['local'] = $previous_number;
        //         $this->load->view('twilio_numbers', $data);
        //     }
        // }


    }



}


$obj = new twilio_controller();


if(isset($_GET['user']) == "number" ){
    $obj->twilio_number_list();
}


if(isset($_GET['method']) == "getdata" ){
    $obj->get_data($_POST);
}


if(isset($_POST['save_twilio_list'])){

    $obj -> add_multiple_number( $_POST['check_list']);

}
if(isset($_POST['area_code'])){

    $obj -> get_data($_POST);

}

if(isset($_GET['method']) == "save_twilio_auth_data"){

    $obj -> save_twilio_auth_data($_POST);

}

if(isset($_GET['method']) == "twilio_number_list"){

    print_r("asdlfj");

   // $obj -> twilio_number_list();

}
