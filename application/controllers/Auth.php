  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Auth extends CI_Controller{



    public function index()
    {
        $data['judul'] = "Login";

        $this->load->view('templates/header', $data);
        $this->load->view('login.php');
        $this->load->view('templates/footer');
        
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $where = array(
            'username like binary' => $username
        );

        $cekuser = $this->ModelLogin->cek($where, 'petugas');
        if($cekuser->num_rows() > 0 ){
            $where1 = array(
                'username like binary' => $username,
                'password'             => $password
            );
            $ceklogin = $this->ModelLogin->cek($where1, 'petugas');
            if($ceklogin->num_rows() > 0){
                $row = $ceklogin->row();
                if (($row->status) == 'aktif') {

                    $this->session->set_userdata('id_petugas', $row->id_petugas);
                    $this->session->set_userdata('nama', $row->nama);
                    $this->session->set_userdata('username', $row->username);
                    $this->session->set_userdata('password', $row->password);
                    $this->session->set_userdata('nohp', $row->nohp);
                    $this->session->set_userdata('alamat', $row->alamat);
                    $this->session->set_userdata('foto', $row->foto);
                    $this->session->set_userdata('level', $row->level);

                    if ($this->session->userdata('level')=='Admin'){
                        $this->session->set_flashdata(
                            'Berhasil',
                            '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text:  "Login" ,

                                })
                                </script>');
                        redirect(base_url('Dashboard'), 'refresh');
                    } else {
                        $this->session->set_flashdata(
                            'Berhasil',
                            '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text:  "Login" ,

                                })
                                </script>');
                        redirect(base_url('SuperAdmin/Dashboard'), 'refresh');
                    }
                } else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Maaf Akun Anda Belum Aktif !</strong><br> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                    redirect(base_url('Auth'));
                }
            } else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Maaf!</strong><br>Username atau Password anda Salah.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
                redirect(base_url('Auth'));
            }
        }  else{

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Maaf!</strong><br> Username Belum Terdaftar.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>');
            redirect(base_url('Auth'));
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}

