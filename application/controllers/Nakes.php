<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nakes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nakes_m');
		check_not_login();
	}

	public function index()
	{
		$data['row'] = $this->nakes_m->get();
		$this->template->load('template', 'nakes/nakes_data', $data);
	}

	public function tambah()
	{
		$nakes = new stdClass();
		$nakes->nakes_id = null;
		$nakes->nip = null;
		$nakes->name = null;
		$nakes->gender = null;
		$nakes->phone = null;
		$nakes->address = null;
		$data = array(
			'page' => 'tambah',
			'row' => $nakes
		);
		$this->template->load('template', 'nakes/nakes_form', $data);
	}

	public function ubah($id)
	{
		$query = $this->nakes_m->get($id);
		if ($query->num_rows() > 0) {
			$nakes = $query->row();
			$data = array(
				'page' => 'ubah',
				'row' => $nakes
			);
			$this->template->load('template', 'nakes/nakes_form', $data);
		} else {
?>
			<script type="text/javascript">
				alert('Data Tidak Ditemukan');
				window.location = "<?= site_url('nakes'); ?>";
			</script>
		<?php
		}
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['tambah'])) {
			//disini cek user

			$this->nakes_m->tambah($post);
		} else if (isset($_POST['ubah'])) {
			$this->nakes_m->ubah($post);
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
			window.location = "<?= site_url('nakes'); ?>";
		</script>
		<?php
	}


	public function hapus($id)
	{
		$this->nakes_m->hapus($id);
		if ($this->db->affected_rows() > 0) {
		?>
			<script type="text/javascript">
				alert('Data Berhasil Dihapus');
			</script>
		<?php
		}
		?>
		<script type="text/javascript">
			window.location = "<?= site_url('nakes'); ?>";
		</script>
<?php
	}
}
