<?php

class Periode extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level') != 'Admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong><br> Anda Harus Login Dulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Auth');
        }
    }

    

    public function index()
    {
        $data['period'] = $this->ModelPeriode->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('DtMaster/periode', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $nama_periode  = $this->input->post('nama_periode');
        $tgl_dimulai   = $this->input->post('tgl_dimulai');
        $tgl_berakhir  = $this->input->post('tgl_berakhir');
        

        $data = array(
            'nama_periode'         => $nama_periode,
            'tgl_dimulai'          => $tgl_dimulai,
            'tgl_berakhir'         => $tgl_berakhir,
            
        );

        $this->ModelPeriode->tambah_periode($data, 'periode');
        $this->session->set_flashdata('flash', ' Menambah');
        redirect('Periode');
    }

    public function edit_data($id)
    {
        $nama_periode  = $this->input->post('nama_periode');
        $tgl_dimulai   = $this->input->post('tgl_dimulai');
        $tgl_berakhir  = $this->input->post('tgl_berakhir');
        
        $data = array(
            'nama_periode'         => $nama_periode,
            'tgl_dimulai'          => $tgl_dimulai,
            'tgl_berakhir'         => $tgl_berakhir,
            
        );
        
        $where = array(
            'id_periode' => $id 
        );
        $this->ModelPeriode->edit_data($data, $where, 'periode');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('Periode');
    }

    public function hapus_data($id) {
        $where = array(
            'id_periode' => $id 
        );
        $this->ModelPeriode->hapus_data($where, 'periode');
        $this->session->set_flashdata('flash', ' Menghapus ');
        redirect(base_url().'Periode');
    }

    

    
}