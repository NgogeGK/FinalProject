<?php

class Family_Model extends MY_Model {

    protected $_table='family';
     protected $primary_key='id';
    protected $return_type='array';

    public function __construct()
    {
        parent::__construct();

    }

    function nipe_wote($x){
$this->db->select('name,email,phone,family')->from('family')->where('family',$x);
$query=$this->db->get();
 if($query->num_rows()>0){
            return $query->result();
        }else{return 0; }
	}

  

function nipe_majina(){
$this->db->select('family')->from('family')->where('status',1);
$this->db->group_by('family');
$query=$this->db->get();
if($query->num_rows()>0){
            return $query->result();
        }else{return 0; }
    }



    function records(){
        $this->db->select('*')->from('logs')->where('response_code',400)->where('response_code',500);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{return 0; }

    }

function wote(){
// $this->db->select('name as jina,email as pepea')->from('family')-
    $this->db->select('id,name as jina,email as pepea,member_type')->from('family')->where('status',1);

    $query=$this->db->get();
 if($query->num_rows()>0){
            return $query->result();
        }else{return 0; }
}

}
?>