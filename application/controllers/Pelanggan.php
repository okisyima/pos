<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        $this->load->model('customer_m');
    }

    public function index()
    {
        $data['row'] = $this->customer_m->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    public function add()
    {
        $customer               = new stdClass();
        $customer->id           = null;
        $customer->name         = null;
        $customer->gender       = null;
        $customer->phone        = null;
        $customer->address      = null;
        $data = [
            'page' => 'add',
            'row'   => $customer
        ];

        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function edit($id)
    {
        $query = $this->customer_m->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $customer
            ];
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . base_url('customer') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->customer_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di tambah')</script>";
        }
        // redirect('user');
        echo "<script>window.location='" . base_url('customer') . "'</script>";
    }

    public function delete($id)
    {
        $this->customer_m->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di hapus')</script>";
        }
        // redirect('user');
        echo "<script>window.location='" . base_url('customer') . "'</script>";
    }
}

/* End of file Customer.php */
