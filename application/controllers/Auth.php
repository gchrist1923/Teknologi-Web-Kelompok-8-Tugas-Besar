<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('ui/index.php');
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			//disini cek user, supplier, customer 
			$user = $this->db->query("SELECT * FROM user")->result();
			if (count($user) == 0) {
				$password = sha1("admin");
				$this->db->query("INSERT INTO user SET
									username = 'admin',
									password = '$password',
									name = 'admin',
									address = '-',
									level = '1'");
			}

			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
?>
				<script type="text/javascript">
					alert('Login Anda Berhasil');
					window.location = "<?= site_url('dashboard'); ?>";
				</script>
			<?php
			} else {
			?>
				<script type="text/javascript">
					alert('Username Atau Password Anda Salah, Silahkan Login Kembali');
					window.location = "<?= site_url('auth'); ?>";
				</script>
<?php
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
