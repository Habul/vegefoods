<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {
        $session = $this->session->userdata('status');
        if ($session == '') {
            $this->load->view('frontend/v_header');
            $this->load->view('frontend/v_login');
            $this->load->view('frontend/v_footer');
        } else {
            redirect('dashboard');
        }
    }

    public function proses()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $where =
            [
                'email' => trim($email),
            ];

        $cek = $this->m_data->cek_login('pengguna', $where);

        if ($cek->num_rows() > 0) {
            $hasil = $cek->row();
            if (password_verify($pass, $hasil->password)) {
                $this->session->set_userdata('id', $hasil->id);
                $this->session->set_userdata('nama', $hasil->nama);
                $this->session->set_userdata('email', $hasil->email);
                $this->session->set_userdata('hp', $hasil->no_hp);
                $this->session->set_userdata('addr', $hasil->address);
                $this->session->set_userdata('level', $hasil->level);
                $this->session->set_userdata('status', 'hm_log');
                if ($hasil->level == 'penjual' || $hasil->level == 'admin') {
                    $this->session->set_flashdata('info', 'Welcome ' . ucwords($hasil->nama) . ' !');
                    redirect(base_url('dashboard'));
                } else {
                    redirect(base_url('/'));
                }
            } else {
                redirect(base_url('login?alert=gagal'));
            }
        } else {
            redirect(base_url('login?alert=belum_login'));
        }
    }

    public function register_proses()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Username', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('name');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $address = $this->input->post('address');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data =
                [
                    'nama'     => $nama,
                    'email'    => $email,
                    'no_hp'    => $no_hp,
                    'address'  => $address,
                    'password' => $password,
                    'level'    => 'pembeli',
                ];

            $this->m_data->insert_data($data, 'pengguna');

            $nama = $this->input->post('name');
            $cek = $this->m_data->edit_data(['nama' => $nama], 'pengguna')->row();
            $this->session->set_userdata('id', $cek->id);
            $this->session->set_userdata('nama', $cek->nama);
            $this->session->set_userdata('email', $cek->email);
            $this->session->set_userdata('hp', $cek->no_hp);
            $this->session->set_userdata('addr', $cek->address);
            $this->session->set_userdata('level', $cek->level);
            $this->session->set_userdata('status', 'hm_log');
            redirect(base_url('/'));
        } else {
            redirect(base_url() . 'login/welcome?alert=not_registered');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }
}
