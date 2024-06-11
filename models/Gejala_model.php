<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database pada konstruktur
    }

    // Method untuk mendapatkan semua data gejala
    public function get_all_gejala()
    {
        return $this->db->get('tbl_gejala')->result_array();
    }

    public function get_all_bobot_diagnosa_pakar()
    {
        // return $this->db->get('tbl_bobot_diagnosa')->result_array();
        $this->db->select('kode_gejala, bobot_gejala');
        $query = $this->db->get('tbl_gejala');

        return $query->result_array();
    }

    // Method untuk mendapatkan data gejala berdasarkan kode gejala
    public function get_gejala_by_kode($kode_gejala)
    {
        return $this->db->get_where('tbl_gejala', array('kode_gejala' => $kode_gejala))->row_array();
    }

    // Method untuk menambah data gejala
    public function tambah_gejala($data)
    {
        return $this->db->insert('tbl_gejala', $data);
    }

    // Method untuk mengupdate data gejala
    public function update_gejala($kode_gejala, $data)
    {
        $this->db->where('kode_gejala', $kode_gejala);
        return $this->db->update('tbl_gejala', $data);
    }

    // Method untuk menghapus data gejala
    public function hapus_gejala($kode_gejala)
    {
        $this->db->where('kode_gejala', $kode_gejala);
        return $this->db->delete('tbl_gejala');
    }

    public function generate_gejala_code(): string
    {
        $this->db->select('kode_gejala');
        $this->db->from('tbl_gejala');
        $this->db->order_by('kode_gejala', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $last_gejala_code = $row->kode_gejala;

            $matches = [];
            preg_match('/([A-Z]+)(\d+)/', $last_gejala_code, $matches); // Pecah kode gejala menjadi huruf dan nomor
            $letter_part = $matches[1]; // Bagian huruf
            $number_part = intval($matches[2]); // Bagian nomor, diubah menjadi integer

            // Tambahkan 1 ke nomor
            $next_gejala_number = $number_part + 1;

            // Gabungkan huruf dan nomor yang baru
            $next_gejala_code = $letter_part . $next_gejala_number;

            return $next_gejala_code;
        } else {
            // Jika tidak ada data, kembalikan kode awal
            return 'G1'; // Atau kode awal yang sesuai
        }
    }
}
