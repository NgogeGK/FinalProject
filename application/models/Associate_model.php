<?php

class Associate_Model extends MY_Model {

    protected $_table='associate';
     protected $primary_key='id';
    protected $return_type='array';

    public function __construct()
    {
        parent::__construct();

    }

function wote(){

	$this->db->select('id,name as jina,email as pepea,member_type')->from('associate')->where('status',1);

	$query=$this->db->get();
 if($query->num_rows()>0){
            return $query->result();
        }else{return 0; }
}


}