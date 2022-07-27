<?php

class Perhitungan extends CI_Controller{

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
            date_default_timezone_set("Asia/Jakarta");
        }
    }



    public function hasil()
    {
        $where = array(
            'detail_periode.id_periode'  => $this->session->userdata('id_periode')
        );
        $data['kuisioner'] = $this->ModelPerhitungan->tampil_nilaiAwal($where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['id_periode'] = $this->session->userdata('id_periode') ;
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] AS $ktr){
            $where = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode'  => $this->session->userdata('id_periode')
            );
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where)->row();
        }
        // echo print_r($data['kriteria']);
        // exit;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/Perhitungan', $data);
        $this->load->view('templates/footer');
    }


    public function PrintDetail($id)
    {
        $where = array(
            'detail_periode.id_periode'  => $id
        );
        $data['kuisioner'] = $this->ModelPerhitungan->tampil_nilaiAwal($where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        // Memanggil id untuk judul halaman print
        $where3 = array(
            'id_periode'  => $id
        );
        $data['periode'] = $this->ModelPeriode->tampil_data1($where3);
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] AS $ktr){
            $where = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode'  => $id
            );
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where)->row();
        }

        $this->load->library('pdfgenerator');

        // filename dari pdf ketika didownload
        $file_pdf = 'Detail Perhitungan Rekomendasi Graduasi PKH';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('Hasil/view_printDetail', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }



    
}