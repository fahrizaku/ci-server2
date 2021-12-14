<?php

class Buku_model extends CI_Model
{
    public function getBuku($id = null)
    {
        if ($id === null) {
            return $this->db->get('buku')->result_array();
        } else {
            return $this->db->get_where('buku', ['id' => $id])->result_array();
        }
    }

    public function deleteBuku($id)
    {
        $this->db->delete('buku', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createBuku($data)
    {
        $this->db->insert('buku',$data);
        return $this->db->affected_rows();

    }

    public function updateBuku($data, $id)
    {
        $this->db->update('buku', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

}