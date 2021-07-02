<section class="content-header">
  <h1>
    Form Vaksinasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?= ucfirst($page) ?> Vaksinasi</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Vaksinasi</h3>
      <div class="pull-right">
        <a href="<?= site_url('vaksinasi'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-undo"> Kembali</i>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form role="form" id="frmtbh">
            <div class="form-group">
              <label>NIK Pasien *</label>
              <select class="form-control" id="nik_psn" name="nik_psn">
                <option value="">- Pilih Nik -</option>
                <?php
                $pasien = $this->db->query("SELECT * FROM pasien")->result();
                foreach ($pasien as $data_psn) {
                ?>
                  <option value="<?php echo $data_psn->nik ?>"><?php echo $data_psn->nik ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Pasien *</label>
              <input class="form-control" type="text" name="nama_psn" id="nama_psn" pattern="[a-z A-Z]+" required readonly>
            </div>
            <div class="form-group">
              <label>Nama Nakes *</label>
              <select class="form-control" id="nama_nks" name="nama_nks">
                <option value="">- Pilih Nakes -</option>
                <?php
                $nakes = $this->db->query("SELECT * FROM nakes")->result();
                foreach ($nakes as $data_nks) {
                ?>
                  <option value="<?php echo $data_nks->name ?>"><?php echo $data_nks->name ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Lokasi Vaksin *</label>
              <input class="form-control" type="text" name="lokasi" id="lokasi" pattern="[a-z A-Z]+" required>
            </div>
            <div class="form-group">
              <label>Alamat Vaksinasi *</label>
              <textarea class="form-control" name="alamat_vks" id="alamat_vks" required></textarea>
            </div>
            <div class="form-group">
              <label>Status Vaksinasi 1</label>
              <select class="form-control" id="status1" name="status1">
                <option value="tidak">Belum Vaksinasi</option>
                <option value="aktif">Sudah Vaksinasi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Vaksinasi 2</label>
              <select class="form-control" id="status2" name="status2">
                <option value="tidak">Belum Vaksinasi</option>
                <option value="aktif">Sudah Vaksinasi</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" id="btnsimpan" class="btn btn-success btn-flat">Simpan</button>
              <button type="reset" class="btn btn-default btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$this->load->view('vaksinasi/jquery.php');
?>