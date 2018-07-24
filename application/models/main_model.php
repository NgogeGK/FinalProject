<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_Model extends MY_Model {

	protected $_table='users';
	protected $primary_key='id';
	protected $return_type='array';

	public function __construct()
	{
		parent::__construct();
		
	}
	protected $before_create=array('prep_data');
	protected $after_get=array('remove_sensitive_data');
	protected $before_update = array('prep_data');
	protected $before_insert = array('prepa_data');
	//protected $before_get =array('tayarisha_data');

	protected function remove_sensitive_data($blog){
		unset($blog['status']);
		unset($blog['password']);
		
	//	unset($blog['aval']);
		return $blog;
	}

protected function prep_data($user){
	$this->load->helper('security');
	 $user['password']=sha1($user['password']);
$user['status']=1;
// 	if($user['status']==null){
// $user['status']=1;
// 	}else{$user['status']; }
	return $user;
}
protected function prepa_data($data){
unset($data['X-API-KEY']);
	return $data;
}


function firebase($data, $id, $ru=None){

if($ru != null){
$url = 'https://mine-382e3.firebaseio.com/
'.$ru.'.json';
}else{
$url = 'https://metal-incline-623.firebaseio.com/nxtgen/'.$id.'.json';	
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));

$response = curl_exec($ch);
return $data;

if (!$response) 
{
    return false;
}


}


}
