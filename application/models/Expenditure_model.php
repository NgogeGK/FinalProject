<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Expenditure_Model extends MY_Model {

	protected $_table='expenditure';
	protected $primary_key='id';
	protected $return_type='array';

	public function __construct()
	{
		parent::__construct();
		
	}

}