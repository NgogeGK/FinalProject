function get_specific_r($table_name,$rule){
		//select a particular field from a table based on status
		// 'receipts.code as code,receipts.member_id,receipts.contribution_id,contributions.name, receipts.contribution_amt as amount,department.name, member.member_name as member,receipts.time_stamp'
		$this->db->select('receipts.code as code,receipts.member_id,receipts.contribution_id,contributions.name, receipts.contribution_amt as amount,department.name as department, member.member_name as member,receipts.date_created as time_stamp')
		->from($table_name)->join('contributions','contributions.id=receipts.contribution_id')
		->join('member','member.member_id=receipts.member_id')
		->join('department','receipts.department_id=department.did');
		$this->db->where($rule);
		$this->db->order_by('receipts.date_created');
		// $this->db->group_by('receipts.member_id');
		// $this->db->where('receipts.status',1);
		// $this->db->where('status',1);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->result();
			}
		else {return NULL;}}
