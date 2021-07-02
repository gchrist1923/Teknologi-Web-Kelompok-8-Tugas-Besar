<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $user_id = $this->fungsi->user_login()->name;
        $name = $post['name'];
        $username = $post['username'];
        $alamat = $post['alamat'];
        $level = $post['level'];

        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['alamat'];
        $params['level'] = $post['level'];

        $this->db->insert('user', $params);
        insert_log("Tambah User | Nama : $name | Username : $username | Alamat : $alamat | Level : $level", $user_id);
    }

    public function ubah($post)
    {
        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['alamat'];
        $params['level'] = $post['level'];

        $user_id = $this->fungsi->user_login()->name;
        $name = $post['name'];
        $username = $post['username'];
        $alamat = $post['alamat'];
        $level = $post['level'];

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
        insert_log("Ubah User | Nama : $name | Username : $username | Alamat : $alamat | Level : $level", $user_id);
    }

    public function hapus($id)
    {
        //DISINI AMBIL DATA BARANG
        $q_user = $this->db->query("SELECT * FROM user WHERE user_id = '$id'")->result();

        //defenisikan variabel kosong
        $name = "";
        $username = "";
        $address = "";
        $level = "";
        foreach ($q_user as $d_user) {
            $name = $d_user->name;
            $username = $d_user->username;
            $address = $d_user->address;
            $level = $d_user->level;
        }
        $user_id = $this->fungsi->user_login()->name;
        insert_log("Hapus User | Nama : $name | Username : $username | Alamat : $address | Level : $level", $user_id);
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
