<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }

    public function add()
    {
        $category               = new stdClass();
        $category->id           = null;
        $category->name         = null;
        $data = [
            'page' => 'add',
            'row'   => $category
        ];

        $this->template->load('template', 'product/category/category_form', $data);
    }

    public function edit($id)
    {
        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $category
            ];
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . base_url('category') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
        }
        redirect('category');
    }

    public function delete($id)
    {
        $this->category_m->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('category');
    }
}

/* End of file Category.php */
