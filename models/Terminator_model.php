<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terminator_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database pada konstruktur
    }

    // Method untuk mendapatkan semua data terminator
    public function get_all_terminator()
    {
        return $this->db->get('tbl_probabilitas')->result_array();
    }

    // Method untuk mendapatkan data terminator berdasarkan kode terminator
    public function get_terminator_by_kode($kode_terminator)
    {
        return $this->db->get_where('tbl_probabilitas', array('id' => $kode_terminator))->row_array();
    }

    // Method untuk menambah data terminator
    public function tambah_terminator($data)
    {
        return $this->db->insert('tbl_probabilitas', $data);
    }

    // Method untuk mengupdate data terminator
    public function update_terminator($kode_terminator, $data)
    {
        $this->db->where('kode_terminator', $kode_terminator);
        return $this->db->update('tbl_probabilitas', $data);
    }

    // Method untuk menghapus data terminator
    public function hapus_terminator($kode_terminator)
    {
        $this->db->where('kode_terminator', $kode_terminator);
        return $this->db->delete('tbl_probabilitas');
    }

    // Method untuk membuat kode generate baru
    public function generate_terminator_code(): string
    {
        $this->db->select('id');
        $this->db->from('tbl_probabilitas');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $last_terminator_code = $row->id;

            $matches = [];
            preg_match('/([A-Z]+)(\d+)/', $last_terminator_code, $matches); // Pecah kode gejala menjadi huruf dan nomor
            $letter_part = $matches[1]; // Bagian huruf
            $number_part = intval($matches[2]); // Bagian nomor, diubah menjadi integer

            // Tambahkan 1 ke nomor
            $next_terminator_number = $number_part + 1;

            // Format nomor dengan panjang 3 digit dan tambahkan huruf
            $next_terminator_code = $letter_part . str_pad($next_terminator_number, 3, '0', STR_PAD_LEFT);

            return $next_terminator_code;
        } else {
            // Jika tidak ada data, kembalikan kode awal
            return 'KR001'; // Atau kode awal yang sesuai
        }
    }
}
