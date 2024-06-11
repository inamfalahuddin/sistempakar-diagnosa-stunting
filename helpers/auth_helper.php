<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_login')) {
    function check_login()
    {
        $ci = &get_instance();
        if (!$ci->session->userdata('logged_in')) {
            redirect(base_url('login')); // Redirect ke halaman login jika belum login
        }
    }
}
