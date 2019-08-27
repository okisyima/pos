<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('user_m');
    }


    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);

        // mengambil name paga submit login
        if (isset($post['login'])) {
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = [
                    'id'    => $row->id,
                    'level' => $row->level
                ];
                $this->session->set_userdata($params);
                echo
                    "<script>
                    alert('Selamat, Kamu Bisa');
                    window.location='" . site_url('dashboard') . "';
                    </script>";
            } else {
                echo
                    "<script>
                    alert('Maaf, Kamu tidak Bisa');
                    window.location='" . site_url('auth/login') . "';
                    </script>";
            }
        }
    }

    public function logout()
    {
        $params = [
            'id',
            'level'
        ];

        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}

/* End of file Auth.php */
