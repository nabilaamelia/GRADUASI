<?php

class DtKuisioner extends CI_Controller{



    public function index()
    {
        $data['id_periode'] = $this->input->post('id_periode');
        if($data['id_periode'] == ''){
            $data['id_periode'] = $this->session->userdata('id_periode');

        }
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        $data['calon'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_dataKuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Proses/DtKuisioner', $data);
        $this->load->view('templates/footer');
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