<?php

class Perhitungan extends CI_Controller{

    

    public function index()
    {
        $data['kuisioner'] = $this->ModelCalon->tampil_kuis()->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/Perhitungan', $data);
        $this->load->view('templates/footer');
    }

    
}