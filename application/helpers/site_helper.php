<?php
if(!function_exists('insert_log')){
    function insert_log($keterangan , $name){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_true = date("Y-m-d H:i:s");
        $ci =& get_instance();
        $user_session = $ci->session->userdata('userid');
        $ci->db->query("INSERT INTO log SET keterangan = '$keterangan', created_by = '$name', created= '$tgl_true'");
    }
}