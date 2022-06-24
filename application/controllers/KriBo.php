<?php

class KriBo extends CI_Controller{

    public function index()
    {
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('DtMaster/KriBo', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        $nama_kode        = $this->input->post('nama_kode');
        $jenis_kriteria   = $this->input->post('jenis_kriteria');
        $atribut          = $this->input->post('atribut');
        $bobot            = $this->input->post('bobot');
        $jenis_rentang1   = $this->input->post('jenis_rentang1');
        $jenis_rentang2   = $this->input->post('jenis_rentang2');
        $jenis_rentang3   = $this->input->post('jenis_rentang3');
        $jenis_rentang4   = $this->input->post('jenis_rentang4');
        $nilai1           = $this->input->post('nilai1');
        $nilai2           = $this->input->post('nilai2');
        $nilai3           = $this->input->post('nilai3');
        $nilai4           = $this->input->post('nilai4');

        $data = array(
            'nama_kode'         => $nama_kode,
            'jenis_kriteria'   =>  $jenis_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
            
        );

        $proses     = $this->ModelKribo->tambah_data($data, 'kriteria');

        if ($proses) {
            $id =  $this->db->insert_id();
            echo $id;
            $datarentang1 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang1,
                'nilai'          => $nilai1,
            );

            $datarentang2 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang2,
                'nilai'          => $nilai2,
            );

            $datarentang3 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang3,
                'nilai'          => $nilai3,
            );

            $datarentang4 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang4,
                'nilai'          => $nilai4,
            );
        }


        $this->ModelKribo->tambah_data($datarentang1, 'rentang_nilai');
        $this->ModelKribo->tambah_data($datarentang2, 'rentang_nilai');
        $this->ModelKribo->tambah_data($datarentang3, 'rentang_nilai');
        $this->ModelKribo->tambah_data($datarentang4, 'rentang_nilai');
        $this->session->set_flashdata('flash', ' Menambah');
        redirect('KriBo');
    }





    public function edit_datakri($id)
    {
        $nama_kode        = $this->input->post('nama_kode');
        $jenis_kriteria   = $this->input->post('jenis_kriteria');
        $atribut          = $this->input->post('atribut');
        $bobot            = $this->input->post('bobot');

        $data = array(
            'nama_kode'         => $nama_kode,
            'jenis_kriteria'   =>  $jenis_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
            
        );
        
        $where = array(
            'id_kriteria' => $id 
        );
        $this->ModelKribo->edit_datakri($data, $where, 'kriteria');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('KriBo');
    }


    public function edit_datarentang($id)
    {
        $id_rentang1      = $this->input->post('id_rentang1');
        $id_rentang2      = $this->input->post('id_rentang2');
        $id_rentang3      = $this->input->post('id_rentang3');
        $id_rentang4      = $this->input->post('id_rentang4');
        $jenis_rentang1   = $this->input->post('jenis_rentang1');
        $jenis_rentang2   = $this->input->post('jenis_rentang2');
        $jenis_rentang3   = $this->input->post('jenis_rentang3');
        $jenis_rentang4   = $this->input->post('jenis_rentang4');
        $nilai1           = $this->input->post('nilai1');
        $nilai2           = $this->input->post('nilai2');
        $nilai3           = $this->input->post('nilai3');
        $nilai4           = $this->input->post('nilai4');

        // echo $nilai1;
        // echo $nilai2;
        // exit();

        $datarentang1 = array(
            'id_kriteria'    => $id,
            'jenis_rentang'  => $jenis_rentang1,
            'nilai'          => $nilai1,
        );

        $datarentang2 = array(
            'id_kriteria'    => $id,
            'jenis_rentang'  => $jenis_rentang2,
            'nilai'          => $nilai2,
        );

        $datarentang3 = array(
            'id_kriteria'    => $id,
            'jenis_rentang'  => $jenis_rentang3,
            'nilai'          => $nilai3,
        );

        $datarentang4 = array(
            'id_kriteria'    => $id,
            'jenis_rentang'  => $jenis_rentang4,
            'nilai'          => $nilai4,
        );
        
        $where1 = array(
            'id_rentang' => $id_rentang1 
        );

        $where2 = array(
            'id_rentang' => $id_rentang2 
        );

        $where3 = array(
            'id_rentang' => $id_rentang3 
        );

        $where4 = array(
            'id_rentang' => $id_rentang4 
        );
        $this->ModelKribo->edit_datarentang($datarentang1, $where1, 'rentang_nilai');
        $this->ModelKribo->edit_datarentang($datarentang2, $where2 ,'rentang_nilai');
        $this->ModelKribo->edit_datarentang($datarentang3, $where3, 'rentang_nilai');
        $this->ModelKribo->edit_datarentang($datarentang4, $where4, 'rentang_nilai');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('KriBo');
    }

    

    public function hapus_datakri($id) {
        $where = array(
            'id_kriteria' => $id 
        );
        $this->ModelKribo->hapus_datakri($where, 'kriteria', 'rentang_nilai');
        $this->session->set_flashdata('flash', ' Menghapus ');
        redirect(base_url().'KriBo');
    }

}


