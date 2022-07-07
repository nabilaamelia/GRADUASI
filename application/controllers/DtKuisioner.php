<?php

class DtKuisioner extends CI_Controller{

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
        $data['id_periode'] = $this->input->post('id_periode');
        if($data['id_periode'] == ''){
            $data['id_periode'] = $this->session->userdata('id_periode');

        }
        $where1 = array(
            'id_periode'  => $this->session->userdata('id_periode')
        );
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );

        $data['dataterisi'] = $this->ModelPeriode->filter('detail_periode', $where1)->result_array();
        $data['penerimaB'] = $this->ModelCalon->tampil_data('penerima_bantuan')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['calon'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_dataKuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['period'] = $this->ModelPeriode->filter('periode', $where1)->result_array();

        // $a = 0;
        // foreach($data['penerima'] as $pn){
        //     $b = 0;
        //     foreach($data['kriteria'] as $k){
        //         $where3 = array(
        //             'id_kriteria' => $k['id_kriteria'],
        //             'id_detail_periode' => $pn['id_detail_periode']
        //         );
        //         $data['penerima'][$a++]['kriteria'][$b++]['kuis'] = $this->ModelPeriode->filter('kuisioner', $where3)->row();
        //     }
        // }
        $data['kuisioner'] = $this->ModelCalon->kuis($where)->result_array();

        $i = 0;
        foreach($data['kriteria'] as $krt){
            $where2 = array(
                'id_kriteria' => $krt['id_kriteria']
            );
            $data['kriteria'][$i++]['rentang'] = $this->ModelPeriode->filter('rentang_nilai', $where2)->result_array();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/DtKuisioner', $data);
        $this->load->view('templates/footer');
    }

    public function ProsesHitung()
    {
        $data['id_periode'] = $this->session->userdata('id_periode');
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        $kuisioner = $this->ModelPerhitungan->tampil_nilaiAwal($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $penerima = $this->ModelCalon->tampil_detail1($where)->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $data['id_periode']
            );
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
        $this->session->set_flashdata('flash', 'Memproses Perhitungan');
        redirect(DtKuisioner);

    }

    public function Edit($id)
    {
        $where = array(
            'id_detail_periode' => $id
        );
        $data['penerima'] = $this->ModelCalon->edit_kuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['period'] = $this->ModelCalon->tampil_detail1($where)->result_array();
        $data['kuisioner'] = $this->ModelCalon->filter_edit('kuisioner', $where)->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/EditKuis', $data);
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
                $id_rentang    =   $this->input->post('id_rentang'. $ktr['id_kriteria']);
                $data = array(
                    'id_kriteria'             => $id_kriteria,
                    'id_rentang'              => $id_rentang,
                    'id_petugas'              => $this->session->userdata('id_petugas'),
                    'id_detail_periode'       => $id

                );

                $this->ModelCalon->tambah_data($data, 'kuisioner');
            }
        }
        $this->session->set_flashdata('flash', ' Menyimpan');
        redirect(DtKuisioner);


    }

    public function EditKuis()
    {

        $kriteria              = $this->ModelKribo->tampil_data('kriteria')->result_array();

        foreach ($kriteria as $ktr ){
            $id_kuisioner  =   $this->input->post('id_kuisioner'. $ktr['id_kriteria']);
            $id_kriteria   =   $this->input->post('id_kriteria'. $ktr['id_kriteria']);
            $id_rentang    =   $this->input->post('id_rentang'. $ktr['id_kriteria']);
            $data = array(
                'id_kriteria'             => $id_kriteria,
                'id_rentang'              => $id_rentang,


            );
            $where = array(
                'id_kuisioner' => $id_kuisioner 
            );
            $this->ModelPenerima->edit_data($data, $where, 'kuisioner');
        }
        $this->session->set_flashdata('flash', ' Mengubah');
        redirect(DtKuisioner);


    }



    public function hapus_kuis($id)
    {
        $where = array(
            'id_detail_periode' => $id 
        );
        $this->ModelPenerima->hapus_data($where, 'detail_periode');
        $this->session->set_flashdata('flash', 'Menghapus');
        redirect(base_url().'DtKuisioner');
    }
}