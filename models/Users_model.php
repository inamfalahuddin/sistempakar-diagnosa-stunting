<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database(); // Load database pada konstruktur
    }

    // Method untuk mendapatkan semua data users
    public function get_all_users()
    {
        return $this->db->get('tbl_users')->result_array();
    }

    // Method untuk mendapatkan data users berdasarkan kode users
    public function get_users_by_kode($id_users)
    {
        return $this->db->get_where('tbl_users', array('id' => $id_users))->row_array();
    }

    // Method untuk mendapatkan data users berdasarkan username
    public function get_users_by_username($username)
    {
        return $this->db->get_where('tbl_users', array('username' => $username))->row_array();
    }

    // Method untuk menambah data users
    public function tambah_users($data)
    {
        return $this->db->insert('tbl_users', $data);
    }

    // Method untuk mengupdate data users
    public function update_users($id_users, $data)
    {
        $this->db->where('id', $id_users);
        return $this->db->update('tbl_users', $data);
    }

    // Method untuk menghapus data users
    public function hapus_users($id_users)
    {
        $this->db->where('id', $id_users);
        return $this->db->delete('tbl_users');
    }
}
