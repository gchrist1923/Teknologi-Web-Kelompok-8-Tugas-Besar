<section class="content-header">
  <h1>
    Data
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Users</h3>
      <div class="pull-right">
        <a href="<?= site_url('user/tambah'); ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"> Tambah Data</i>
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width:5%;"><?= $no++ ?></td>
              <td><?= $data->username ?></td>
              <td><?= $data->name ?></td>
              <td><?= $data->address ?></td>
              <td><?= $data->level == 1 ? "Admin" : "Nakes" ?></td>
              <td class="text-center" width="160px">
                <form action="<?= site_url('user/hapus'); ?>" method="POST">
                  <a href="<?= site_url('user/ubah/' . $data->user_id); ?>" class="btn btn-warning btn-xs ">
                    <i class="fa fa-pencil"> Ubah</i>
                  </a>

                  <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                  <button onclick="return confirm('Apakah Data Ini Ingin Dihapus ?')" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"> Hapus</i>
                  </button>
                </form>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>