<?php  

class ModelKribo extends CI_Model {
    public function tampil_data($table){
        return $this->db->get($table);

    }

    
    
    public function tambah_data($data,$table){
        $this->db->insert($table,$data);
        return true;
    }

    

    public function edit_datakri($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        
    }

    public function edit_datarentang($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        
    }

    public function hapus_datakri($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>