<?php

class Rekomendasi extends CI_Controller{

 
    
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/HasilGraduasi');
        $this->load->view('templates/footer');
    }

    
}