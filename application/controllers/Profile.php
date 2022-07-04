<?php 

class Profile extends CI_Controller{

    public function index()
    {
        $data['petugas'] = $this->ModelPetugas->tampil_data();
        $where = array(
            'id_petugas' => $this->session->userdata('id_petugas')
        );
        $data['profil'] = $this->ModelPetugas->tampil_petugas($where)->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('profile', $data);
        $this->load->view('templates/footer');
    }


    public function EditProfil()
    {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $nohp       = $this->input->post('nohp');
        $username   = $this->input->post('username');
        $foto       = $_FILES['foto']['name'];


        echo $foto;
        echo $nama;
        if ($foto == null) {
            $data = array(
                'nama'        => $nama,
                'alamat'      => $alamat,
                'nohp'        => $nohp,
                'username'    => $username

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
                'username'    => $username,
                'foto'        => $foto
            );
        }
        $where = array(
            'id_petugas' => $this->session->userdata('id_petugas') 
        );


        $this->ModelPetugas->edit_data($data, $where, 'petugas');
        $this->session->set_flashdata('flash', ' Mengedit');
        redirect('Profile');
    }

    public function UbahPass()
    {
        $id = $this->session->userdata('id_petugas');
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi  = $this->input->post('konfirmasi');

        $password = $this->db->get('petugas', array('id_petugas' => $id))->row()->password;

        if (md5($password_lama) == $password) {
            if ($password_baru == $konfirmasi) {
                $data = array(
                    'password' => md5($password_baru)
                );
                $this->db->update('petugas', $data, array('id_petugas' => $id));
                $this->session->set_flashdata(
                    'Berhasil',
                    '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text:  "Mengubah Password" ,

                        })
                        </script>');
            } else {
                $this->session->set_flashdata(
                    'gagal',
                    '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text:  "Konfirmasi password baru tidak sesuai" ,
                        })
                        </script>');
            }
        } else {
            $this->session->set_flashdata(
                'gagal',
                '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text:  "Password lama yang anda inputkan tidak sesuai" ,
                    })
                    </script>');
        }
        redirect('Profile');
    }

}
