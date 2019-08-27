<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        $this->load->model([
            'item_m',
            'category_m',
            'unit_m'
        ]);
    }

    public function index()
    {
        $data['row'] = $this->item_m->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }

    public function add()
    {
        $item               = new stdClass();
        $item->id_item      = null;
        $item->barcode      = null;
        $item->name         = null;
        $item->price        = null;
        $item->category_id  = null;

        $query_category = $this->category_m->get();
        $query_unit     = $this->unit_m->get();
        $unit[null]     = '- Pilih -';
        foreach ($query_unit->result() as $unt) {
            $unit[$unt->id] = $unt->name;
        }

        $data = [
            'page'      => 'add',
            'row'       => $item,
            'category'  => $query_category,
            'unit'      => $unit, 'selectedunit' => null
        ];

        $this->template->load('template', 'product/item/item_form', $data);
    }

    public function edit($id)
    {
        $query = $this->item_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();

            $query_category     = $this->category_m->get();
            $query_unit         = $this->unit_m->get();
            $unit[null]         = '- Pilih -';
            foreach ($query_unit->result() as $unt) {
                $unit[$unt->id] = $unt->name;
            }

            $data = [
                'page'      => 'edit',
                'row'       => $item,
                'category'  => $query_category,
                'unit'      => $unit, 'selectedunit' => $item->unit_id
            ];

            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . base_url('item') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);

        $config['upload_path']      = './uploads/products/items/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if (isset($_POST['add'])) {
            if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah digunakan");
                redirect('item/add');
            } else {

                if ($_FILES['image']['name'] != null) {

                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->add($post);

                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->add($post);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item_m->check_barcode($post['barcode'], $post['id_item'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah digunakan");
                redirect('item/edit/' . $post['id_item']);
            } else {
                if ($_FILES['image']['name'] != null) {

                    if ($this->upload->do_upload('image')) {

                        $item = $this->item_m->get($post['id_item'])->row();
                        if ($item->image != null) {
                            $target_file = './uploads/products/items/' . $item->image;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->edit($post);

                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->edit($post);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        }
    }

    public function delete($id_item)
    {
        $item = $this->item_m->get($id_item)->row();
        if ($item->image != null) {
            $target_file = './uploads/products/items/' . $item->image;
            unlink($target_file);
        }

        $this->item_m->delete($id_item);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('item');
    }

    public function barcode_qrcode($id_item)
    {
        $data['row'] = $this->item_m->get($id_item)->row();
        $this->template->load('template', 'product/item/barcode_qrcode', $data);
    }
}

/* End of file Item.php */
