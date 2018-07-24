<?php 

class Log_Model extends MY_Model {

	protected $_table='receipt_log';
	// protected $primary_key='id';
	protected $return_type='array';

	public function __construct()
	{
		parent::__construct();
		
	}


function test(){
	echo "Success";
}
function income($id,$from=0,$to=0)
{
/*
 This function gives income recordsbased on payment id and additionalfilter- from time and to time.
*/
 $this->db->select('*')->from('receipts')->where('contribution_id',$id);

 if($from!=0){
$this->db->where("time_stamp >=",$from.'00:00:00');
if($to!=0){
	$this->db->where("time_stamp <=",$to.'23:59:59');

}

 }


    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result();

    }else{
    	return 0;
    }

}

function dept_cont($did){
	/*
	fetchesall contributions under a department based on department id
	*/

	$this->db->from('contributions')->select('id,name')->where('did',$did);
	 $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result();

    }else{
    	return 0;
    }
}

function expenditure($id,$from=0,$to=0)
{
	$this->db->select('*')->from('expenditure')->where('department_id',$id)->where('status',1);

	 if($from!=0){
$this->db->where("time_stamp >=",$from.'00:00:00');
if($to!=0){
	$this->db->where("time_stamp <=",$to.'23:59:59');

}
}
 $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result();

    }else{
    	return 0;
    }
}

}