<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tarif extends CI_Model
{
    public function get_all()
    {
        return $this->db->order_by('id_tarif', 'DESC')->get('tarif')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('tarif', $data);
    }

    public function get_by_id($id)
    {
        return $this->db->where('id_tarif', $id)->get('tarif')->row();
    }

    public function update($id, $data)
    {
        return $this->db->where('id_tarif', $id)->update('tarif', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_tarif', $id)->delete('tarif');
    }
}