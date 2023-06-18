<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('status') != "hm_log") {
            redirect(base_url('login?alert=belum_login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['new_order'] = $this->m_data->edit_data(['status' => '1'], 'h_transaksi')->num_rows();
        $data['delivery'] = $this->m_data->edit_data(['status' => '2'], 'h_transaksi')->num_rows();
        $data['complete'] = $this->m_data->edit_data(['status' => '3'], 'h_transaksi')->num_rows();
        $data['produk'] = $this->m_data->get_data('produk')->num_rows();
        // $data['total_user'] = $this->m_data->get_data('pengguna')->num_rows();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_index', $data);
        $this->load->view('dashboard/v_footer', $data);
        $this->load->view('dashboard/v_js');
    }

    public function user()
    {
        $data['title'] = 'Users';
        $data['users'] = $this->m_data->get_data('pengguna')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_user', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[pengguna.nama]');
        $this->form_validation->set_rules('email', 'Username', 'required|trim|is_unique[pengguna.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('no_hp', 'Status', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $status = $this->input->post('status');
            $no_hp = $this->input->post('no_hp');

            $data =
                [
                    'nama' => $nama,
                    'email' => $email,
                    'password' => $password,
                    'no_hp' => $no_hp,
                    'level' => $status,
                ];

            $this->m_data->insert_data($data, 'pengguna');
            $this->session->set_flashdata('berhasil', 'Successfully added user ' . ucwords($nama) . ' !');
            redirect(base_url('dashboard/user'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to add user !');
            redirect(base_url('dashboard/user'));
        }
    }

    public function edit_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $status = $this->input->post('status');
            $id = $this->input->post('id');
            $no_hp = $this->input->post('no_hp');

            if ($this->input->post('password') == "") {
                $data =
                    [
                        'nama' => $nama,
                        'email' => $email,
                        'level' => $status,
                        'no_hp' => $no_hp
                    ];
            } else {
                $data =
                    [
                        'nama' => $nama,
                        'email' => $email,
                        'password' => $password,
                        'no_hp' => $no_hp,
                        'level' => $status,
                    ];
            }

            $this->m_data->update_data(['id' => $id], $data, 'pengguna');
            $this->session->set_flashdata('berhasil', 'Successfully edit user ' . ucwords($nama) . ' !');
            redirect(base_url('dashboard/user'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to edit user !');
            redirect(base_url('dashboard/user'));
        }
    }

    public function del_user()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $this->m_data->delete_data(['id' => $id], 'pengguna');
        $this->session->set_flashdata('berhasil', 'Successfully delete user ' . ucwords($nama) . ' !');
        redirect(base_url('dashboard/user'));
    }

    public function new()
    {
        $data['title']  = 'New Orders';
        $data['new']    = $this->m_data->get_index_where('addtime', ['status' => 1], 'h_transaksi')->result();
        $data['detail'] = $this->m_data->get_data('d_transaksi')->result();
        $data['produk'] = $this->m_data->get_data('produk')->result();
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_new', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function pickup()
    {
        $id = $this->input->post('id');
        $this->m_data->update_data(['id' => $id], ['status' => 2], 'h_transaksi');
        $this->session->set_flashdata('berhasil', 'Successfully update to delivery !');
        redirect(base_url('dashboard/new'));
    }

    public function ship()
    {
        $id = $this->input->post('id');
        $distance = $this->input->post('distance');

        $data =
            [
                'id_tran' => $id,
                'id_produk' => '0',
                'harga' => $distance
            ];

        $this->m_data->insert_data($data, 'd_transaksi');
        $this->m_data->update_data(['id' => $id], ['ongkir' => 1], 'h_transaksi');
        $this->session->set_flashdata('berhasil', 'Successfully add shipping cost !');
        redirect(base_url('dashboard/new'));
    }

    public function delivery()
    {
        $data['title'] = 'Delivery Orders';
        $data['delivery'] = $this->m_data->get_index_where('addtime', ['status' => 2], 'h_transaksi')->result();
        $data['detail'] = $this->m_data->get_data('d_transaksi')->result();
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        $data['produk'] = $this->m_data->get_data('produk')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_delivery', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function complete()
    {
        $data['title'] = 'Complete Orders';
        $data['complete'] = $this->m_data->get_index_where('addtime', ['status' => 3], 'h_transaksi')->result();
        $data['detail'] = $this->m_data->get_data('d_transaksi')->result();
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        $data['produk'] = $this->m_data->get_data('produk')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_complete', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function item()
    {
        $data['title'] = 'List Produk';
        $data['produk'] = $this->m_data->get_data('produk')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_item', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function add_item()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() != false) {
            $nama    = $this->input->post('nama');
            $satuan  = $this->input->post('satuan');
            $harga   = $this->input->post('harga');
            $detail  = $this->input->post('detail');

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './assets/imgbeautyhampers/products/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['max_size']      = 2024;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data();
                    $file = $gambar['file_name'];
                }
            }

            if ($this->input->post('image') != " ") {
                $data =
                    [
                        'nama_produk' => $nama,
                        'satuan' => $satuan,
                        'harga' => $harga,
                        'detail' => $detail,
                        'image' => $file
                    ];
            } else {
                $data =
                    [
                        'nama_produk' => $nama,
                        'satuan' => $satuan,
                        'harga' => $harga,
                        'detail' => $detail
                    ];
            }

            $this->m_data->insert_data($data, 'produk');
            $this->session->set_flashdata('berhasil', 'Successfully added ' . ucwords($nama) . ' !');
            redirect(base_url('dashboard/item'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to add produk !');
            redirect(base_url('dashboard/item'));
        }
    }

    public function edit_item()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() != false) {
            $nama   = $this->input->post('nama');
            $satuan = $this->input->post('satuan');
            $harga  = $this->input->post('harga');
            $detail = $this->input->post('detail');
            $id     = $this->input->post('id');

            $data =
                [
                    'nama_produk' => $nama,
                    'satuan' => $satuan,
                    'harga' => $harga,
                    'detail' => $detail
                ];

            $this->m_data->update_data(['id' => $id], $data, 'produk');

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './assets/imgbeautyhampers/products/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['max_size']      = 2024;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data();
                    $file   = $gambar['file_name'];
                    $id     = $this->input->post('id');

                    $data =
                        [
                            'image' => $file
                        ];

                    $this->m_data->update_data(['id' => $id], $data, 'produk');
                }
            }
            $this->session->set_flashdata('berhasil', 'Successfully edit ' . ucwords($nama) . ' !');
            redirect(base_url('dashboard/item'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to edit produk !');
            redirect(base_url('dashboard/item'));
        }
    }

    public function del_item()
    {
        $id    = $this->input->post('id');
        $nama  = $this->input->post('nama');
        $image = $this->input->post('image');
        $this->m_data->delete_data(['id' => $id], 'produk');
        unlink(FCPATH . './assets/imgbeautyhampers/products/' . $image);
        $this->session->set_flashdata('berhasil', 'Successfully delete ' . ucwords($nama) . ' !');
        redirect(base_url('dashboard/item'));
    }

    public function blog()
    {
        $data['title'] = 'Blog';
        $data['blog'] = $this->m_data->get_data('blog')->result();
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_blog', $data);
        $this->load->view('dashboard/v_footer');
        $this->load->view('dashboard/v_js');
    }

    public function add_blog()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');

        if ($this->form_validation->run() != false) {
            $judul  = $this->input->post('judul');
            $detail = $this->input->post('detail');

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './assets/imgbeautyhampers/blog/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['max_size']      = 2024;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data();
                    $file = $gambar['file_name'];
                }
            }

            if ($this->input->post('image') != " ") {
                $data =
                    [
                        'judul' => $judul,
                        'detail' => $detail,
                        'image' => $file
                    ];
            } else {
                $data =
                    [
                        'judul' => $judul,
                        'detail' => $detail,
                    ];
            }

            $this->m_data->insert_data($data, 'blog');
            $this->session->set_flashdata('berhasil', 'Successfully added ' . ucwords($judul) . ' !');
            redirect(base_url('dashboard/blog'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to add produk !');
            redirect(base_url('dashboard/blog'));
        }
    }

    public function edit_blog()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');

        if ($this->form_validation->run() != false) {
            $judul  = $this->input->post('judul');
            $detail = $this->input->post('detail');
            $id     = $this->input->post('id');

            $data =
                [
                    'judul' => $judul,
                    'detail' => $detail
                ];

            $this->m_data->update_data(['id' => $id], $data, 'blog');

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './assets/imgbeautyhampers/blog/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['max_size']      = 2024;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data();
                    $file   = $gambar['file_name'];
                    $id     = $this->input->post('id');

                    $data =
                        [
                            'image' => $file
                        ];

                    $this->m_data->update_data(['id' => $id], $data, 'blog');
                }
            }
            $this->session->set_flashdata('berhasil', 'Successfully edit ' . ucwords($judul) . ' !');
            redirect(base_url('dashboard/blog'));
        } else {
            $this->session->set_flashdata('gagal', 'Failed to edit produk !');
            redirect(base_url('dashboard/blog'));
        }
    }

    public function del_blog()
    {
        $id    = $this->input->post('id');
        $judul = $this->input->post('judul');
        $image = $this->input->post('image');
        $this->m_data->delete_data(['id' => $id], 'blog');
        unlink(FCPATH . './assets/imgbeautyhampers/blog/' . $image);
        $this->session->set_flashdata('berhasil', 'Successfully delete ' . ucwords($judul) . ' !');
        redirect(base_url('dashboard/blog'));
    }
}
