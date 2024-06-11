<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database pada konstruktur
    }

    // Method untuk mendapatkan semua data diagnosa
    public function get_all_diagnosa()
    {
        return $this->db->get('tbl_diagnosa')->result_array();
    }

    public function get_all_bobot_diagnosa_user($id)
    {
        // return $this->db->get('tbl_bobot_diagnosa')->result_array();
        $this->db->select('id_gejala, bobot')->where('id_diagnosa', $id);
        $query = $this->db->get('tbl_bobot_diagnosa');

        return $query->result_array();
    }

    // Method untuk mendapatkan data diagnosa berdasarkan kode diagnosa
    public function get_diagnosa_by_kode($kode_diagnosa)
    {
        return $this->db->get_where('tbl_diagnosa', array('id' => $kode_diagnosa))->row_array();
    }

    // Method untuk menambah data diagnosa
    public function tambah_diagnosa($data)
    {
        return $this->db->insert('tbl_diagnosa', $data);
    }

    public function tambah_bobot_diagnosa($data)
    {
        return $this->db->insert_batch('tbl_bobot_diagnosa', $data);
    }

    // Method untuk mengupdate data diagnosa
    public function update_diagnosa($kode_diagnosa, $data)
    {
        $this->db->where('id', $kode_diagnosa);
        return $this->db->update('tbl_diagnosa', $data);
    }

    // Method untuk menghapus data diagnosa
    public function hapus_diagnosa($kode_diagnosa)
    {
        $this->db->where('id', $kode_diagnosa);
        return $this->db->delete('tbl_diagnosa');
    }

    public function generate_diagnosa_code(): string
    {
        $this->db->select('id');
        $this->db->from('tbl_diagnosa');
        $query = $this->db->get();
        $user_count = $query->num_rows();

        $new_id_number = $user_count + 1;
        $new_id = sprintf('DIA%03d', $new_id_number);

        return $new_id;
    }

    public function generate_weight_diagnosa_code(): string
    {
        $this->db->select('id');
        $this->db->from('tbl_bobot_diagnosa');
        $query = $this->db->get();
        $user_count = $query->num_rows();

        $new_id_number = $user_count + 1;
        $new_id = sprintf('%03d', $new_id_number);

        return $new_id;
    }
}
