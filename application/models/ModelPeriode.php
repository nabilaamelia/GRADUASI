<?php  

class ModelPeriode extends CI_Model {
	public function tampil_data(){
		return $this->db->get('periode')->result_array();
	}

	public function tambah_periode($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
		
	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}

?>