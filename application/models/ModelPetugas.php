<?php  

class ModelPetugas extends CI_Model {
	public function tampil_data(){
		return $this->db->get('petugas')->result_array();
	}

	public function tampil_petugas($where){
		$this->db->where($where);
		return $this->db->get('petugas');
	}

	public function tambah_petugas($data,$table){
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