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


public function tambah_aksi()
{
    $id_penerima_bantuan   = $this->input->post('id_penerima_bantuan');
    $id_periode            = $this->input->post('id_periode');
    $kriteria              = $this->ModelKribo->tampil_data('kriteria')->result_array();
    $data1 = array(
        'id_penerima_bantuan'  => $id_penerima_bantuan,
        'id_periode'           => $id_periode
    );


    $tambah = $this->ModelCalon->tambah_data($data1, 'detail_periode');
    if($tambah) {
        $id = $this->db->insert_id();

        foreach ($kriteria as $ktr ){
            $id_kriteria   =   $this->input->post('id_kriteria'. $ktr['id_kriteria']);
            $nilai         =   $this->input->post('nilai'. $ktr['id_kriteria']);
            $pecah = explode(" ", $nilai);
            $data = array(
                'nilai'                   => $pecah[0],
                'id_kriteria'             => $id_kriteria,
                'id_rentang'              => $pecah[1],
                'id_petugas'              => $this->session->userdata('id_petugas'),
                'id_detail_periode'       => $id

            );
            $this->ModelCalon->tambah_data($data, 'kuisioner');
        }
    }

    redirect(CalonGraduasi);

    
}

public function EditKuis()
{

    $kriteria              = $this->ModelKribo->tampil_data('kriteria')->result_array();

    foreach ($kriteria as $ktr ){
        $id_kuisioner  =   $this->input->post('id_kuisioner'. $ktr['id_kriteria']);
        $id_kriteria   =   $this->input->post('id_kriteria'. $ktr['id_kriteria']);
        $nilai         =   $this->input->post('nilai'. $ktr['id_kriteria']);
        $pecah = explode(" ", $nilai);
        $data = array(
            'nilai'                   => $pecah[0],
            'id_kriteria'             => $id_kriteria,
            'id_rentang'              => $pecah[1],


        );
        $where = array(
            'id_kuisioner' => $id_kuisioner 
        );
        $this->ModelPenerima->edit_data($data, $where, 'kuisioner');
    }
    

    redirect(DtKuisioner);

    
}




}