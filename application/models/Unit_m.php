<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('unit');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'  => $post['name']
        ];

        $this->db->insert('unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'  => $post['name']
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('unit', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unit');
    }
}

/* End of file Unit_m.php */
