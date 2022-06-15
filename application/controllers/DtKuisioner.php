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


    

    

    

    
}