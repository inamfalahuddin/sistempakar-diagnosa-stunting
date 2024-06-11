<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Method untuk mendapatkan semua data penyakit
    public function get_all_penyakit()
    {
        return $this->db->get('tbl_penyakit')->result_array();
    }

    // Method untuk mendapatkan data penyakit berdasarkan kode penyakit
    public function get_penyakit_by_kode($kode_penyakit)
    {
        return $this->db->get_where('tbl_penyakit', array('id' => $kode_penyakit))->row_array();
    }

    // Method untuk menambah data penyakit
    public function tambah_penyakit($data)
    {
        return $this->db->insert('tbl_penyakit', $data);
    }

    // Method untuk mengupdate data penyakit
    public function update_penyakit($kode_penyakit, $data)
    {
        $this->db->where('id', $kode_penyakit);
        return $this->db->update('tbl_penyakit', $data);
    }

    // Method untuk menghapus data penyakit
    public function hapus_penyakit($kode_penyakit)
    {
        $this->db->where('id', $kode_penyakit);
        return $this->db->delete('tbl_penyakit');
    }
}
