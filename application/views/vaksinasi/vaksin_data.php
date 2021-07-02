<section class="content-header">
  <h1>
    Vaksinasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Vaksinasi</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Vaksinasi</h3>
      <div class="pull-right">
        <a href="<?= site_url('vaksinasi/tambah'); ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"> Tambah Vaksinasi</i>
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No.</th>
            <th>NIK Pasien</th>
            <th>Nama Pasien</th>
            <th>Lokasi Vaksin</th>
            <th>Alamat Vaksin</th>
            <th>Status 1</th>
            <th>Status 2</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $data) { ?>
            <tr>
              <td style="width:5%;"><?= $no++ ?></td>
              <td><?= $data->nik_vak ?></td>
              <td><?= $data->nama_vak ?></td>
              <td><?= $data->lokasi_vak ?></td>
              <td><?= $data->alamat_vak ?></td>
              <td><?= $data->status_vak1 ?></td>
              <td><?= $data->status_vak2 ?></td>
              <td class="text-center" width="160px">
                <a href="<?= site_url('vaksinasi/ubah/' . $data->vaksin_id); ?>" name="btnubah" id="btnubah" class="btn btn-success btn-xs ">
                  <i class="fa fa-pencil"> Proses</i>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>