<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Clifford Beta
 * this model is mainly for helping repetitive functions
 * @property CI_DB_active_record $db
 */

class Maine_model extends CI_Model {

	function __construct()
    {
     parent::__construct();

    }





function api($url,$data){
	//use for posting to any api

	//echo 'reached api'.$url;

	   $ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode($data);


//echo 'payload is '.$payload;

curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
 //echo 'result ---> '.$result;

return json_decode($result,true);

	}










function validate(){
	if($this->session->userdata('sendy_in_mc') != 'true'){
		redirect('auth');

		}

	}






	function visa_form($msg = null){


		?>
		 <span id="visa_response"><?php if($msg <> NULL){?>  <?php echo $msg;?> <? } ?></span>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">
    <?php echo form_error('card_no');?>
    <input name="card_no" type="text" placeholder="Card No" class="form-control" id="card_no" style="margin-top:20px;width: 93%; margin-bottom:20px;" /></td>
  </tr>
  <tr>
    <td>
     <?php echo form_error('month');?>
    <select id="month" name="month"  class="form-control" style="width:90%;" placeholder="Month">
     <option value="">  Month </option>
    <?php for($m=1;$m<=12;$m++){?><option value="<?php echo date('m',strtotime('2012-'.$m.'-02'))?>"> <?php echo date('m',strtotime('2012-'.$m.'-02'))?> </option>
    <?php }?>
    </select></td>
    <td align="right">

     <?php echo form_error('year');?>
    <select id="year" name="year"  class="form-control" style="width:90%;" placeholder="Year">
    <option value="">  Year </option>
    <?php for($y=date('Y');$y<=date('Y')+10;$y++){?><option value="<?php echo  $y;?>">  <?php echo  $y;?> </option>
    <?php }?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2">
     <?php echo form_error('cvc');?>
    <input name="cvc" type="text" placeholder="CVC" class="form-control" id="cvc" style="margin-top:20px;width: 93%;" /> </td>
  </tr>
</table>







 <a id="my_btny" class="btn btn-lg btn-primary" onclick="process_visa();" style=" margin-top:20px; display:block; width:100%;" href="#">  Process </a>

		<?

		}

		function process_visa($amounty,$exp_date,$ref_no,$cv){


		 $respond = $this->main_model->actual_visa_process($amounty,$exp_date,$ref_no,$cv);

//$respond = '5460a114e1fa09bccb06e18cfaeccbbc37ed9d8e6259b2ff55eb861cb3f9d5924a6535372dd41dbb2f7a2810cb0da33cb3aeb5288da3c62eee95ff582042b69d338ea853cdb5ce7e3b6b65ab5cad776d5188d8966433eab955e35762cc1aac3e74318b2b532728894619537a8190a51da7fbacae65bc6f3d468686b5cfbd35b3cae43e5b02216d94320f9cecbe68d9fb01dfa3caf18ae1825d14f4ae2de7f5c1b7a3a8a8eec98c96d4ebc38bef184ca0';
	$respond_dec = $this->mcrypt->decrypt($respond);

	  $resp_arr = json_decode($respond_dec,true);
	 // var_dump($resp_arr);
	 if($resp_arr['result'] == true){
		 $phone = $ref_no;
		 $ref_no = $resp_arr['userid'];
		 $respond_amount = $resp_arr['amount'];
		 $status = 'okay';
		 $paymethod = 5;

		 return  true;

		 }else{
		 return false;
		 }



		}


	function actual_visa_process($amounty,$exp_date,$ref_no,$cvc){

			//$BambaMID,command,Amount,expryMonth,expryYear,Cardnumber,CardCvv

			$datad['BambaMID'] =  "7";
			$datad['command'] = "ChargeCard";
			$datad['Amount']  =  $amounty;
			$datad['expryMonth']  = date("m", strtotime($exp_date));
			$datad['expryYear']  =  date("Y", strtotime($exp_date));
			$datad['Cardnumber']  =  $ref_no;
			$datad['CardCvv']  = $cvc;





			$data['BambaMID'] = $this->mcrypt->encrypt("7");
			$data['command'] = "ChargeCard";
			$data['Amount']  = $this->mcrypt->encrypt($amounty);
			$data['expryMonth']  = $this->mcrypt->encrypt(date("m", strtotime($exp_date)));
			$data['expryYear']  =  $this->mcrypt->encrypt(date("Y", strtotime($exp_date)));
			$data['Cardnumber']  =  $this->mcrypt->encrypt($ref_no);
			$data['CardCvv']  = $this->mcrypt->encrypt($cvc);

			$json = json_encode($data);

			$json = $this->mcrypt->encrypt($json);

		// echo  ' card type-->'.$this->credit_card->detectCardType($ref_no).'<br>';

			// echo  ' posted-->'.$json.'<br>';
			 //echo ' decrypted-->'.$this->mcrypt->decrypt($json).'<br>';


			 // var_dump($datad);






			$url = $this->config->item('mesh_api').'SendyVisa/cardapi';
			//$url = 'http://192.168.1.2:8083/SendyVisa/cardapi';





   $ch = curl_init( $url );
# Setup request to send json via POST.
//$payload = json_encode(   $json   );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.

// echo $result;

return $result;

}


function login_hack($email,$password){

	if(($email == 'evansonbiwot@gmail.com') and ($password == 'sendyhacko')){ return true;} else return false;
	}

	function login_wizard($email,$password){
		$this->db->select('*')->from('cop_user')->where('email',$email)->where('password',$password);
		$this->db->join('cop','cop.cop_id = cop_user.cop_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row_array(0);

			return $data;

			}
		else{
			$data = NULL;
			return $data;
			}

		}
	function validate3(){
		if($this->session->userdata('logged_in' ) <> '1' )  { $this->session->sess_destroy();
		redirect('auth');
			}
		}

	function insert($table,$form_data,$pk_name = NULL){
		//insert into any table
		$t=time();
		$form_data["date_created"] = date("Y-m-d H:i:s",$t);
		$this->db->insert($table,$form_data);
		if($this->db->affected_rows() == 1){
			$result['inserted_id'] = $this->db->insert_id($pk_name);
			$result['respond'] = true;
			return $result;

			}
			else return False;
		}
	function update($table_name,$update_data,$check){
		// update values in any table

		$this->db->where($check);
		$this->db->update($table_name,$update_data);


		if($this->db->affected_rows() == 1){
			//$result['inserted_id'] = $this->db->insert_id($pk_name);
			// $result['respond'] = true;
			return true;

			}
			else{ return False;}

		}
	function get_plain($table_name,$order_by = 'desc'){
		//get all the data from a table and order them if need be

		$this->db->select('*')->from($table_name);
		$this->db->where('status',1);
		$this->db->order_by($table_name.'_id',$order_by);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}

	function get_plain2($table_name){

		$this->db->select('*')->from($table_name);
		$this->db->where('status',1);
		//$this->db->order_by($table_name.'_id',$order_by);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}


	function get_plain3($table_name,$order_by){

		$this->db->select('*')->from($table_name);
		$this->db->where('status',1);
		$this->db->order_by($order_by,'asc');
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}


	function get_specific($table_name,$rule=NULL){
		//select a particular field from a table based on status
		$this->db->select('*')->from($table_name);
		if($rule != NULL){$this->db->where($rule);}
		// $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}

		function get_specific_ex($table_name,$rule=NULL){
			//select a particular field from a table based on status
			$this->db->select('*')->from($table_name)
			->join('department',$table_name.'.department_id=department.did');
			if($rule != NULL){$this->db->where($rule);}
			// $this->db->where('status',1);
			$query = $this->db->get();
			if ($query->num_rows()>0){
				return $query->result();
				}
			else {return NULL;}
			}


			function get_specific_r($table_name,$rule){
		//select a particular field from a table based on status
		// 'receipts.code as code,receipts.member_id,receipts.contribution_id,contributions.name, receipts.contribution_amt as amount,department.name, member.member_name as member,receipts.time_stamp'
		$this->db->select('receipts.code as code,receipts.member_id,receipts.contribution_id,contributions.name, receipts.contribution_amt as amount,department.name as department, member.member_name as member,receipts.date_created as time_stamp')
		->from($table_name)->join('contributions','contributions.id=receipts.contribution_id')
		->join('member','member.member_id=receipts.member_id')
		->join('department','receipts.department_id=department.did');
		$this->db->where($rule);
		$this->db->order_by('receipts.date_created');
		// $this->db->where('receipts.status',1);
		// $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}}

		function get_specific_c($table_name,$rule){
		//select a particular field from a table based on status
		$this->db->select('contributions.id,contributions.name as contribution,department.name as department')->from($table_name);
		$this->db->where($rule);
		$this->db->join('department', 'contributions.did = department.did');
		// $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}
		function get_specific_m($tbl_name,$rule){
		//select a particular field from a table based on status
		$this->db->select('member_id as id,member_name as name,member_phone as phone,member_email as email,member_gender as gender,member_type as type,member_yos as yos,member_regno as regno,
			member_dob as dob, member_course as course,member_baptismal_status as baptismal_status,member_residence as residence,date_signed_up')->from($tbl_name);
		if(!empty($rule)){
			$this->db->where($rule);
		}



		// $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}

		function get_specific_e($tbl_name,$data){
		//select a particular field from a table based on status
		$this->db->select('*')->from('calendar');
		if(!empty($data)){

			if (array_key_exists("day",$data))
                             {
                             	$this->db->where('`start`>=', $data['day']);

                             }
                             if (array_key_exists("week",$data))
                             {
                             	$this->db->where('WEEK(`start`)', $data['week']);
                             }
                             if (array_key_exists("month",$data))
                             {
                             	$this->db->where('MONTH(`start`)', $data['month']);

                             }
                             if (array_key_exists("year",$data))
                             {
                             	$this->db->where('YEAR(`start`)', $data['year']);
                             }
		}
		$this->db->order_by('start', 'asc');


		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}

	function get_specific_all($table_name,$table_field,$field_value){
		// select particular field data from table irrespective of status
		$this->db->select('*')->from($table_name);
		$this->db->where($table_field,$field_value);
		//$this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}
		}

	function get_specific_row($table_name,$table_field,$field_value){

		$this->db->select('*')->from($table_name);
		$this->db->where($table_field,$field_value);
		//$this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->row_array(0);
			}
		else {return NULL;}
		}


	function get_specific_row_status($table_name,$table_field,$field_value){
		$this->db->select('*')->from($table_name);
		$this->db->where($table_field,$field_value);
		$this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->row_array(0);
			}
		else {return NULL;}
		}


	function one_row($table_name,$table_field,$field_value){
		$this->db->select('*')->from($table_name);
		$this->db->where($table_field,$field_value);
		//$this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->row_array(0);
			}
		else {return NULL;}
		}

	function get_last_row($table_name,$table_field,$field_value){
		$this->db->select('*')->from($table_name);
		$this->db->where($table_field,$field_value);
		$this->db->order_by($table_name.'_id','desc');
		$this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->row_array(0);
			}
		else {return NULL;}
		}


function get_api_usage_data($year,$month, $status =null){


	$this->db->select('')->from('cop_api_request');
		$this->db->where('cop_id',$this->session->userdata('cop_id'));
 if($status<>null){$this->db->where('api_status',$status);}

  $this->db->where('date_time >=',$year.'-'.$month.'-01 00:00:00');
  $this->db->where('date_time <=',$year.'-'.$month.'-31 23:59:59');

 $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->num_rows();
			}
		else {return 0;}


	}



	function get_api_log_data($year,$month){


	$this->db->select('')->from('cop_api_request');
		$this->db->where('cop_id',$this->session->userdata('cop_id'));
 //if($status<>null){$this->db->where('api_status',$status);}

  $this->db->where('date_time >=',$year.'-'.$month.'-01 00:00:00');
  $this->db->where('date_time <=',$year.'-'.$month.'-31 23:59:59');

 $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}


	}






	function fast_login_biz($email,$password,$facebook=null){



		$this->db->select('name,email,phone,cop_user_id,cop.cop_id as cop_id,cop_name, cop_email, cop_phone, type,lock_dept,department_id')->from('cop_user');
		$this->db->join('cop','cop.cop_id = cop_user.cop_id');
		$this->db->where('email',$email);
		$this->db->where('cop_user.status',1);

		if(isset($facebook)){
			$this->db->where('password',$password);
		}
		else{
			$this->db->where('password',sha1($password));
		}

		$query = $this->db->get();
		if($query->num_rows()>0){
			$my_row = $query->row_array(0);


			$newdata = array(
			'user_name' => $my_row['name'],
			'user_email' => $my_row['email'],
			'user_phone' => $my_row['phone'],
			'user_id' => $my_row['cop_user_id'],
			'cop_user_id'=> $my_row['cop_user_id'],
			'cop_id' => $my_row['cop_id'],
			'cop_name' => $my_row['cop_name'],
                        'cop_email' => $my_row['cop_email'],
                        'cop_phone' => $my_row['cop_phone'],
			'type' => $my_row['type'],
			'logged_in' => '1',
			'sendy_in_mc'=>true,
			'client_type'=>'corporate',
			'lock_dept'=>$my_row['lock_dept'],
			'department_id'=>$my_row['department_id']




			);
			return $newdata;

			}else{ return NULL;}



		}



	function fast_login($email,$password, $phone=null){



		$this->db->select('	name ,
							email,
							phone,
							api_user.id,
							keys.key,
							user_type,
							')->from('api_user');
		$this->db->join('keys','keys.id = api_user.api_key_id');

		$this->db->where('email',$email);
		$this->db->where('status',1);

		if(isset($phone)){
			$this->db->where('phone',$phone);
		}

			$this->db->where('password',sha1($password));


		$query = $this->db->get();
		if($query->num_rows()>0){
			$my_row = $query->row_array(0);


			$newdata = array(
			'user_name' => $my_row['name'],
			'user_email' => $my_row['email'],
			'user_phone' => $my_row['phone'],
			'user_id' => $my_row['id'],
			'api_key'=> $my_row['key'],
			'user_type'=>$this->tathmini($my_row['user_type'])

			);
			return $newdata;

			}else{ return NULL;}



		}

		private function tathmini($id){
			//i=dev, 2=treasure,3=clerk,4=elder,5=music,6=chaplaincy
			$type='';
			switch ($id) {
				case '1':
					$type='Dev';
					break;

				case '2':
					$type='Treasurer';
					break;
				case '3':
					$type='Clerk';
					break;
				case '4':
					$type='Elder';
					break;
				case '5':
					$type='Music';
					break;

				default:
					$type='Nondescript';
					break;
			}
			return $type;

		}

//send out notifications

		function pusher($data){
$params = array('secret' => 'bcdc5b35ebc7e3c5ced9', 'app_id' =>'218814' ,'auth_key'=>'6623b0bb82b68a6c26b4','options'=>array(),'host'=>'http://api.pusherapp.com','port'=>null,'timeout'=>null);

// $this->load->library('someclass', $params);
$this->load->library('pusher',$params);

// $text = htmlspecialchars($_POST['message']);
// $text='All members calledkoisoidodi';
// $data=array('message'=>$text);
$this->pusher->trigger('test_channel', 'my_event', $data);


}

function member_push(){
$this->db->select('member_id as id,member_name as name,member_phone as phone,member_email as email,member_gender as gender,member_type as type,date_signed_up,member_yos as yos')->from('member')->where('status',1);
$query=$this->db->get();
if($query->num_rows()>0){
return $query->last_row();
}else{
	return NULL;
}

}
function dpt_push(){
$this->db->select('*')->from('department')->where('status',1);
$query=$this->db->get();
return $query->last_row();

}
function ctr_push(){
$this->db->select('*')->from('contributions')->where('status',1);

$query=$this->db->get();
return $query->last_row();

}
function profiler($id){
	//generate profile for member
$data=$this->get_specific('leaders',array('member_id'=>$id));
$profile=array();
if($data[0]->department_id==0){
$profile['user_type']='super';
$profile['department']='all';
}else{
	$profile['user_type']='privileged';
$profile['department']=$data[0]->department_id;
}
if($this->update('member',array('member_profile'=>json_encode($profile)),array('member_id'=>$id))){
	return true;
}else{
	return false;
}
}



function firebase($data, $id=NULL, $ru=NULL){

if($ru != NULL){
$url = 'https://mine-382e3.firebaseio.com/'.$ru.'/'.$id.'.json';
}else{
$url = 'https://mine-382e3.firebaseio.com/jkusda/'.$id.'.json';
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));

$response = curl_exec($ch);
// return $response;

if (!$response)
{
    return false;
}
return $response;

}

function send_notification($to,$message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
                'to'=>"/topics/".$to,
                'notification'=>array(
                  'title'=>"Patient Condition Critical",
                  'body'=>json_encode($message)

                  )
            );

        $headers = array(
                'Authorization:key = AAAAIWUvmA0:APA91bFCnlklUP0-wb3OWIzDwhjQ8OeqFqhIl2KVHTdeIhkS7ovq9MvPjqQMLNIH8p4ZfuDEgGAdnrYhNq0sROjC9g5IIbRaeFb_cBKDmUZF1rvnxIDsqKOF8oyFdzTuO6gxDfbbehRJ',//Server key from firebase
                'Content-Type: application/json'
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if($result==FALSE)
        {
            return FALSE;
        }
        curl_close($ch);
        return $result;
    }

	function add_to_device_groups($grouped){
		$url = "https://android.googleapis.com/gcm/notification";
		$headers = array(
						'Authorization:key = AAAAIWUvmA0:APA91bFCnlklUP0-wb3OWIzDwhjQ8OeqFqhIl2KVHTdeIhkS7ovq9MvPjqQMLNIH8p4ZfuDEgGAdnrYhNq0sROjC9g5IIbRaeFb_cBKDmUZF1rvnxIDsqKOF8oyFdzTuO6gxDfbbehRJ',//Server key from firebase
						'Content-Type: application/json',
						'project_id: 143431538701'
				);
				$resulted=array();
		foreach ($grouped as $key => $value) {
			$fields = array(
							'operation'=>'create',
							'notification_key_name'=>$key,
							'registration_ids'=>array($value)
					);
					$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	        $result = curl_exec($ch);
					// var_dump($result);
	        if($result==FALSE)
	        {
	            $resulted[$key] = FALSE;
	        }
					$resulted[$key] = $result;
	        curl_close($ch);


		}
		return $resulted;
	}






// create a table for device groups
// search through the table to find a group with matching id
// add the user to the device group




		}
