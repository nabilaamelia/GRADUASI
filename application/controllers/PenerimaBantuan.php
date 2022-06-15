<?php

class PenerimaBantuan extends CI_Controller{

  

    public function index()
    {
        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('DtMaster/DtPenerima', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        $nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $angkatan   = $this->input->post('angkatan');
        $kategori   = $this->input->post('kategori');
        $status_bantuan = $this->input->post('status_bantuan');
        

        $data = array(
            'nik'         => $nik,
            'nama'        => $nama,
            'alamat'      => $alamat,
            'angkatan'    => $angkatan,
            'kategori'    => $kategori,
            'status_bantuan'    => $status_bantuan
            
        );

        $this->ModelPenerima->tambah_penerima($data, 'penerima_bantuan');
        $this->session->set_flashdata('flash', ' Menambah');
        redirect('PenerimaBantuan');
    }

    public function edit_data($id)
    {
        $nik      = $this->input->post('nik');
        $nama     = $this->input->post('nama');
        $alamat   = $this->input->post('alamat');
        $angkatan = $this->input->post('angkatan');
        $kategori = $this->input->post('kategori');
        $status_bantuan = $this->input->post('status_bantuan');


        $data = array(
            'nik'         => $nik,
            'nama'        => $nama,
            'alamat'      => $alamat,
            'angkatan'    => $angkatan,
            'kategori'    => $kategori,
            'status_bantuan'    => $status_bantuan
            
        );
        
        
        $where = array(
            'id_penerima_bantuan' => $id 
        );
        $this->ModelPenerima->edit_data($data, $where, 'penerima_bantuan');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('PenerimaBantuan');
    }

    public function hapus_data($id) {
        $where = array(
            'id_penerima_bantuan' => $id 
        );
        $this->ModelPenerima->hapus_data($where, 'penerima_bantuan');
        $this->session->set_flashdata('flash', 'Menghapus');
        redirect(base_url().'PenerimaBantuan');
    }

    

    
    
}