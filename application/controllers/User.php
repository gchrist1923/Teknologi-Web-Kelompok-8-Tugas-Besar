<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('form_validation');
		check_not_login();
		check_admin();
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function tambah()
	{
		//default peringatan
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules(
			'password2',
			'Konfirmasi Password',
			'required|matches[password]',
			array('matches' => 'Password Tidak Sesuai, Silahkan %s Kembali.')
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Jabatan', 'required');
		//peringatan eror form
		$this->form_validation->set_message('required', 'Silahkan Isi %s Terlebih Dahulu.');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter.');
		$this->form_validation->set_message('is_unique', '{field} Ini Sudah Terpakai.');
		//tulisan peringata eror form merah
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_tambah');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->tambah($post);
			if ($this->db->affected_rows() > 0) {
?>
				<script type="text/javascript">
					alert('Data Berhasil Disimpan');
				</script>
			<?php
			}
			?>
			<script type="text/javascript">
				window.location = "<?= site_url('user'); ?>";
			</script>
			<?php
		}
	}

	public function ubah($id)
	{
		//default peringatan
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules(
				'password2',
				'Konfirmasi Password',
				'matches[password]',
				array('matches' => 'Password Tidak Sesuai, Silahkan %s Kembali.')
			);
		}
		if ($this->input->post('password2')) {
			$this->form_validation->set_rules(
				'password2',
				'Konfirmasi Password',
				'matches[password]',
				array('matches' => 'Password Tidak Sesuai, Silahkan %s Kembali.')
			);
		}
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Jabatan', 'required');
		//peringatan eror form
		$this->form_validation->set_message('required', 'Silahkan Isi %s Terlebih Dahulu.');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter.');
		$this->form_validation->set_message('is_unique', '{field} Ini Sudah Terpakai.');
		//tulisan peringata eror form merah
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_ubah', $data);
			} else {
			?>
				<script type="text/javascript">
					alert('Data Tidak Ditemukan');
					window.location = "<?= site_url('user'); ?>";
				</script>
			<?php
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->ubah($post);
			if ($this->db->affected_rows() > 0) {
			?>
				<script type="text/javascript">
					alert('Data Berhasil Diubah');
				</script>
			<?php
			}
			?>
			<script type="text/javascript">
				window.location = "<?= site_url('user'); ?>";
			</script>
		<?php
		}
	}

	public function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} Ini Sudah DIpakai, Silahkan Tentukan Kembali.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function hapus()
	{
		$id = $this->input->post('user_id');
		$this->user_m->hapus($id);

		if ($this->db->affected_rows() > 0) {
		?>
			<script type="text/javascript">
				alert('Data Berhasil Dihapus');
			</script>
		<?php
		}
		?>
		<script type="text/javascript">
			window.location = "<?= site_url('user'); ?>";
		</script>
<?php
	}
}
