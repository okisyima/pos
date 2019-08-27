<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['row'] = $this->user_m->get();

        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password2', 'Password Confirm', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('level', 'Level', 'required');


        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_data_add');
        } else {
            $post   = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil di simpan')</script>";
            }
            // redirect('user');
            echo "<script>window.location='" . base_url('user') . "'</script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->user_m->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di hapus')</script>";
        }
        // redirect('user');
        echo "<script>window.location='" . base_url('user') . "'</script>";
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check|required');
        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password1', 'Password', 'min_length[3]');
            $this->form_validation->set_rules('password2', 'Password Confirm', 'matches[password1]');
        }
        if ($this->input->post('password2')) {
            $this->form_validation->set_rules('password2', 'Password Confirm', 'matches[password1]');
        }
        $this->form_validation->set_rules('level', 'Level', 'required');


        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');


        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_data_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . base_url('user') . "'</script>";
            }
        } else {
            $post   = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil di simpan')</script>";
            }
            // redirect('user');
            echo "<script>window.location='" . base_url('user') . "'</script>";
        }
    }

    public function username_check($post)
    {
        $post   = $this->input->post(null, TRUE);
        $query  = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id != '$post[id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

/* End of file User.php */
