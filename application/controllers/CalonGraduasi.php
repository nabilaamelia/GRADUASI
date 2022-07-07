<?php

class CalonGraduasi extends CI_Controller{

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
        $where = array (
            'id_periode'  => $this->session->userdata('id_periode')
        );
        $data['dataterisi'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_data('penerima_bantuan')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['period'] = $this->ModelPeriode->filter('periode', $where)->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/FormKuisioner', $data);
        $this->load->view('templates/footer');
    }







}