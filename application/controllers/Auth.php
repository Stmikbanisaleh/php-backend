<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = array(
            'email' => $email,
            'password' => $password
        );
        $user = $this->lapan_api_library->call('users/login', $data);
        $user = $user['data'];
        if ($user['status'] == 200) {
            if ($user['token']) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role'],
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    'is_active' => $user['is_active'],
                    'name_rev' => $user['nama_rev'],
                    'status' => $user['status_rev'],
                    'keterangan' => $user['keterangan'],
                    'golongan' => $user['golongan'],
                    'token' => $user['token']
                ];
                $this->session->set_userdata($data);
                echo "berhasil";
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Password salah!</div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda sudah log out</div>');
        redirect('auth');
    }

    private function _token($length = 12)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    private function _send_email($token, $type)
    {
        require 'assets/PHPMailer/PHPMailerAutoload.php';


        $mail = new PHPMailer;

        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dummyarif3228@gmail.com';
        $mail->Password = '1234dummy';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('dummyarif3228@gmail.com');
        // Menambahkan penerima
        $mail->addAddress($this->input->post('email'));
        // Menambahkan beberapa penerima
        //$mail->addAddress('penerima2@contoh.com');
        //$mail->addAddress('penerima3@contoh.com');

        // Menambahkan cc atau bcc 
        //$mail->addCC('cc@contoh.com');
        //$mail->addBCC('bcc@contoh.com');


        if ($type == 'verify') {
            // Subjek email
            $mail->Subject = 'Standar Penerbangan dan Antariksa - Verifikasi akun';

            // Mengatur format email ke HTML
            $mail->isHTML(true);

            // Konten/isi email
            $mailContent = 'Klik untuk aktivasi akun anda <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>';

            $mail->Body = $mailContent;
            // Menambahakn lampiran
            //$mail->addAttachment('berita/'.$file);
            //$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

        }

        if ($type == 'forgot') {
            // Subjek email
            $mail->Subject = 'Standar Penerbangan dan Antariksa - Reset Password';

            // Mengatur format email ke HTML
            $mail->isHTML(true);

            // Konten/isi email
            $mailContent = 'Klik untuk reset password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>';

            $mail->Body = $mailContent;
            // Menambahakn lampiran
            //$mail->addAttachment('berita/'.$file);
            //$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

        }

        // Kirim email
        if (!$mail->send()) {
            $pes = 'Pesan tidak dapat dikirim.';
            $mai = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $pes = 'Pesan telah terkirim';
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('forgotpassword');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('msuser', ['EMAIL' => $email, 'IS_ACTIVE' => 3])->row_array();

            if ($user) {
                $token = $this->_token();
                $user_token = [
                    'EMAIL' => $email,
                    'TOKEN' => $token,
                    'DATE_CREATED' => time()
                ];

                $this->db->insert('msusertoken', $user_token);
                $this->_send_email($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Periksa email untuk reset password!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
                redirect('auth');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('msuser', ['EMAIL' => $email])->row_array();

        if ($user) {
            $user_token  = $this->db->get_where('msusertoken', ['TOKEN' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal,token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal,Email salah</div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('changepassword');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('PASSWORD', $password);
            $this->db->where('EMAIL', $email);
            $this->db->update('msuser');

            $this->db->delete('msusertoken', ['EMAIL' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password telah diubah,silahkan Login</div>');
            redirect('auth');
        }
    }
}
