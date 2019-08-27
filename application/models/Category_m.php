<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('category');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'          => $post['name']
        ];

        $this->db->insert('category', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'          => $post['name'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('category', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
    }
}

/* End of file Category_m.php */
