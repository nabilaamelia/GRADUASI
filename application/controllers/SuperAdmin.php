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
        $data['penerima'] = $this->ModelPenerima->tampil_data();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $data['period'] = $this->ModelCalon->tampil_data('periode')->result_array();
        $data['petugas'] = $this->ModelPetugas->tampil_data();
        $data['calon'] = $this->ModelCalon->tampil_detail()->result_array();
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
        $this->load->view('Super/DtPenerima', $data);
        $this->load->view('Super/footer');
    }


    public function KriBoSuper()
    {
        $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/kribo', $data);
        $this->load->view('Super/footer');
    }

    public function PeriodeSuper()
    {
        $data['period'] = $this->ModelPeriode->tampil_data();
        $this->load->view('Super/header');
        $this->load->view('Super/sidebar');
        $this->load->view('Super/periode', $data);
        $this->load->view('Super/footer');
    }

    public function DtCalonSuper()
    {
     $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
     $this->load->view('Super/header');
     $this->load->view('Super/sidebar');
     $this->load->view('Super/DtCalon', $data);
     $this->load->view('Super/footer');


 }



 public function Hasil()
 {
    $data['id_periode'] = $this->input->post('id_periode');
    $where = array(
        'detail_periode.id_periode' => $data['id_periode']
    );
    $data['periode'] = $this->ModelKribo->tampil_data('periode')->result_array();
    $data['kuisioner'] = $this->ModelCalon->tampil_kuis()->result_array();
        // $data['penerima'] = $this->ModelCalon->tampil_detail()->result_array();
    $data['penerima'] = $this->ModelCalon->tampil_detail1($where)->result_array();
    $data['rentang_nilai'] = $this->ModelKribo->tampil_data('rentang_nilai')->result_array();
    $data['kriteria'] = $this->ModelKribo->tampil_data('kriteria')->result_array();
    $this->load->view('Super/header');
    $this->load->view('Super/sidebar');
    $this->load->view('Hasil/HasilPerhitungan',$data);
    $this->load->view('Super/footer');
}

public function DetailPer()
{
    $this->load->view('Super/header');
    $this->load->view('Super/sidebar');
    $this->load->view('Perhitungan');
    $this->load->view('Super/footer');
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
            'password'    => md5($password),
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
            'password'    => md5($password),
            'status'      => $status,
            'foto'        => $foto
        );
    }
    $where = array(
        'id_petugas' => $id 
    );
    $this->ModelPetugas->edit_data($data, $where, 'petugas');
    redirect('SuperAdmin/Petugas');
}

public function hapus_data($id) {
    $where = array(
        'id_petugas' => $id 
    );
    $this->ModelPetugas->hapus_data($where, 'petugas');
    redirect(base_url().'SuperAdmin/Petugas');
}


}