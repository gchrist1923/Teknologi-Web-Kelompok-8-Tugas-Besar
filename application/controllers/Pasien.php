<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_m');
		check_not_login();
	}

	public function index()
	{
		$data['row'] = $this->pasien_m->get();
		$this->template->load('template', 'pasien/pasien_data', $data);
	}

	public function tambah()
	{
		$pasien = new stdClass();
		$pasien->pasien_id = null;
		$pasien->nik = null;
		$pasien->name = null;
		$pasien->gender = null;
		$pasien->phone = null;
		$pasien->address = null;
		$data = array(
			'page' => 'tambah',
			'row' => $pasien
		);
		$this->template->load('template', 'pasien/pasien_form', $data);
	}

	public function ubah($id)
	{
		$query = $this->pasien_m->get($id);
		if ($query->num_rows() > 0) {
			$pasien = $query->row();
			$data = array(
				'page' => 'ubah',
				'row' => $pasien
			);
			$this->template->load('template', 'pasien/pasien_form', $data);
		} else {
?>
			<script type="text/javascript">
				alert('Data Tidak Ditemukan');
				window.location = "<?= site_url('pasien'); ?>";
			</script>
		<?php
		}
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['tambah'])) {
			//disini cek user

			$this->pasien_m->tambah($post);
		} else if (isset($_POST['ubah'])) {
			$this->pasien_m->ubah($post);
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
			window.location = "<?= site_url('pasien'); ?>";
		</script>
		<?php
	}


	public function hapus($id)
	{
		$this->pasien_m->hapus($id);
		if ($this->db->affected_rows() > 0) {
		?>
			<script type="text/javascript">
				alert('Data Berhasil Dihapus');
			</script>
		<?php
		}
		?>
		<script type="text/javascript">
			window.location = "<?= site_url('pasien'); ?>";
		</script>
<?php
	}
}
