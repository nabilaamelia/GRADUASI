<?php

class Dashboard extends CI_Controller{

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
    $data['penerima'] = $this->ModelPenerima->tampil_data();
    $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
    $data['period'] = $this->ModelCalon->tampil_data('periode')->result_array();
    $data['petugas'] = $this->ModelPetugas->tampil_data();
    $data['calon'] = $this->ModelCalon->tampil_detail()->result_array();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('Dashboard', $data);
    $this->load->view('templates/footer');
}






public function Profil()
{
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('profile');
    $this->load->view('templates/footer');
}




}