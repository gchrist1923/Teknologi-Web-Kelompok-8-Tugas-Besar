<section class="content-header">
    <h1>
        Vaksinasi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Vaksinasi</a></li>
        <li class="active">Proses Vaksinasi</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Vaksinasi</h3>
            <div class="pull-right">
                <a href="<?= site_url('vaksinasi'); ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('vaksinasi/store') ?>" method="POST" role="form" id="frmubh">
                        <div class="form-group">
                            <label>NIK Pasien *</label>
                            <input value="<?= $row->vaksin_id ?>" type="hidden" name="id">
                            <input class="form-control" type="text" value="<?= $row->nik_vak ?>" name="nik_psn" id="nik_psn" pattern="[a-z A-Z]+" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Pasien *</label>
                            <input class="form-control" type="text" value="<?= $row->nama_vak ?>" name="nama_psn" id="nama_psn" pattern="[a-z A-Z]+" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Nakes *</label>
                            <input class="form-control" type="text" value="<?= $row->nama_nakes ?>" name="nama_nks" id="nama_nks" pattern="[a-z A-Z]+" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Lokasi Vaksin *</label>
                            <input class="form-control" type="text" value="<?= $row->lokasi_vak ?>" name="lokasi" id="lokasi" pattern="[a-z A-Z]+" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat Vaksinasi *</label>
                            <input class="form-control" type="text" value="<?= $row->alamat_vak ?>" name="alamat_vks" id="alamat_vks" pattern="[a-z A-Z]+" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Status Vaksinasi 1</label>
                            <select class="form-control" id="status1" name="status1">
                                <option value="tidak" <?= $row->status_vak1 == 'tidak' ? 'selected' : '' ?>>Belum Vaksinasi</option>
                                <option value="aktif" <?= $row->status_vak1 == 'aktif' ? 'selected' : '' ?>>Sudah Vaksinasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status Vaksinasi 2</label>
                            <select class="form-control" id="status2" name="status2">
                                <option value="tidak" <?= $row->status_vak2 == 'tidak' ? 'selected' : '' ?>>Belum Vaksinasi</option>
                                <option value="aktif" <?= $row->status_vak2 == 'aktif' ? 'selected' : '' ?>>Sudah Vaksinasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btnsave" name=<?= $page ?> class="btn btn-success btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-default btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>