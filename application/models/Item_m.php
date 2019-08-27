<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Item_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('item.*, category.name as categoryName, unit.name as unitName');
        $this->db->from('item');
        $this->db->join('category', 'category.id = item.category_id');
        $this->db->join('unit', 'unit.id = item.unit_id');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $this->db->order_by('barcode', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'barcode'       => $post['barcode'],
            'name'          => $post['name'],
            'category_id'   => $post['category_id'],
            'unit_id'       => $post['unit'],
            'price'         => $post['price'],
            'image'         => $post['image']
        ];

        $this->db->insert('item', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode'       => $post['barcode'],
            'name'          => $post['name'],
            'category_id'   => $post['category_id'],
            'unit_id'       => $post['unit'],
            'price'         => $post['price'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id_item', $post['id_item']);
        $this->db->update('item', $params);
    }

    public function check_barcode($code, $id = null)
    {
        $this->db->from('item');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('id_item !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('item');
    }
}

/* End of file Item_m.php */
