<?php

class SuperAdmin extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level') != 'Superadmin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong><br> Anda Harus Login Dulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Auth');
        }
    }

    public function Dashboard()
    {
        $id = $this->input->post('id_periode');
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
            'id_periode'  => $this->session->userdata('id_periode')
        );

        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['period'] = $this->ModelCalon->tampil_data('periode')->result_array();
        $data['petugas'] = $this->ModelPetugas->tampil_data();
        $data['calon'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/Dashboard', $data);
        $this->load->view('Super/footer');
    }

    public function Profil()
    {
        $this->load->view('super/header');
        $this->load->view('super/sidebar');
        $this->load->view('profile');
        $this->load->view('super/footer');
    }

    public function DtPenerimaSuper()

    {
        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('DtMaster/DtPenerima', $data);
        $this->load->view('Super/footer');
    }


    public function KriBoSuper()
    {
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('DtMaster/kribo', $data);
        $this->load->view('Super/footer');
    }

    public function PeriodeSuper()
    {
        $data['period'] = $this->ModelPeriode->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('DtMaster/periode', $data);
        $this->load->view('Super/footer');
    }

    public function FormKuis()
    {
        $where = array (
            'id_periode'  => $this->session->userdata('id_periode')
        );
        $data['dataterisi'] = $this->ModelPeriode->filter('detail_periode', $where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_data('penerima_bantuan')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['period'] = $this->ModelPeriode->filter('periode', $where)->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Proses/FormKuisioner', $data);
        $this->load->view('Super/footer');
    }

    public function DtCalonSuper()
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
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Proses/DtKuisioner', $data);
        $this->load->view('Super/footer');
    }


    public function Hasil()
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
        $data['penerima'] = $this->ModelPerhitungan->peringkat($where)->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/HasilPerhitungan', $data);
        $this->load->view('templates/footer');
    }



    public function Petugas()
    {
        $data['petugas'] = $this->ModelPetugas->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/DataAkun', $data);
        $this->load->view('Super/footer');
    }

    public function tambah_aksi()
    {
        $nama     = $this->input->post('nama');
        $alamat   = $this->input->post('alamat');
        $nohp     = $this->input->post('nohp');
        $level    = $this->input->post('level');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status');
        $foto     = $_FILES['foto']['name'];


        if ($foto = ''){} else {
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Gambar gagal diupload!";
            } else{
                $foto=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nama'        => $nama,
            'alamat'      => $alamat,
            'nohp'        => $nohp,
            'level'       => $level,
            'username'    => $username,
            'password'    => md5($password),
            'status'      => $status,
            'foto'        => $foto
        );

        $this->ModelPetugas->tambah_petugas($data, 'petugas');
        $this->session->set_flashdata('flash', ' Menambah');
        redirect('SuperAdmin/Petugas');
    }

    public function edit_data($id)
    {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $nohp       = $this->input->post('nohp');
        $level      = $this->input->post('level');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $status     = $this->input->post('status');
        $foto       = $_FILES['foto']['name'];

        echo $foto_awal .'<br>';
        echo $foto;
        echo $nama;
        if ($foto == null) {
            $data = array(
                'nama'        => $nama,
                'alamat'      => $alamat,
                'nohp'        => $nohp,
                'level'       => $level,
                'username'    => $username,
                'status'      => $status


            );
        }

        else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Foto gagal diupload";
            } else {
                $foto=$this->upload->data('file_name');
            }
            $data = array(
                'nama'        => $nama,
                'alamat'      => $alamat,
                'nohp'        => $nohp,
                'level'       => $level,
                'username'    => $username,
                'status'      => $status,
                'foto'        => $foto
            );
        }
        $where = array(
            'id_petugas' => $id 
        );
        $this->ModelPetugas->edit_data($data, $where, 'petugas');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('SuperAdmin/Petugas');
    }

    public function hapus_data($id) {
        $where = array(
            'id_petugas' => $id 
        );
        $this->ModelPetugas->hapus_data($where, 'petugas');
        $this->session->set_flashdata('flash', ' Menghapus ');
        redirect(base_url().'SuperAdmin/Petugas');
    }


}