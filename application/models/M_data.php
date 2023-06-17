<?php

class M_data extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_index($table, $condition)
    {
        return $this->db->order_by($condition, 'asc')->get($table);
    }

    public function get_index_desc($table, $condition)
    {
        return $this->db->order_by($condition, 'desc')->get($table);
    }

    public function get_index_where($condition, $where, $table)
    {
        return $this->db->order_by($condition, 'desc')->where($where)->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function get_where($where, $table)
    {
        $this->db->select('*');
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get()->result();
    }

    public function shop($order, $where)
    {
        $this->db->select('h.id AS id,id_pengguna,alamat,d.id AS id_detil,nama,status,produk,jumlah,harga');
        $this->db->from('h_transaksi h ');
        $this->db->join('d_transaksi d', 'h.id=d.id_tran', 'inner');
        $this->db->join('pengguna p', 'p.id=h.id_pengguna', 'inner');
        $this->db->where($where);
        $this->db->order_by($order, 'asc');
        return $this->db->get();
    }
}
