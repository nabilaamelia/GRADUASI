  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Auth extends CI_Controller{



    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('login.php');
        $this->load->view('templates/footer');
        
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));


        $cekuser = $this->ModelLogin->cekuser($username);
        if ($cekuser) {

            $ceklogin = $this->ModelLogin->ceklogin($username,$password);

            if ($ceklogin) {
                foreach ($ceklogin as $row) 

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

                    } else {

                        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Maaf Akun Anda Belum Aktif !</strong><br> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>');
                        redirect('Auth');
                    }

                } else {

                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Maaf!</strong><br>Username atau Password anda Salah.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                    redirect('Auth');
                }

            } else{

                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Maaf!</strong><br> Username Belum Terdaftar.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
                redirect('Auth');
            }

        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('Auth');
        }
    }

