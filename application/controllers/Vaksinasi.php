<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksinasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('vaksin_m');
		check_not_login();
	}

	public function index()
	{
		$data['row'] = $this->vaksin_m->get();
		$this->template->load('template', 'vaksinasi/vaksin_data', $data);
	}

	public function tambah()
	{
		$data = array(
			'page' => 'tambah'
		);
		$this->template->load('template', 'vaksinasi/vaksin_form', $data);
	}

	public function cari_pasien()
	{
		$nik_psn = filter_input(INPUT_POST, 'nik_psn', FILTER_SANITIZE_STRING);

		$q_nik_psn = $this->db->query("SELECT name FROM pasien WHERE nik = '$nik_psn'")->row_array();
		$nama_psn = $q_nik_psn['name'];

		echo "$nama_psn";
	}

	public function proses()
	{
		$nik_psn          	= ltrim(rtrim(filter_input(INPUT_POST, 'nik_psn', FILTER_SANITIZE_STRING)));
		$nama_psn           = ltrim(rtrim(filter_input(INPUT_POST, 'nama_psn', FILTER_SANITIZE_STRING)));
		$nama_nks           = ltrim(rtrim(filter_input(INPUT_POST, 'nama_nks', FILTER_SANITIZE_STRING)));
		$lokasi    		    = ltrim(rtrim(filter_input(INPUT_POST, 'lokasi', FILTER_SANITIZE_STRING)));
		$alamat_vks         = ltrim(rtrim(filter_input(INPUT_POST, 'alamat_vks', FILTER_SANITIZE_STRING)));
		$status1      		= ltrim(rtrim(filter_input(INPUT_POST, 'status1', FILTER_SANITIZE_STRING)));
		$status2   			= ltrim(rtrim(filter_input(INPUT_POST, 'status2', FILTER_SANITIZE_STRING)));
		$tgl_true           = date("Y-m-d H:i:s");

		$nik_psn        = ltrim(rtrim($nik_psn));
		$nama_psn       = ltrim(rtrim($nama_psn));
		$nama_nks    	= ltrim(rtrim($nama_nks));
		$lokasi 		= ltrim(rtrim($lokasi));
		$alamat_vks    	= ltrim(rtrim($alamat_vks));
		$status1		= ltrim(rtrim($status1));
		$status2		= ltrim(rtrim($status2));

		$this->db->query("INSERT INTO tabel_vaksin SET
                nik_vak   		= '$nik_psn',
                nama_vak   		= '$nama_psn',
				nama_nakes 		= '$nama_nks',
				lokasi_vak 	   	= '$lokasi',
				alamat_vak  	= '$alamat_vks',
				status_vak1     = '$status1',
				status_vak2		= '$status2',
				created 		= '$tgl_true',
				updated 	    = '$tgl_true'");

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function ubah($id)
	{
		$query = $this->vaksin_m->get($id);
		if ($query->num_rows() > 0) {
			$vaksin = $query->row();
			$data = array(
				'page' => 'ubah',
				'row' => $vaksin
			);
			$this->template->load('template', 'vaksinasi/vaksin_ubah', $data);
		} else {
?>
			<script type="text/javascript">
				alert('Data Tidak Ditemukan');
				window.location = "<?= site_url('vaksinasi'); ?>";
			</script>
		<?php
		}
	}

	public function store()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['ubah'])) {
			$this->vaksin_m->ubah($post);
		}
		if ($this->db->affected_rows() > 0) {
		?>
			<script type="text/javascript">
				alert('Data Berhasil Disimpan');
			</script>
		<?php
		}
		?>
		<script type="text/javascript">
			window.location = "<?= site_url('vaksinasi'); ?>";
		</script>
<?php
	}

	public function cari()
	{
		$vaksin   = $_POST['vaksin_id'];

		$data = $this->vaksin_m->cari('tabel_vaksin', $vaksin);

		echo json_encode($data);
	}
}
