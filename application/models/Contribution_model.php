<?php

class Contribution_Model extends MY_Model {

    protected $_table='contributions';
     protected $primary_key='id';
    protected $return_type='array';

    public function __construct()
    {
        parent::__construct();

    }

function retrieve($status){

	$this->db->select('*')->from('contributions')->where('status',$status);

	$query=$this->db->get();
 if($query->num_rows()>0){
            $process=$query->result();

            foreach ($process as $value) {
                // var_dump($value);
                $mine=$this->department($value->did);
                $value->deparment=$mine['name'];
                # code...
            }
            return $process;
        }else{return 0; }
}


function department($id){
$this->db->select('name')->from('department')->where('did',$id);

    $query=$this->db->get();
 if($query->num_rows()>0){
            return $query->row_array();
        }else{return 0; }

}

}