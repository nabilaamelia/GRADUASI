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

// Dashboard
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
// Akhir Dashboard

// Profil
    public function Profil()
    {
        $this->load->view('super/header');
        $this->load->view('super/sidebar');
        $this->load->view('profile');
        $this->load->view('super/footer');
    }
// Akhir Profil


// Penerima Bantuan
    public function DtPenerimaSuper()

    {
        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/DtPenerima', $data);
        $this->load->view('Super/footer');
    }


    
// Akhir Penerima Bantuan

// Kriteria dan bobot
    public function KriBoSuper()
    {
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/KriBo', $data);
        $this->load->view('Super/footer');
    }

// Periode
    public function PeriodeSuper()
    {
        $data['period'] = $this->ModelPeriode->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/periode', $data);
        $this->load->view('Super/footer');
    }

// Kuisioner
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
        $this->load->view('Super/FormKuisioner', $data);
        $this->load->view('Super/footer');
    }

    public function tambah_kuis()
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
        redirect(base_url().'SuperAdmin/FormKuis');


    }
//Akhir Kuisioner


// Data Hasil Kuisioner
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
        $this->load->view('Super/DtKuisioner', $data);
        $this->load->view('Super/footer');
    }

    public function View_Edit($id)
    {
        $where = array(
            'id_detail_periode' => $id
        );
        $data['penerima'] = $this->ModelCalon->edit_kuis($where)->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['period'] = $this->ModelCalon->tampil_detail1($where)->result_array();
        $data['kuisioner'] = $this->ModelCalon->filter_edit('kuisioner', $where)->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/EditKuis', $data);
        $this->load->view('Super/footer');
    }


    public function EditKuis_Super()
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


        redirect(base_url().'SuperAdmin/DtCalonSuper');
    }

    public function hapus_kuis($id)
    {
        $where = array(
            'id_detail_periode' => $id 
        );
        $this->ModelPenerima->hapus_data($where, 'detail_periode');
        $this->session->set_flashdata('flash', 'Menghapus');
        redirect(base_url().'SuperAdmin/DtCalonSuper');
    }



//Akhir Data Hasil Kuisioner

// Hasil Graduasi
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

        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/HasilPerhitungan', $data);
        $this->load->view('Super/footer');
    }
// Akhir Hasil Graduasi

// Detail Perhitungan
    public function DetailPerhitungan($id)
    {
        $where = array(
            'detail_periode.id_periode'  => $id
        );
        $data['kuisioner'] = $this->ModelPerhitungan->tampil_nilaiAwal($where)->result_array();
        $data['penerima'] = $this->ModelCalon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['id_periode'] = $id ;
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
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

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Hasil/Perhitungan', $data);
        $this->load->view('templates/footer');
    }
// Akhir Detail Perhitungan

// Data Petugas
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
// Akhir Data Petugas

}