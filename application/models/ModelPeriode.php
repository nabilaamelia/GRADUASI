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

	public function tampilperiode($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id_periode', 'DESC');
		return $this->db->get();
	}

	public function filter($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}
}

?>