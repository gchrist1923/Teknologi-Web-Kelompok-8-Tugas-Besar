<section class="content-header">
  <h1>
    Tenaga Kesehatan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i> Nakes</a></li>
    <li class="active"><?= ucfirst($page) ?> Nakes</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Nakes</h3>
      <div class="pull-right">
        <a href="<?= site_url('nakes'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-undo"> Kembali</i>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('nakes/proses') ?>" method="POST">
            <div class="form-group">
              <label>NIP Nakes *</label>
              <input class="form-control" value="<?= $row -> nip ?>" type="number" name="nip" required>
            </div>
            <div class="form-group">
              <label>Nama Nakes *</label>
              <input value="<?= $row -> nakes_id ?>" type="hidden" name="id">
              <input class="form-control" value="<?= $row -> name ?>" type="text" name="nama" pattern="[a-z A-Z]+" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin *</label>
              <select name="jk" class="form-control" required>
                <option value="">- Pilih -</option>
                <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki - Laki</option>
                <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No. Telpon *</label>
              <input class="form-control" value="<?= $row -> phone ?>" type="telp" name="no_telpon" pattern="^\d{12}$" required>
            </div>
            <div class="form-group">
              <label>Alamat *</label>
              <textarea class="form-control" name="alamat" required><?= $row -> address ?></textarea>
            </div>
            
            <div class="form-group">
              <button type="submit" name=<?=$page?> class="btn btn-success btn-flat">Simpan</button>
              <button type="reset" class="btn btn-default btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>