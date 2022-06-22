<?php  

class ModelPenerima extends CI_Model {
	public function tampil_data(){
		return $this->db->get('penerima_bantuan')->result_array();
	}

	public function tambah_penerima($data,$table){
		$this->db->insert($table,$data);
	}

	public function cek($where, $table){
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->get();
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