<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Receipts_Model extends MY_Model {

	protected $_table='receipts';
	protected $primary_key='id';
	protected $return_type='array';

	public function __construct()
	{
		parent::__construct();
		
	}

}