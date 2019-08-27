<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'          => $post['name'],
            'gender'        => $post['gender'],
            'phone'         => $post['phone'],
            'address'       => $post['address']
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'          => $post['name'],
            'gender'        => $post['gender'],
            'phone'         => $post['phone'],
            'address'       => $post['address'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }
}

/* End of file Customer_m.php */
