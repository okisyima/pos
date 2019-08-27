<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_not_login();
        // load template dari library , panggil nama dua nama file view
        $this->template->load('template', 'dashboard');
    }
}

/* End of file Dashboard.php */
