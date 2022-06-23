<?php

class Hasil extends CI_Controller{


    public function index()
    {
        $data['id_periode'] = $this->input->post('id_periode');
        if($data['id_periode'] == ''){
            $data['id_periode'] = $this->session->userdata('id_periode');

        }
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        $data['periode'] = $this->ModelKribo->tampil_data('periode')->result_array();
        $kuisioner = $this->ModelCalon->tampil_kuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $penerima = $this->ModelCalon->tampil_detail1($where)->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $data['id_periode']
            );
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where2)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where2)->row();
        }
        foreach($penerima as $prm){
            $total = 0;
            $b = 0;
            $c = 0;
            foreach($data['kriteria'] as $ktr) {
                $max = $ktr['max']->nilai;
                
                $min = $ktr['min']->nilai;
                foreach($kuisioner as $ksr){
                    if($prm['id_detail_periode'] == $ksr['id_detail_periode'] && $ktr['id_kriteria'] == $ksr['id_kriteria']){
                        $nilai = $ksr['nilai'];

                        if($ktr['atribut'] == 'Benefit'){
                            $normalisasi = $nilai/$max;
                            
                            $preferensi  = $normalisasi * $ktr['bobot'];
                            $total+= $preferensi;
                        } else {
                            $normalisasi = $min/$nilai;
                            $preferensi  = $normalisasi * $ktr['bobot'];
                            $total+= $preferensi;
                        }
                    }

                }
            }
            $format = number_format($total, 2);
            $data1 = array(
                "total" => $format
            );
            $where1 = array(
                'id_detail_periode' => $prm['id_detail_periode']
            );
            $this->ModelPenerima->edit_data($data1, $where1, 'detail_periode');
        }

        $cek = $this->ModelPenerima->cek($where, 'detail_periode')->num_rows();
        $jumlah = $cek/10 ;
        $final = number_format($jumlah, 0);
        
        $data['penerima'] = $this->ModelPerhitungan->peringkat($where, $final)->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/HasilPerhitungan', $data);
        $this->load->view('templates/footer');
    }


    public function PrintHasil()
    {
        $data['id_periode'] = $this->input->post('id_periode');
        if($data['id_periode'] == ''){
            $data['id_periode'] = $this->session->userdata('id_periode');

        }
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        $data['periode'] = $this->ModelKribo->tampil_data('periode')->result_array();
        $kuisioner = $this->ModelCalon->tampil_kuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $penerima = $this->ModelCalon->tampil_detail1($where)->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $data['id_periode']
            );
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where2)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where2)->row();
        }
        foreach($penerima as $prm){
            $total = 0;
            $b = 0;
            $c = 0;
            foreach($data['kriteria'] as $ktr) {
                $max = $ktr['max']->nilai;
                
                $min = $ktr['min']->nilai;
                foreach($kuisioner as $ksr){
                    if($prm['id_detail_periode'] == $ksr['id_detail_periode'] && $ktr['id_kriteria'] == $ksr['id_kriteria']){
                        $nilai = $ksr['nilai'];

                        if($ktr['atribut'] == 'Benefit'){
                            $normalisasi = $nilai/$max;
                            
                            $preferensi  = $normalisasi * $ktr['bobot'];
                            $total+= $preferensi;
                        } else {
                            $normalisasi = $min/$nilai;
                            $preferensi  = $normalisasi * $ktr['bobot'];
                            $total+= $preferensi;
                        }
                    }

                }
            }
            $format = number_format($total, 2);
            $data1 = array(
                "total" => $format
            );
            $where1 = array(
                'id_detail_periode' => $prm['id_detail_periode']
            );
            $this->ModelPenerima->edit_data($data1, $where1, 'detail_periode');
        }

        $cek = $this->ModelPenerima->cek($where, 'detail_periode')->num_rows();
        $jumlah = $cek/10 ;
        $final = number_format($jumlah, 0);
        
        $data['penerima'] = $this->ModelPerhitungan->peringkat($where, $final)->result_array();

        $this->load->library('pdfgenerator');

        // / title dari pdf
        $data['title_pdf'] = 'Data UMKM Kabupaten Madiun';

        // filename dari pdf ketika didownload
        $file_pdf = 'UMKM Kabupaten Madiun';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('Hasil/view_printHasil', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }



}