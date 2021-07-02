<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tabel_vaksin');
        if ($id != null) {
            $this->db->where('vaksin_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function ubah($post)
    {
        $params = [
            'nik_vak' => $post['nik_psn'],
            'nama_vak' => $post['nama_psn'],
            'nama_nakes' => $post['nama_nks'],
            'lokasi_vak' => $post['lokasi'],
            'alamat_vak' => $post['alamat_vks'],
            'status_vak1' => $post['status1'],
            'status_vak2' => $post['status2'],
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('vaksin_id', $post['id']);
        $this->db->update('tabel_vaksin', $params);
    }

    public function cari($table, $vaksin_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tabel_vaksin', $vaksin_id);
        $result = $this->db->get()->result();
        return $result;
    }
}
