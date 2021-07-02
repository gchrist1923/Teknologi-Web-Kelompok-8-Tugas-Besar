<section class="content-header">
  <h1>
    Tenaga Kesehatan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Nakes</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Tenaga Kesehatan</h3>
      <div class="pull-right">
        <a href="<?= site_url('nakes/tambah'); ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"> Tambah Nakes</i>
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No. Telpon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach($row->result() as $key => $data){ ?>
          <tr>
            <td style="width:5%;"><?= $no++ ?></td>
            <td><?= $data -> nip ?></td>
            <td><?= $data -> name ?></td>
            <td><?= $data -> gender ?></td>
            <td><?= $data -> phone ?></td>
            <td><?= $data -> address ?></td>
            <td class="text-center" width="160px">
              <a href="<?= site_url('nakes/ubah/'.$data->nakes_id); ?>" class="btn btn-warning btn-xs ">
                <i class="fa fa-pencil"> Ubah</i>
              </a>
              <a href="<?= site_url('nakes/hapus/'.$data->nakes_id); ?>" onclick="return confirm('Apakah Data Ini Ingin Dihapus ?')" class="btn btn-danger btn-xs ">
                <i class="fa fa-trash"> Hapus</i>
              </a>
            </td>
          </tr>
          <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>