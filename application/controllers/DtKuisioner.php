<?php

class DtKuisioner extends CI_Controller{



    public function index()
    {

        $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/DtKuisioner', $data);
        $this->load->view('templates/footer');
    }

    public function Edit()
    {

        $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['period'] = $this->ModelCalon->tampil_data('periode')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/EditKuis', $data);
        $this->load->view('templates/footer');
    }


    

    

    

    
}