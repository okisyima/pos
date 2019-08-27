<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name']      = $post['name'];
        $params['username']  = $post['username'];
        $params['password']  = sha1($post['password1']);
        $params['address']   = $post['address'] != "" ? $post['address'] : null;
        $params['level']     = $post['level'];

        $this->db->insert('user', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function edit($post)
    {
        $params['name']      = $post['name'];
        $params['username']  = $post['username'];
        if (!empty($post['password1'])) {
            $params['password']  = sha1($post['password1']);
        }
        $params['address']   = $post['address'] != "" ? $post['address'] : null;
        $params['level']     = $post['level'];

        $this->db->where('id', $post['id']);
        $this->db->update('user', $params);
    }
}

/* End of file User_m.php */
