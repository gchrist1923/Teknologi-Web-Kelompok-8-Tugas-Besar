<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nakes_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('nakes');
        if($id != null){
            $this->db->where('nakes_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nip' => $post['nip'],
            'name' => $post['nama'],
            'gender' => $post['jk'],
            'phone' => $post['no_telpon'],
            'address' => $post['alamat'],
        ];
        $user_id = $this->fungsi->user_login()->name;
        $nip = $post['nip'];
        $name = $post['nama'];
        $gender = $post['jk'];
        $phone = $post['no_telpon'];
        $address = $post['alamat'];

        $this->db->insert('nakes', $params);
        insert_log("Tambah Nakes | NIP : $nip | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender" , $user_id);
    }

    public function ubah($post)
    { 
        $params = [
            'nip' => $post['nip'],
            'name' => $post['nama'],
            'gender' => $post['jk'],
            'phone' => $post['no_telpon'],
            'address' => $post['alamat'],
            'updated' => date('Y-m-d H:i:s')
        ];

        $user_id = $this->fungsi->user_login()->name;
        $nip = $post['nip'];
        $name = $post['nama'];
        $gender = $post['jk'];
        $phone = $post['no_telpon'];
        $address = $post['alamat'];

        $this->db->where('nakes_id', $post['id']);
        $this->db->update('nakes', $params);

        insert_log("Ubah Nakes | NIP : $nip | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender" , $user_id);
    }

    public function hapus($id)
	{
        //DISINI AMBIL DATA NAKES
        $q_nakes = $this->db->query("SELECT * FROM nakes WHERE nakes_id = '$id'")->result();

        //DEFINISIKAN VARIABEL KOSONG
        $nip = "";
        $name = "";
        $phone = "";
        $address = "";
        $gender = "";
        foreach($q_nakes as $d_nakes)
        {
            $nip = $d_nakes->nip;
            $name = $d_nakes->name;
            $phone = $d_nakes->phone;
            $address = $d_nakes->address;
            $gender = $d_nakes->gender;
        }
        $user_id = $this->fungsi->user_login()->name;
        
		$this->db->where('nakes_id', $id);
		$this->db->delete('nakes');

        insert_log("Hapus Nakes | NIP : $nip | Nama : $name | No Telpon : $phone | Alamat : $address | Jenis Kelamin : $gender" , $user_id);
    }
}