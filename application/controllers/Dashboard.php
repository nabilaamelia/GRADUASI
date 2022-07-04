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
        $id = $this->input->post('id_periode');
        $hasil = $this->session->userdata('hasil');
        $data['periodeGrafik'] = $this->ModelPeriode->tampilGrafik('periode')->result_array();
        $i = 0;
        foreach($data['periodeGrafik'] as $dt){
            $where = array(
                'detail_periode.id_periode' => $dt['id_periode']
            );
            $cek = $this->ModelPenerima->cek($where, 'detail_periode')->num_rows();
            $jumlah = $cek*($hasil/100) ;
            $final = number_format($jumlah, 0);

            $data['periodeGrafik'][$i++]['jumlah'] = $this->ModelPerhitungan->peringkat($where, $final)->num_rows(); 
        }

        $data['periode'] = $this->ModelPeriode->tampilperiode('periode')->result_array();

        if($id == ''){
            if($this->session->userdata('id_periode') == '' ){
                $this->session->set_userdata('id_periode', $data['periode']['0']['id_periode']);
            }  
        }
        else {
            $this->session->set_userdata('id_periode', $id);
        }

        $where = array(
            'id_periode'  => $this->session->userdata('id_periode'),

        );
        
        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['period'] = $this->ModelCalon->tampil_data('periode')->result_array();
        $data['petugas'] = $this->ModelPetugas->tampil_data();
        $data['calon'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function FilterHasil()
    {
        $hasil = $this->input->post('hasil');
        $this->session->set_userdata('hasil', $hasil);
        echo "<script>
        window.location=history.go(-1);
        </script>";
    }

    public function FilterPeriode()
    {
        $id = $this->input->post('id_periode');
        $this->session->set_userdata('id_periode', $id);
        echo "<script>
        window.location=history.go(-1);
        </script>";
    }


    

}