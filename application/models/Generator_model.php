<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Generator_Model extends CI_Model {

	protected $_table='id_rename';
	protected $primary_key='id';
	protected $return_type='array';

	public function __construct()
	{
		parent::__construct();

	}

function nipe_id($id){
	$rand=mt_rand(0000, 9999);
	$data=array('working_id'=>$rand);
	$this->update($id,$data);
	return $rand;

}



}
