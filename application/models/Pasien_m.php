<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('pasien');
        if ($id != null) {
            $this->db->where('pasien_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nik' => $post['nik'],
            'name' => $post['nama'],
            'gender' => $post['jk'],
            'phone' => $post['no_telpon'],
            'address' => $post['alamat'],
        ];
        $user_id = $this->fungsi->user_login()->name;
        $nik = $post['nik'];
        $name = $post['nama'];
        $gender = $post['jk'];
        $phone = $post['no_telpon'];
        $address = $post['alamat'];

        $this->db->insert('pasien', $params);
        insert_log("Tambah Pasien | NIK : $nik | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender", $user_id);
    }

    public function ubah($post)
    {
        $params = [
            'nik' => $post['nik'],
            'name' => $post['nama'],
            'gender' => $post['jk'],
            'phone' => $post['no_telpon'],
            'address' => $post['alamat'],
            'updated' => date('Y-m-d H:i:s')
        ];

        $user_id = $this->fungsi->user_login()->name;
        $nik = $post['nik'];
        $name = $post['nama'];
        $gender = $post['jk'];
        $phone = $post['no_telpon'];
        $address = $post['alamat'];

        $this->db->where('pasien_id', $post['id']);
        $this->db->update('pasien', $params);

        insert_log("Ubah Pasien | NIK : $nik | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender", $user_id);
    }

    public function hapus($id)
    {
        //DISINI AMBIL DATA PASIEN
        $q_pasien = $this->db->query("SELECT * FROM pasien WHERE pasien_id = '$id'")->result();

        //DEFINISIKAN VARIABEL KOSONG
        $nik = "";
        $name = "";
        $phone = "";
        $address = "";
        $gender = "";
        foreach ($q_pasien as $d_pasien) {
            $nik = $d_pasien->nik;
            $name = $d_pasien->name;
            $phone = $d_pasien->phone;
            $address = $d_pasien->address;
            $gender = $d_pasien->gender;
        }
        $user_id = $this->fungsi->user_login()->name;

        $this->db->where('pasien_id', $id);
        $this->db->delete('pasien');

        insert_log("Hapus Pasien | NIK : $nik | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender", $user_id);
    }
}
