<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tarif extends CI_Model
{
    public function get_all()
    {
        return $this->db->order_by('id_tarif', 'DESC')->get('tarif')->result();
    }
}
