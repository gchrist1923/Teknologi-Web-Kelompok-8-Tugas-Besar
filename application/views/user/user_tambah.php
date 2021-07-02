<section class="content-header">
  <h1>
    Data
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i> User</a></li>
    <li class="active">Tambah User</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Pendaftaran User</h3>
      <div class="pull-right">
        <a href="<?= site_url('user'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-undo"> Kembali</i>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('user/tambah') ?>" method="POST">
            <div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
              <label>Nama Lengkap *</label>
              <input class="form-control" value="<?= set_value('name') ?>" type="text" name="name" pattern="[a-z A-Z]+" required>
              <?= form_error('name') ?>
            </div>
            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
              <label>Username *</label>
              <input class="form-control" value="<?= set_value('username') ?>" type="text" name="username" required>
              <?= form_error('username') ?>
            </div>
            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
              <label>Password *</label>
              <input class="form-control" value="<?= set_value('password') ?>" type="password" name="password" required>
              <?= form_error('password') ?>
            </div>
            <div class="form-group <?= form_error('password2') ? 'has-error' : null ?>">
              <label>Ulangi Password *</label>
              <input class="form-control" type="password" name="password2" required>
              <?= form_error('password2') ?>
            </div>
            <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
              <label>Level *</label>
              <select class="form-control" name="level" required>
                <option value="">- Pilih -</option>
                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Nakes</option>
              </select>
              <?= form_error('level') ?>
            </div>
            <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
              <label>Alamat *</label>
              <textarea class="form-control" type="text" name="alamat" required><?= set_value('alamat') ?></textarea>
              <?= form_error('alamat') ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-flat">Simpan</button>
              <button type="reset" class="btn btn-default btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>