<?php

class Hasil extends CI_Controller{

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
        $data['id_periode'] = $this->session->userdata('id_periode');
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        
        $data['hasil'] = $this->session->userdata('hasil');
        $cek = $this->ModelPenerima->cek($where, 'detail_periode')->num_rows();
        $jumlah = $cek*($data['hasil']/100) ;
        $final = number_format($jumlah, 0);
        
        $data['penerima'] = $this->ModelPerhitungan->peringkat($where, $final)->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/HasilPerhitungan', $data);
        $this->load->view('templates/footer');
    }


    public function PrintHasil($id)
    {
        // Memanggil id untuk tampilan laporannya
        $where = array(
            'detail_periode.id_periode' => $id
        );
        // Memanggil id untuk judul halaman print
        $where3 = array(
            'id_periode'  => $id
        );
        $data['periode'] = $this->ModelPeriode->tampil_data1($where3);
        // memanggil nilai awal
        $kuisioner = $this->ModelPerhitungan->tampil_nilaiAwal($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $penerima = $this->ModelCalon->tampil_detail1($where)->result_array();
        // variabel untuk memanggil nilai max min
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $id
            );
            //Menentuka nilai max min
            $data['kriteria'][$a++]['max']= $this->ModelPerhitungan->getmax($where2)->row();
            $data['kriteria'][$i++]['min']= $this->ModelPerhitungan->getmin($where2)->row();
        }
        foreach($penerima as $prm){
            $total = 0;
            // $b = 0;
            // $c = 0;
            foreach($data['kriteria'] as $ktr) {
                $max = $ktr['max']->nilai; 
                $min = $ktr['min']->nilai;
                foreach($kuisioner as $ksr){
                    if($prm['id_detail_periode'] == $ksr['id_detail_periode'] && $ktr['id_kriteria'] == $ksr['id_kriteria']){
                        $nilai = $ksr['nilai'];
                        // Mengitung total nilai preferensi
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
            // memasukkan / update nilai total ke db
            $this->ModelPenerima->edit_data($data1, $where1, 'detail_periode');
        }

        $data['hasil'] = $this->session->userdata('hasil');
        $cek = $this->ModelPenerima->cek($where, 'detail_periode')->num_rows();
        // menentukan hasil rekomendasi
        $jumlah = $cek*($data['hasil']/100) ;
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