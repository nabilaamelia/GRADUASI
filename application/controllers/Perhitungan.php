<?php

class Perhitungan extends CI_Controller{



    public function hasil($id)
    {
        $where = array(
            'detail_periode.id_periode'  => $id
        );
        $data['kuisioner'] = $this->ModelCalon->tampil_kuis($where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['id_periode'] = $id ;
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] AS $ktr){
            $where = array(
                'id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode'  => $id
            );
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where)->row();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/Perhitungan', $data);
        $this->load->view('templates/footer');
    }


    public function Print($id)
    {
        $where = array(
            'detail_periode.id_periode'  => $id
        );
        $data['kuisioner'] = $this->ModelCalon->tampil_kuis($where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] AS $ktr){
            $where = array(
                'id_kriteria'  => $ktr['id_kriteria'],
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
        $html = $this->load->view('Hasil/view_print', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }



    
}