<section class="content-header">
  <h1>
    Data
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i> User</a></li>
    <li class="active">Perbaharui User</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Perbaharui User</h3>
      <div class="pull-right">
        <a href="<?= site_url('user'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-undo"> Kembali</i>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="" method="POST">
            <div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
              <label>Nama Lengkap *</label>
              <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
              <input class="form-control" value="<?= $this->input->post('name') ?? $row->name ?>" type="text" name="name">
              <?= form_error('name') ?>
            </div>
            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
              <label>Username *</label>
              <input class="form-control" value="<?= $this->input->post('username') ?? $row->username ?>" type="text" name="username">
              <?= form_error('username') ?>
            </div>
            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
              <label>Password</label>
              <input class="form-control" value="<?= $this->input->post('password') ?>" type="password" name="password">
              <?= form_error('password') ?>
            </div>
            <div class="form-group <?= form_error('password2') ? 'has-error' : null ?>">
              <label>Ulangi Password</label>
              <input class="form-control" value="<?= $this->input->post('password2') ?>" type="password" name="password2">
              <?= form_error('password2') ?>
            </div>
            <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
              <label>Level *</label>
              <select class="form-control" name="level">
                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                <option value="1">Admin</option>
                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Nakes</option>
              </select>
              <?= form_error('level') ?>
            </div>
            <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
              <label>Alamat *</label>
              <textarea class="form-control" type="text" name="alamat"><?= $this->input->post('alamat') ?? $row->address ?></textarea>
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