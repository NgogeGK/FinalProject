<?php defined('BASEPATH') or exit ('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';


class API extends REST_Controller{

function __contruct(){

    parent:: __construct();
    $this->load->helper('my_api');
    header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }

}

public function index_options() {
    return $this->response(NULL, 200);
}

function yangu()
{
    $this->load->model('repo_model');
    $this->load->view('welcome_message');

}

//////JKUSDA NURTURING DEPARTMENT API
// memeber profile to be sorted when doing the clerks module, for not it has to be set manually in the db


//authentication

function auth_post(){
            //initial auth of the api user to get them an api key, post username and password
            $data=$this->post();
            // set validation rules
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_data($data);
            $this->form_validation->set_rules('phone', 'phone', 'alpha_dash|min_length[9]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean' );

             if($this->form_validation->run()!=false ){

                    $this->load->model('maine_model');
                    $login=$this->maine_model->fast_login($data['email'],$data['password']);
                    if($login!=null){
                        // $this->load->model('maine_model');
                        $txt=$login;
                        unset($txt['api_key']);
                        unset($txt['id']);
                        $txt['field']='user';
                        $data=$txt;
                        unset($login->api_key);
                        $this->maine_model->firebase($login,$login['user_id'], 'apiuser');
                        $this->response(array('status'=>true,'message'=>$login) );

                    }else{

                        $this->response(array('status'=>false,'message'=>'Unauthorised'),Rest_controller::HTTP_BAD_REQUEST );

                    }
                    // echo json_encode($this->maine_model->fast_login($data['email'],$data['password']));

                }else{

                    $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller:: HTTP_BAD_REQUEST);


                }




}


//notifications

function notify_post(){
        $data = $this->post();
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('notification', 'notification', 'trim|required');
        $this->form_validation->set_rules('target', 'target', 'required|trim');
        $this->form_validation->set_rules('message', 'message', 'required|trim|xss_clean' );

         if($this->form_validation->run()!=false ){
                unset($data['api-key']);
                // $this->load->model('maine_model');
                $url = 'https://mine-382e3.firebaseio.com/notifications.json';

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
                $response = curl_exec($ch);
                if(!$response){
                    $response = false;
                }
                $this->response(array('status'=>true,'message'=>$response) );

            }else{
                $this->response(array('status'=>false,'message'=>validation_errors()) );

            }

}




function members_all_post(){

        $data=$this->post();
        $this->load->model('maine_model');
        // $url='http://localhost/jkusda.api/memberget';
        $url='http://api.jkusdachurch.org/memberget';
        $dat=array('api-key'=>'123456ouaoidkjuidsxiudinjdsjnds');
        $studs=$this->maine_model->api($url,$dat);
        // $url='http://localhost/jkusda.api/assocget';
        $url='http://api.jkusdachurch.org/assocget';
        $assoc=$this->maine_model->api($url,$dat);

        $result = array_merge(array($studs), array($assoc));
        if($result!=null){
        //     $this->load->model('maine_model');
        // $data=array('message'=>"Nimeitwa");
        //     $this->maine_model->pusher($data);

        $this->response(array('status'=>true,'message'=>$result) );
        }else{
           $this->response(array('status'=>false,'message'=>'Unknown error') );
        }

}



    function leteni_post(){

        //creates a record of new student members in the church

    $data=$this->post();
    $this->form_validation->set_data($data);
                if($this->form_validation->run('register')!=false ){

                    $payload=array('name' => $data['name'],
                    'phone'=>$data['phone'],
                    'email'=>$data['email'],
                        'gender'=>$data['gender'],
                        'member_type'=>1,
                    'status'=>1
                     );
                    $this->load->model('family_model');
                    $mine=$this->family_model->get_by(array('email'=>$payload['email']));

                    if($mine != null){
                        $id=$mine['id'];
                        // $this->family_model->update($id,$payload);
                        $this->response(array('status'=>false,'message'=>'User Already exists','data'=>$mine) );
                    }else{
$done=$this->family_model->insert($payload);

    if($done){
        $this->load->model('maine_model');
                $data=array('message'=>"New student");
              $this->maine_model->pusher($data);

    $this->response(array('status'=>'Success','message'=>'Member inserted successfully'));

}else{
    $this->response(array('status'=>false,'message'=>'Unknown error'),Rest_controller::HTTP_INTERNAL_SERVER_ERROR );
}
}


}else{
    $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);
}


}

function member_post(){

// $this->load->model('family_model');
// $datae=$this->family_model->wote();
    $data=$this->post();
    if(!empty($data)){
    $this->form_validation->set_data($data);
    if($this->form_validation->run('wote')!=false){
        $payload=array();
        $tbl='member';
        if(isset($data['id'])){
            $payload[$tbl.'_id']=$data['id'];
        }
                        if (array_key_exists("email",$data))
                             {
                                $payload[$tbl.'_email']=$data['email'];
                             }
                             if (array_key_exists("name",$data))
                             {
                                $payload[$tbl.'_name']=$data['name'];
                             }
                             if (array_key_exists("phone",$data))
                             {
                                $payload[$tbl.'_phone']=$data['phone'];
                             }
                             if (array_key_exists("gender",$data))
                             {
                                $payload[$tbl.'_gender']=$data['gender'];
                             }
                             if (array_key_exists("password",$data))
                             {
                                $payload['password']=sha1($data['password']);
                             }
                             if (array_key_exists("year_of_study",$data))
                             {
                                $payload[$tbl.'_yos']=$data['year_of_study'];
                             }
                             if (array_key_exists("type",$data))
                             {
                                $payload[$tbl.'_type']=$data['type'];
                             }
                             if (array_key_exists("date_of_birth",$data))
                             {
                                $payload[$tbl.'_dob']=$data['date_of_birth'];
                             }
                             if (array_key_exists("course",$data))
                             {
                                $payload[$tbl.'_course']=$data['course'];
                             }
                             if (array_key_exists("regno",$data))
                             {
                                $payload[$tbl.'_regno']=$data['regno'];
                             }
                              if (array_key_exists("baptismal_status",$data))
                             {
                                $payload[$tbl.'_baptismal_status']=$data['baptismal_status'];
                             }



        $datae=$this->maine_model->get_specific_m($tbl,$payload);
        if($datae != NULL){

            $this->response(array('status'=>true,'message'=>$datae));
        }else{
            $this->response(array('status'=>false,'message'=>'No members'),Rest_controller::HTTP_BAD_REQUEST);
        }

    }else{
$this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);}
    }else{
        $filters=array();
$datae=$this->maine_model->get_specific_m('member',$filters);
        if($datae != NULL){
            $this->response(array('status'=>true,'message'=>$datae));
        }else{
            $this->response(array('status'=>false,'message'=>'No members'),Rest_controller::HTTP_BAD_REQUEST);
        }
    }

// if($datae !=null){
// $this->response(array('status'=>'Success','message'=>$datae));
//      }else{
// $this->response(array('status'=>'failure','message'=>'No members'),Rest_controller::HTTP_BAD_REQUEST);
//      }

}





function member_actions_get_post(){
        $all=$this->maine_model->get_specific('member_actions',array('status'=>1));
        if($all != NULL){
            $this->response(array('status'=>true,'message'=>$all));
        }else{
            $this->response(array('status'=>false,'message'=>'No actions configured'),Rest_controller::HTTP_BAD_REQUEST);
        }

}
/////////////////////////////////////////////////////////////////////////////////////////////
##for use with families-- not important now
function family_time_post(){

    //retrieves members based on family names
    $data=$this->post();
$this->load->library('form_validation');

    $this->form_validation->set_data($data);

                $this->form_validation->set_rules('family', 'family', 'required|trim');
                if($this->form_validation->run()!=false ){
                    $this->load->model('family_model');
                    // $jamaa=$this->family_model->get_by(array('family'=>$data['family']));
                    $jamaa=$this->family_model->nipe_wote($data['family']);
                        if($jamaa != null){

                $this->response(array('status'=>'Success','message'=>$jamaa));
                        }else{
    $this->response(array('status'=>false,'message'=>'No Family members'),Rest_controller::HTTP_BAD_REQUEST);
                        }
                }else{
    $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);

                }
            }

    function watumie_post(){
// send email to family nmemeber
$data=$this->post();
$this->load->library('form_validation');

    $this->form_validation->set_data($data);

                // $this->form_validation->set_rules('contact', 'contact', 'required');
                $this->form_validation->set_rules('message', 'message', 'required');
                if($this->form_validation->run()!=false ){
if($data != null){
$subject='Family Documents';
$message=$data['message'];

$this->load->model('mail_this');
$this->mail_this->send($subject, $message ,$data['contact'], 'Member', 'jkusda@adhrc.co.ke','Nurturing Department'  );

$this->response(array('status'=>'Success','message'=>'Emails sent'));
}else{
$this->response(array('status'=>false,'message'=>'Unknown issue'),Rest_controller::HTTP_INTERNAL_SERVER_ERROR); }

}else{
    $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);
}

                }

function wako_wapi_post(){

    // gets a list of families
    $this->load->model('family_model');
    $famile=$this->family_model->nipe_majina();
    if($famile != null){
$this->response(array('status'=>'success','message'=>$famile));
    }else{
$this->response(array('status'=>false,'message'=>'Got no data'),Rest_controller::HTTP_BAD_REQUEST);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////






function assoc_post(){
    // create a new record of an associate memebrs of the church
    $data=$this->post();
$this->load->library('form_validation');

    $this->form_validation->set_data($data);
// $this->form_validation->set_rules('password', 'password', 'trim|min_length[6]|max_length[20]');
                if($this->form_validation->run('register')!=false ){

                    $payload=array('name' => $data['name'],
                    'phone'=>'0'.$data['phone'],
                    'email'=>$data['email'],
                    'member_type'=>2,
                        'gender'=>$data['gender'],
                    'status'=>1
                     );
                    $this->load->model('associate_model');

                    if($this->associate_model->get_by(array('email'=>$payload['email'])) != null){
                        $this->response(array('status'=>false,'message'=>'User already exists','data'=>$data),Rest_controller::HTTP_BAD_REQUEST );
                    }else{


    if($this->associate_model->insert($payload)){
        $this->load->model('maine_model');
                $data=array('message'=>"New associate");
              $this->maine_model->pusher($data);
    $this->response(array('status'=>'Success','message'=>'Member inserted successfully'));
}else{
    $this->response(array('status'=>false,'message'=>'Invalid data'),Rest_controller::HTTP_INTERNAL_SERVER_ERROR );
}
}


}
}


function wote_post(){
// retrieve all associates from church db

$this->load->model('associate_model');
$datae=$this->associate_model->wote();
if($datae !=null){
$this->response(array('status'=>'Success','message'=>$datae));
        }else{
$this->response(array('status'=>false,'message'=>'No Associates'),Rest_controller::HTTP_BAD_REQUEST);
        }

}

function member_actions_post(){
//takes in member type, email and returns success on delete and failure in case operation fails
    $data=$this->post();

    $this->form_validation->set_data($data);
//change name, phone, email,
                if($this->form_validation->run('edit')!=false ){
                    $tb='member';
                        // var_dump($data['action']);
                    $payload=array();

                        $payload[$tb.'_email']=$data['email'];
                        if (array_key_exists("action",$data))
                             {
                                $payload['status']=$data['action'];
                             }
                        if (array_key_exists("name",$data))
                             {
                                $payload[$tb.'_name']=$data['name'];
                             }
                             if (array_key_exists("phone",$data))
                             {
                                $payload[$tb.'_phone']=$data['phone'];
                             }
                             if (array_key_exists("gender",$data))
                             {
                                $payload[$tb.'_gender']=$data['gender'];
                             }
                             if (array_key_exists("password",$data))
                             {
                                $payload['password']=sha1($data['password']);
                             }
                             if (array_key_exists("year_of_study",$data))
                             {
                                $payload[$tb.'_yos']=$data['year_of_study'];
                             }
                             if (array_key_exists("type",$data))
                             {
                                $payload[$tb.'_type']=$data['type'];
                             }
                             if (array_key_exists("date_of_birth",$data))
                             {
                                $payload[$tb.'_dob']=$data['date_of_birth'];
                             }
                             if (array_key_exists("course",$data))
                             {
                                $payload[$tb.'_course']=$data['course'];
                             }
                             if (array_key_exists("regno",$data))
                             {
                                $payload[$tb.'_regno']=$data['regno'];
                             }
                              if (array_key_exists("baptismal_status",$data))
                             {
                                $payload[$tb.'_baptismal_status']=$data['baptismal_status'];
                             }
                             if (array_key_exists("residence",$data))
                            {
                               $payload[$tb.'_residence']=$data['residence'];
                            }

                        // var_dump($payload);
                             // $this->response(array('status'=>'success','message'=>$payload));
                        if($this->maine_model->update($tb,$payload,array('member_email'=>$payload['member_email']))){
                        $this->response(array('status'=>true,'message'=>$this->maine_model->get_specific_m('member',array('member_email'=>$payload['member_email']))));
                    }else{
                        $this->response(array('status'=>false,'message'=>'User update unsuccessful'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
                    }

                    }else{

                $this->response(array('status' =>false ,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

                    }


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//payments API
function payments_post(){
    // creates a record of a new payment
$data=$this->post();

if (array_key_exists("command",$data))
  {
    if($data['command'] == 'delete'){
      if (array_key_exists("code",$data))
        {
          if($this->maine_model->update('receipts',array('status'=>0),array('code'=>$data['code']))){
              $this->response(array('status'=>true,'message'=>'Payment Deleted'));

          }else{
          $this->response(array('status'=>false,'message'=>'Delete operation failed'),Rest_controller::HTTP_BAD_REQUEST);

          }
        }
    }
  }

$this->form_validation->set_data($data);
                if($this->form_validation->run('payment')!=false ){
$payload=array('member_id' => $data['id'],
                    'contribution_id'=>$data['contribution'],
                    'contribution_amt'=>$data['amount'],
                        'code'=>"jkctr".uniqid(),
                        'department_id'=>$this->departmentalizer($data['contribution']),
                    'status'=>1
                     );
//checks if description exists as array key and sets the variable or ignores it

if (array_key_exists("description",$data))
  {
  $payload['description']=$data['description'];
  }




// $this->response(array('status'=>'success','message'=>'Payment Updated','data'=>$payload));

// $this->load->model('receipts_model');
if($this->maine_model->insert('receipts',$payload)){
$this->response(array('status'=>true,'message'=>'Payment Updated'));

}else{
 $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
}

}
else{

 $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}


function departmentalizer($id){

//helper method for generating department id from contribution id
    $filter=array('id'=>$id);
    $dat=$this->maine_model->get_specific('contributions',$filter);
    // return $dat;
    if($dat!=null){
        return $dat[0]->did;
    }else{
        return 0;
    }
}



function contribution_post(){
//create a contribution- give the contribution name and department id
    $data=$this->post();
    // $this->load->library('form_validation');
    $this->form_validation->set_data($data);
    $this->form_validation->set_rules('command', 'command', 'required|trim');
         if($this->form_validation->run()!=false ){
            // $this->load->model('contribution_model');


            switch ($data['command']) {
                case 'create':
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules('contribution', 'contribution', 'required|trim');
                $this->form_validation->set_rules('department', 'department', 'required|trim');

                if($this->form_validation->run()!=false ){
                            $payload= array('name' =>$data['contribution'] ,
                                'did'=>$data['department'],
                                'status'=>1
                            );
                    if($this->maine_model->insert('contributions',$payload)){

              $data=$this->maine_model->ctr_push();
            $this->maine_model->firebase($data, $data->id, "contribution");
                $this->response(array('status'=>true,'message'=>'Contribution created'));


                }else{
                 $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                    }else{

$this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

                    }

                    break;

                case 'delete':
                    $mycont =array('contributions.status'=>0);
                            if(!array_key_exists('contribution_id', $data)){
                              $this->response(array('status'=>false,'message'=>'Please give me the contribution ID'), Rest_controller::HTTP_BAD_REQUEST);

                         }
                         $mycont['contributions.id']=$data['contribution_id'];
                         $payload = array('status'=>0);

                    // $datum=$this->maine_model->get_specific_c('contributions',array('contributions.status'=>1));
                    if($this->maine_model->update('contributions',$payload,array('id'=>$data['contribution_id']))){
                        $this->response(array('status'=>true,'message'=>'Contribution Deleted'));

                    }else{
                    $this->response(array('status'=>false,'message'=>'Delete operation failed'),Rest_controller::HTTP_BAD_REQUEST);

                    }
                    // if($datum!=null){
                    //      $this->response(array('status'=>true,'message'=>$datum));
                    // }else{
                    //      $this->response(array('status'=>false,'message'=>'No data'), Rest_controller::HTTP_BAD_REQUEST);
                    // }
                    break;

                    case 'retrieve':
                        $mycont =array('contributions.status'=>1);
                                if(array_key_exists('contribution_id', $data)){
                                $mycont['contributions.id']=$data['contribution_id'];
                             }
                             $mycont['contributions.id']=1;

                        $datum=$this->maine_model->get_specific_c('contributions',array('contributions.status'=>1));
                        if($datum!=null){
                             $this->response(array('status'=>true,'message'=>$datum));
                        }else{
                             $this->response(array('status'=>false,'message'=>'No data'), Rest_controller::HTTP_BAD_REQUEST);
                        }
                        break;

                default:
                    # code...
                    break;
            }

            }else{

              $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);
                }

}



function delete_contribution_post(){
//create a contribution- give the contribution name and department id
    $data=$this->post();
    // $this->load->library('form_validation');
    $this->form_validation->set_data($data);
    $this->form_validation->set_rules('command', 'command', 'required|trim');
         if($this->form_validation->run()!=false ){
            // $this->load->model('contribution_model');


            switch ($data['command']) {
                case 'create':
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules('contribution', 'contribution', 'required|trim');
                $this->form_validation->set_rules('department', 'department', 'required|trim');

                if($this->form_validation->run()!=false ){
                            $payload= array('name' =>$data['contribution'] ,
                                'did'=>$data['department'],
                                'status'=>1
                            );
                    if($this->maine_model->insert('contributions',$payload)){

              $data=$this->maine_model->ctr_push();
            $this->maine_model->firebase($data, $data->id, "contribution");
                $this->response(array('status'=>true,'message'=>'Contribution created'));


                }else{
                 $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                    }else{

$this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

                    }

                    break;

                case 'retrieve':
                    $mycont =array('contributions.status'=>1);
                            if(array_key_exists('contribution_id', $data)){
                            $mycont['contributions.id']=$data['contribution_id'];
                         }
                         $mycont['contributions.id']=1;

                    $datum=$this->maine_model->get_specific_c('contributions',array('contributions.status'=>1));
                    if($datum!=null){
                         $this->response(array('status'=>true,'message'=>$datum));
                    }else{
                         $this->response(array('status'=>false,'message'=>'No data'), Rest_controller::HTTP_BAD_REQUEST);
                    }
                    break;

                default:
                    # code...
                    break;
            }

            }else{

              $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);
                }

}


function contribution1_report_post(){
$data=$this->post();
$this->load->library('form_validation');
    $this->form_validation->set_data($data);
    $this->form_validation->set_rules('id', 'id', 'required|trim');
         if($this->form_validation->run()!=false ){
            $this->load->model('log_model');
            $conts=$this->log_model->dept_cont($data['id']);
            $from=0;
            $to=0;
            if(isset($data['from'])){
                $from=$data['from'];
            }
            if(isset($data['to'])){
                $to=$data['to'];
            }
            $hold_them=[];
            if($conts!=null){

                foreach ($conts as$value) {
                    $id=$value->id;
                    $dat=$this->log_model->income($id,$from,$to);

                    if($dat!=null){
                        $hold_them=$dat;
                    }
                    # code...
                }
                $this->response(array('status'=>true,'message'=>$hold_them));

            }else{

                $this->response(array('status'=>false,'message'=>'No such department'), Rest_controller::HTTP_BAD_REQUEST);
            }





            }else{

          $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

            }

}


function contribution_report_post(){
    // gets contribution report based on  id of member and or department id and time limits

$data=$this->post();
$this->form_validation->set_data($data);
if($this->form_validation->run('report')==true){
    $filters=array();
    if(isset($data['department_id'])){
        $filters['receipts.department_id']=$data['department_id'];
    }
    if(isset($data['contribution'])){
        $filters['receipts.contribution_id']=$data['contribution'];
    }
    if(isset($data['member_id'])){
        $filters['receipts.member_id']=$data['member_id'];
    }
    if(isset($data['from'])){
        $filters['receipts.date_created >=']=date("Y-m-d h:i:sa",strtotime($data['from'].' 00:00:00'));
    }
    if(isset($data['to'])){
        $filters['receipts.date_created <=']=date("Y-m-d h:i:sa",strtotime($data['to'].' 23:59:59'));
    }
    $filters['receipts.status']=1;

$all=$this->maine_model->get_specific_r('receipts',$filters);
if($all != null){
    $this->response(array('status'=>true,'message'=>$all));
}else{
    $this->response(array('status'=>false,'message'=>'No records'));
}

}else{
$err = validation_errors();
if($err == NULL){
    $err = "No Records";
}

$this->response(array('status'=>false,'message'=>$err));

}

}







function expenditure_post(){
    //create a record of a new expenditure
$data=$this->post();
// echo json_encode($data);
$this->load->library('form_validation');
$this->form_validation->set_data($data);

                if($this->form_validation->run('expense')!=false ){
$payload=array('department_id' => $data['id'],
                    'amount'=>$data['amount'],
                        'description'=>$data['description'],
                        'code'=>"jkexp".uniqid(),
                    'status'=>1
                     );
$this->load->model('expenditure_model');
if($this->expenditure_model->insert($payload)){
$this->response(array('status'=>true,'message'=>'Expenditure Updated'));

}else{
 $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
}

}
else{

  $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}




function expenditure_report_post(){
$data=$this->post();
    $this->form_validation->set_data($data);
         if($this->form_validation->run('report')!=false ){
            $filters=array();
    if(isset($data['department_id'])){
        $filters['department_id']=$data['department_id'];
    }
    if(isset($data['from'])){
        $filters['time_stamp >=']=date("Y-m-d h:i:sa",strtotime($data['from'].' 00:00:00'));
    }
    if(isset($data['to'])){
        $filters['time_stamp <=']=date("Y-m-d h:i:sa",strtotime($data['to'].' 23:59:59'));
    }
// $all=$this->maine_model->get_specific('expenditure',$filters);


            $dat=$this->maine_model->get_specific_ex('expenditure',$filters);
            if($dat!=null){
                 $this->response(array('status'=>true,'message'=>$dat));
            }else{
                 $this->response(array('status'=>false,'message'=>'No records'), Rest_controller::HTTP_BAD_REQUEST);

            }
            }else{

          $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

            }

}


//get list of departments

function dept_list_post(){
$data=$this->post();
// $this->load->library('form_validation');
$this->form_validation->set_data($data);
$this->form_validation->set_rules('department', 'department', 'trim|min_length[3]|max_length[25]');
$this->form_validation->set_rules('command', 'command', 'required|trim');
if($this->form_validation->run()!=false ){



switch ($data['command']) {
    case 'create':
      if(isset($data['department'])){
        $payload['name']=$data['department'];
        $payload['status']=1;
    }else{
        $this->response(array('status'=>false,'message'=>'<p> The department field required<p>'),Rest_controller::HTTP_BAD_REQUEST);
    }


$this->load->model('maine_model');
if($this->maine_model->insert('department',$payload)){
$data=$this->maine_model->dpt_push();
     $this->maine_model->firebase($data,$data->did, 'department');
$this->response(array('status'=>true,'message'=>'Department Created'));
}else{
    $this->response(array('status'=>false,'message'=>'Department creation failed'),Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
}

        break;
       case 'retrieve':
        $this->load->model('maine_model');
$datae=$this->maine_model->get_plain2('department');
if($datae !=null){
$this->response(array('status'=>true,'message'=>$datae));
        }else{
$this->response(array('status'=>false,'message'=>'No Departments'),Rest_controller::HTTP_BAD_REQUEST);
        }
        break;

        case 'edit':
    $this->form_validation->set_rules('id', 'id', 'required|trim');
$this->form_validation->set_rules('action', 'action', 'trim');
if($this->form_validation->run()!=false){
    $payload=array('did'=>$data['id']);
if(isset($data['department'])){
    $payload['name']=$data['department'];
}
if(isset($data['action'])){
    $payload['status']=$data['action'];
}

if($this->maine_model->update('department',$payload,array('did'=>$data['id']))){
    $this->response(array('status'=>true,'message'=>'Update successful'));

}else{
$this->response(array('status'=>false,'message'=>'Update unsuccessful'),Rest_controller::HTTP_BAD_REQUEST);

}

}else{

$this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);
}

        break;
    default:
    $this->response(array('status'=>false,'message'=>'No Departments'),Rest_controller::HTTP_BAD_REQUEST);
        # code...
        break;
}


}else{

  $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);
}
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function register_post(){

//insert new member

$data=$this->post();
// $this->load->library('form_validation');
    $this->form_validation->set_data($data);
        if($this->form_validation->run('register')!=false ){
            $this->load->model('maine_model');
            $tbl='member';

$payload=array(
// $tbl.'_name'=>$data['name'],
// $tbl.'_phone'=>$data['phone'],
$tbl.'_email'=>$data['email'],
// $tbl.'_type'=>$data['type'],
'date_signed_up'=>date("Y-m-d h:i:sa"),
'status'=>1
    );

if (array_key_exists("name",$data))
                             {
                                $payload[$tbl.'_name']=$data['name'];
                             }
                             if (array_key_exists("phone",$data))
                             {
                                $payload[$tbl.'_phone']=$data['phone'];
                             }
                             if (array_key_exists("gender",$data))
                             {
                                $payload[$tbl.'_gender']=$data['gender'];
                             }
                             if (array_key_exists("password",$data))
                             {
                                $payload['password']=sha1($data['password']);
                             }
                             if (array_key_exists("year_of_study",$data))
                             {
                                $payload[$tbl.'_yos']=$data['year_of_study'];
                             }
                             if (array_key_exists("type",$data))
                             {
                                $payload[$tbl.'_type']=$data['type'];
                             }
                             if (array_key_exists("date_of_birth",$data))
                             {
                                $payload[$tbl.'_dob']=$data['date_of_birth'];
                             }
                             if (array_key_exists("course",$data))
                             {
                                $payload[$tbl.'_course']=$data['course'];
                             }
                             if (array_key_exists("regno",$data))
                             {
                                $payload[$tbl.'_regno']=$data['regno'];
                             }
                              if (array_key_exists("baptismal_status",$data))
                             {
                                $payload[$tbl.'_baptismal_status']=$data['baptismal_status'];
                             }
                             if (array_key_exists("residence",$data))
                            {
                               $payload[$tbl.'_residence']=$data['residence'];
                            }


if($this->maine_model->insert($tbl,$payload)){
    $data=$this->maine_model->member_push();
     $this->maine_model->firebase($data,$data->id, 'member');
$this->response(array('status'=>TRUE,'message'=>"Member inserted successfully", 'data'=>$data));
}else{
$this->response(array('status'=>FALSE,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);

}

        }else{
$this->response(array('status'=>FALSE,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);



        }






}

 public function email_check($str)
        {
                if ($this->maine_model->get_specific('member',array('member_email'=>$str)) != null)
                {
                        $this->form_validation->set_message('email_check', 'The {field} field is not unique');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
 public function email_check1($str)
        {
                if ($this->maine_model->get_specific('member',array('member_email'=>$str)) != null)
                {
                    return TRUE;

                }
                else
                {
                    $this->form_validation->set_message('email_check1', 'The {field} field is not registered');
                        return FALSE;

                }
        }



public function login_post(){
$data=$this->post();
    $this->form_validation->set_data($data);
        if($this->form_validation->run('login')!=false ){
            $payload=array(
                'member_email'=>$data['email'],
                'password'=>sha1($data['password'])
                );
            // $this->response(array('status'=>TRUE,'message'=>$payload));
            $dat=$this->maine_model->get_specific_m('member',$payload)[0];
            if($dat!=null){

                unset($dat->password);
              // $this->maine_model->pusher($data);
              $this->maine_model->firebase($dat,$dat->id, 'memberlogs');
                $this->response(array('status'=>true,'message'=>$dat));
            }else{
                $this->response(array('status'=>false,'message'=>'unsuccessful login'), Rest_controller::HTTP_BAD_REQUEST);
            }


        }else{
            $this->response(array('status'=>false,'message'=>validation_errors()));


        }



}

function church_leaders_post(){
    // insert, fetch and update church leaders
$data=$this->post();
$this->form_validation->set_data($data);
if($this->form_validation->run('lead')!=false ){
    if(isset($data['command'])){
        $switcher=$data['command'];
    }else{
        $switcher=null;
    }
switch ($switcher) {
    case 'create':
    $payload=array(
        'status'=>1,
        'time'=>date("Y-m-d h:i:sa"),
        'member_id'=>$data['id']
        );
    if(isset($data['department'])){
        $payload['department_id']=$data['department'];
    }
    if(isset($data['position'])){
        $payload['position']=$data['position'];
    }
      if($this->maine_model->insert('leaders',$payload)!=false){
          $this->maine_model->profiler($payload['member_id']);
    $this->response(array('status'=>true,'message'=>'Success'));

      }else{
        $this->response(array('status'=>false,'message'=>'Invalid data'),Rest_controller::HTTP_BAD_REQUEST);
      }

        break;

        case 'edit':
         $payload=array();
    if(isset($data['department'])){
        $payload['department_id']=$data['department'];
    }
    if(isset($data['position'])){
        $payload['position']=$data['position'];
    }
    if(isset($data['action'])){
        $payload['status']=$data['action'];
    }
    $this->form_validation->set_rules('leader','leader','required|trim');
    if($this->form_validation->run()){

       if($this->maine_model->update('leaders',$payload,array('leader_id'=>$data['leader']))!=false){
    $this->response(array('status'=>true,'message'=>'Success'));


      }else{
        $this->response(array('status'=>false,'message'=>'Invalid data'),Rest_controller::HTTP_BAD_REQUEST);
      }}else{
$this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);

      }
        break;
    default:

        $payload=array('status'=>1,);
    if(isset($data['department'])){
        $payload['department_id']=$data['department'];
    }
    if(isset($data['position'])){
        $payload['position']=$data['position'];
    }
    $datea=$this->maine_model->get_specific('leaders',$payload);
    if($datea!=null){
$this->response(array('status'=>true,'message'=>$datea));
    }else{
$this->response(array('status'=>false,'message'=>'No data'),Rest_controller::HTTP_BAD_REQUEST);
    }
        # code...
        break;
}


}else{

  $this->response(array('status'=>false,'message'=>validation_errors()),Rest_controller::HTTP_BAD_REQUEST);
}
}


function calendar_post(){
    // creates a event in the church calendar
$data=$this->post();
$this->form_validation->set_data($data);
                if($this->form_validation->run('calendar')!=false ){
                    $payload = $data;
                    $payload['status'] = 1;

if($this->maine_model->insert('calendar',$payload)){
$this->response(array('status'=>true,'message'=>'Record Created'));

}else{
 $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
}

}
else{

 $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}

function events_post(){
    // retrieves a event in the church calendar
$data=$this->post();
$payload = array();
if($data){
$this->form_validation->set_data($data);
                if($this->form_validation->run('event')!=false ){


                     if (array_key_exists("day",$data))
                             {
                                $payload['day']=$data['day'];
                             }
                             if (array_key_exists("week",$data))
                             {
                                $payload['week']=$data['week'];
                             }
                             if (array_key_exists("month",$data))
                             {
                                $payload['month']=$data['month'];
                             }
                             if (array_key_exists("year",$data))
                             {
                                $payload['year']=$data['year'];
                             }
                    $events = $this->maine_model->get_specific_e('calendar',$payload);
                    // $this->response(array('status'=>true,'message'=>$events));
if($events != NULL){
$this->response(array('status'=>true,'message'=>$events));

}else{
 $this->response(array('status'=>false,'message'=>'No events for specified period'), Rest_controller::HTTP_BAD_REQUEST);
}

}
else{

 $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}else{
    $this->response(array('status'=>true,'message'=>$this->maine_model->get_specific('calendar',$payload)));
}
}


//////////////////////////////////////////////////
// handle firebase cloud messaging

function register_device_post(){
$data=$this->post();
    $this->form_validation->set_data($data);
    $group_member = array();
         if($this->form_validation->run('fcm')!=false ){
          $payload=array();
            $payload['member_id'] = $data['member_id'];
            $payload['device_id'] = $data['device_id'];
    if(isset($data['group_id'])){
        $payload['group_id']=json_encode($data['group_id']);

        foreach ($data['group_id'] as $value) {
          $group_member[$this->group_em($value)] = $data['device_id'] ;
        }
    }
    if(isset($data['status'])){

    }else{
      $payload['status'] = 1;
    }
    $payload['date_registered'] = date("Y-m-d H:i:s");


            $dat=$this->maine_model->get_specific('fcm_devices',array('member_id'=>$payload['member_id']));
            if($dat!=null){
                if ($this->maine_model->update('fcm_devices',$payload,array('member_id'=>$payload['member_id'])) != False){
                  if(!empty($group_member)){
                    $cheki = $this->maine_model->add_to_device_groups($group_member);
                  }
                  $this->response(array('status'=>true,'message'=>"Update Successful",'data'=>$cheki));
                }else{
                  $this->response(array('status'=>true,'message'=>"Failed update"));
                }

            }else{
              if($this->maine_model->insert('fcm_devices',$payload) != False){
                if(!empty($group_member)){
                  $cheki = $this->maine_model->add_to_device_groups($group_member);
                }
                $this->response(array('status'=>true,'message'=>"Device registered successfully", 'data'=>$cheki));

              }
              {
                $this->response(array('status'=>false,'message'=>'Device registration Failed'), Rest_controller::HTTP_BAD_REQUEST);

              }

            }
            }else{

          $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);

            }

}


function group_em($id){

//helper method for generating department id from contribution id
    $filter=array('id'=>$id);
    $dat=$this->maine_model->get_specific('device_group',$filter);
    // return $dat;
    if($dat!=null){
        return $dat[0]->name;
    }else{
        return false;
    }
}


//////////////////////////////////////////////////////////////////////////
 // praying and prayer request apache_get_modules


function praying_post(){
$data=$this->post();
$payload = array();
if($data){
$this->form_validation->set_data($data);
                if($this->form_validation->run('prayer')!=false ){


                     if (array_key_exists("prayer",$data))
                             {
                                $payload['prayer_id']=$data['prayer'];
                             }
                             if (array_key_exists("description",$data))
                             {
                                $payload['description']=$data['description'];
                             }else{
                                $payload['description']="Some's praying Lord";
                             }
                             if (array_key_exists("member_id",$data))
                             {
                                $payload['prayer_id']=$data['member_id'];
                             }
                             // if (array_key_exists("subject",$data))
                             // {
                             //    $payload['subject']=$data['subject'];
                             // }

                             $payload['status']=1;
                             if($this->maine_model->insert('prayer_log',$payload)){
                            $this->response(array('status'=>true,'message'=>'Prayer activity Recorded'));

                            }else{
                             $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
                            }



}
else{

 $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}else{
    $this->response(array('status'=>false,'message'=>"No data received"), Rest_controller::HTTP_BAD_REQUEST);;
}

}


 function prayer_request_post(){
    // retrieves a event in the church calendar
$data=$this->post();
$payload = array();
if($data){
$this->form_validation->set_data($data);
                if($this->form_validation->run('prayer')!=false ){


                     if (array_key_exists("prayer",$data))
                             {
                                $payload['prayer_id']=$data['prayer'];
                             }
                             if (array_key_exists("member_id",$data))
                             {
                                $payload['member_id']=$data['member_id'];
                             }
                             if (array_key_exists("description",$data))
                             {
                                $payload['description']=$data['description'];
                             }else{
                                $payload['description']="Some's praying Lord";
                             }
                             if (array_key_exists("subject",$data))
                             {
                                $payload['subject']=$data['subject'];
                             }

                             $payload['status']=1;
                             if($this->maine_model->insert('prayer_request',$payload)){
                            $this->response(array('status'=>true,'message'=>'Prayer activity Recorded'));

                            }else{
                             $this->response(array('status'=>false,'message'=>'Unknown error'), Rest_controller::HTTP_INTERNAL_SERVER_ERROR);
                            }



}
else{

 $this->response(array('status'=>false,'message'=>validation_errors()), Rest_controller::HTTP_BAD_REQUEST);


                }

}else{
    $this->response(array('status'=>false,'message'=>"No data received"), Rest_controller::HTTP_BAD_REQUEST);
}
}


}
