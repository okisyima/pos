<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        $this->load->model('supplier_m');
    }

    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    public function add()
    {
        $supplier               = new stdClass();
        $supplier->id           = null;
        $supplier->name         = null;
        $supplier->phone        = null;
        $supplier->address      = null;
        $supplier->description  = null;
        $data = [
            'page' => 'add',
            'row'   => $supplier
        ];

        $this->template->load('template', 'supplier/supplier_form', $data);
    }

    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $supplier
            ];
            $this->template->load('template', 'supplier/supplier_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . base_url('supplier') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di tambah')</script>";
        }
        // redirect('user');
        echo "<script>window.location='" . base_url('supplier') . "'</script>";
    }

    public function delete($id)
    {
        $this->supplier_m->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di hapus')</script>";
        }
        // redirect('user');
        echo "<script>window.location='" . base_url('supplier') . "'</script>";
    }
}

/* End of file Supplier.php */
