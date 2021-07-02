<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Interfaces extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('vaksin_m');
    }

    public function index_get()
    {
    	$this->load->view('UI/index.php');
    }

    public function vaksin_get()
    {
    	$nama_vak = $this->get('nama');
        $nik_vak = $this->get('nik');

        $q_nik_vak = $this->db->query("SELECT nama_vak,nik_vak,lokasi_vak,status_vak1,status_vak2 FROM tabel_vaksin WHERE nama_vak = '$nama_vak' AND $nik_vak ='$nik_vak'")->row_array();
        if ($nama_vak === $q_nik_vak['nama_vak']){
        	$this->load->view('UI/Datavaksin.php',$q_nik_vak);
        }else{
        ?>
			<script type="text/javascript">
					alert('Nama atau NIK salah, Silahkan input kembali');
					window.location = "<?= site_url(''); ?>";
				</script>
			<?php
        }
        if ($nik_vak === $q_nik_vak['nik_vak']){
        	
        }else{
        ?>
			<script type="text/javascript">
					alert('Nama atau NIK salah, Silahkan input kembali');
					window.location = "<?= site_url(''); ?>";
				</script>
			<?php
        } 
        $nama_vak = $q_nik_vak['nama_vak'];
        $nik_vak = $q_nik_vak['nik_vak'];
        $lokasi_vak = $q_nik_vak['lokasi_vak'];
        $status_vak1 = $q_nik_vak['status_vak1'];
        $status_vak2 = $q_nik_vak['status_vak2'];  
    }
}
?>