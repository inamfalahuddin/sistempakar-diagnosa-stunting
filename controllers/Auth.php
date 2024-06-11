<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['content'] = $this->load->view('login_view', NULL, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }

    public function login()
    {
        return $this->load->view('auth/login_view');
    }

    public function login_exec()
    {
        $this->load->database(); // Load database pada konstruktur

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login_view');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Users_model->get_users_by_username($username);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'] ?? 'user',
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_userdata('logged_in', true);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username atau Password salah.');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan.');
                redirect('login');
            }
        }
    }

    public function register()
    {
        return $this->load->view('auth/register_view');
    }

    public function register_store()
    {
        $this->load->database(); // Load database pada konstruktur

        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register_view');
        } else {
            $data = [
                'id' => $this->generate_user_id(),
                'nama' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user',
            ];

            $this->Users_model->tambah_users($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('login');
        }
    }


    public function generate_user_id(): string
    {
        $this->db->select('id');
        $this->db->from('tbl_users');
        $query = $this->db->get();
        $user_count = $query->num_rows();

        $new_id_number = $user_count + 1;
        $new_id = sprintf('USR%03d', $new_id_number);

        return $new_id;
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('success', 'Anda telah logout.');
        $this->session->set_userdata('logged_in', false);
        redirect(base_url('login'));
    }
}
