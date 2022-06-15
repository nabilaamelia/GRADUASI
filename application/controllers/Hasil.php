<?php

class Hasil extends CI_Controller{

    

    
    public function index()
    {
        $data['id_periode'] = $this->input->post('id_periode');
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        $data['periode'] = $this->ModelKribo->tampil_data('periode')->result_array();
        $data['kuisioner'] = $this->ModelCalon->tampil_kuis()->result_array();
        // $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail1($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/HasilPerhitungan', $data);
        $this->load->view('templates/footer');
    }

    
}