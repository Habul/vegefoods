<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $data['now']   = $this->db->get('produk', 8, 0)->result();
        $data['new']   = $this->db->get('produk', 16, 8)->result();
        $data['total'] = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_index', $data);
        $this->load->view('frontend/v_footer');
    }

    public function shop()
    {
        $perPage                        = 12;

        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }

        $start_index = 0;
        if ($page != 0) {
            $start_index = $perPage * ($page - 1);
        }

        $jumlah_data                    = $this->m_data->get_count_all('produk');
        $config['base_url']             = site_url('shop/');
        $config['total_rows']           = $jumlah_data;
        $config['per_page']             = $perPage;
        $config['enable_query_strings'] = true;
        $config['use_page_numbers']     = true;
        $config['page_query_string']    = true;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string']   = true;
        $config['first_link']           = 'First';
        $config['last_link']            = 'Last';
        $config['next_link']            = 'Next';
        $config['prev_link']            = 'Prev';
        $config['full_tag_open']        = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']       = '</ul></nav></div>';
        $config['num_tag_open']         = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']        = '</span></li>';
        $config['cur_tag_open']         = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']        = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']      = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']      = '</span>Next</li>';
        $config['first_tag_open']       = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']     = '</span></li>';
        $config['last_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']      = '</span></li>';
        $this->pagination->initialize($config);
        $data['page']                   = $page;
        $data['links']                  = $this->pagination->create_links();
        $data['product']                = $this->m_data->get_pagination($config["per_page"], $start_index, 'id desc', 'produk');
        $data['total']                  = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_shop', $data);
        $this->load->view('frontend/v_footer');
    }

    public function shop_detail()
    {
        $id                     = $this->uri->segment(2);
        $data['product_detail'] = $this->m_data->edit_data(['id' => $id], 'produk')->result();
        $data['id_tran']        = $this->db->select_max('id')->get('h_transaksi')->row();
        $data['total']          = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_shop_detail', $data);
        $this->load->view('frontend/v_footer');
    }

    public function shop_search()
    {
        $cari            = $this->input->get('keyword');
        $data['result']  = $this->m_data->search($cari);
        $data['keyword'] = $cari;
        $data['total'] = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_shop_search', $data);
        $this->load->view('frontend/v_footer');
    }

    public function add_cart()
    {
        if ($this->session->userdata('status') != '') {

            $cek = $this->db->where(['id_pengguna' => $this->session->userdata('id'), 'status' => '0'])->get('h_transaksi')->num_rows();
            $cek2 = $this->db->where(['id_pengguna' => $this->session->userdata('id'), 'status' => '1'])->get('h_transaksi')->num_rows();
            $cek3 = $this->db->where(['id_pengguna' => $this->session->userdata('id'), 'status' => '2'])->get('h_transaksi')->num_rows();

            if ($cek == 0 && $cek2 == 0 && $cek3 == 0) {
                $id_produk   = $this->input->post('id_produk');
                $jumlah      = $this->input->post('jumlah');
                $harga       = $this->input->post('harga');
                $id_pengguna = $this->session->userdata('id');
                $id_tran     = $this->input->post('id_tran');

                $data_h =
                    [
                        'id'           => $id_tran + 1,
                        'id_pengguna'  => $id_pengguna,
                        'addtime'      => date('Y-m-d H:m:s'),
                        'alamat'       => $this->session->userdata('addr')
                    ];

                $data_d =
                    [
                        'id_tran' => $id_tran + 1,
                        'id_produk'  => $id_produk,
                        'jumlah'  => $jumlah,
                        'harga'   => $harga * $jumlah
                    ];

                $this->m_data->insert_data($data_h, 'h_transaksi');
                $this->m_data->insert_data($data_d, 'd_transaksi');
                redirect(base_url('shop'));
            } else {

                $cek2 = $this->db->where(['id_pengguna' => $this->session->userdata('id'), 'status' => '1'])->get('h_transaksi')->num_rows();
                $cek3 = $this->db->where(['id_pengguna' => $this->session->userdata('id'), 'status' => '2'])->get('h_transaksi')->num_rows();

                if ($cek2 != 0 || $cek3 != 0) {
                    $id                     = $this->input->post('id_produk');
                    $data['product_detail'] = $this->m_data->edit_data(['id' => $id], 'produk')->result();
                    $data['id_tran']        = $this->db->select_max('id')->get('h_transaksi')->row();
                    $data['total']          = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
                    $this->session->set_flashdata('gagal', 'Please complete the previous transaction !');
                    $this->load->view('frontend/v_header', $data);
                    $this->load->view('frontend/v_shop_detail', $data);
                    $this->load->view('frontend/v_footer');
                } else {
                    $id_produk     = $this->input->post('id_produk');
                    $jumlah      = $this->input->post('jumlah');
                    $harga       = $this->input->post('harga');
                    $id_tran     = $this->input->post('id_tran');

                    $data_d =
                        [
                            'id_tran'   => $id_tran,
                            'id_produk' => $id_produk,
                            'jumlah'    => $jumlah,
                            'harga'     => $harga * $jumlah
                        ];

                    $this->m_data->insert_data($data_d, 'd_transaksi');
                    redirect(base_url('shop'));
                }
            }
        } else {
            redirect(base_url('login?alert=belum_login'));
        }
    }

    public function blog()
    {
        $perPage = 12;

        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }

        $start_index = 0;
        if ($page != 0) {
            $start_index = $perPage * ($page - 1);
        }

        $jumlah_data                    = $this->m_data->get_count_all('blog');
        $config['base_url']             = site_url('blog/');
        $config['total_rows']           = $jumlah_data;
        $config['per_page']             = $perPage;
        $config['enable_query_strings'] = true;
        $config['use_page_numbers']     = true;
        $config['page_query_string']    = true;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string']   = true;
        $config['first_link']           = 'First';
        $config['last_link']            = 'Last';
        $config['next_link']            = 'Next';
        $config['prev_link']            = 'Prev';
        $config['full_tag_open']        = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']       = '</ul></nav></div>';
        $config['num_tag_open']         = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']        = '</span></li>';
        $config['cur_tag_open']         = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']        = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']      = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']      = '</span>Next</li>';
        $config['first_tag_open']       = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']     = '</span></li>';
        $config['last_tag_open']        = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']      = '</span></li>';
        $this->pagination->initialize($config);
        $data['page']                   = $page;
        $data['links']                  = $this->pagination->create_links();
        $data['blog']                   = $this->m_data->get_pagination($config["per_page"], $start_index, 'id desc', 'blog');
        $data['total'] = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_blog', $data);
        $this->load->view('frontend/v_footer');
    }

    public function about()
    {
        $data['total'] = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_about');
        $this->load->view('frontend/v_footer');
    }

    public function cart()
    {
        $data['header']  = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3'])->row();
        $data['cart']    = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3'])->result();
        $data['total']   = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $data['penjual'] = $this->m_data->edit_data(['id' => '2'], 'pengguna')->row();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_cart', $data);
        $this->load->view('frontend/v_footer');
    }

    // public function add_distance()
    // {
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    //     if ($this->form_validation->run() != false) {
    //         $id = $this->input->post('id');
    //         $alamat = $this->input->post('alamat');

    //         $data =
    //             [
    //                 'alamat' => $alamat,
    //             ];

    //         $this->m_data->update_data(['id' => $id], $data, 'h_transaksi');
    //         $this->session->set_flashdata('berhasil', 'Successfully added address !');
    //         redirect(base_url('cart'));
    //     } else {
    //         $this->session->set_flashdata('gagal', 'Failed to add address !');
    //         redirect(base_url('cart'));
    //     }
    // }

    public function history()
    {
        $id = $this->session->userdata('id');
        $data['header']   = $this->m_data->get_index_where('addtime', ['id_pengguna' => $id, 'status' => '3'], 'h_transaksi')->result();
        $data['detail']   = $this->m_data->get_data('d_transaksi')->result();
        $data['pengguna'] = $this->m_data->edit_data(['id' => $id], 'pengguna')->result();
        $data['produk']   = $this->m_data->get_data('produk')->result();
        $data['total']    = $this->m_data->shop('id_detil', ['id_pengguna' => $this->session->userdata('id'), 'status!=' => '3', 'id_produk!=' => '0'])->num_rows();
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_history', $data);
        $this->load->view('frontend/v_footer');
    }

    public function delete($id)
    {
        $this->m_data->delete_data(['id' => $id], 'd_transaksi');
        redirect(base_url('cart'));
    }

    public function checkout($id)
    {
        $this->m_data->update_data(['id' => $id], ['status' => '1'], 'h_transaksi');
        redirect(base_url('cart'));
    }

    public function confrim($id)
    {
        $this->m_data->update_data(['id' => $id], ['status' => '3'], 'h_transaksi');
        redirect(base_url('cart'));
    }

    public function retur()
    {
        $id     = $this->input->post('id');
        $note   = $this->input->post('note');

        $data =
            [
                'note'   => $note,
                'status' => '5'
            ];

        $this->m_data->update_data(['id' => $id], $data, 'h_transaksi');
        redirect(base_url('cart'));
    }

    public function login()
    {
        $this->load->view('frontend/v_header');
        $this->load->view('frontend/v_login');
        $this->load->view('frontend/v_footer');
    }

    public function register()
    {
        $this->load->view('frontend/v_header');
        $this->load->view('frontend/v_register');
        $this->load->view('frontend/v_footer');
    }
}
