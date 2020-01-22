<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page List Pegawai
            <small>Halaman ini bisa CRUDS menggunakan API pada insomnia/postman</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">List</a></li>
            <li class="active">Pegawai</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>ID Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Photo</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($data_pegawai as $data) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $data->id_pegawai; ?></td>
                            <td><?= $data->nama_pegawai; ?></td>
                            <td><?= $data->jabatan; ?></td>
                            <?php if (empty($data->photo)) : ?>
                                <td>Tidak Ada Foto</td>
                            <?php else : ?>
                                <td><img src="<?= base_url(); ?>resources/foto/<?= $data->photo; ?>" width="100px" height="100px"></td>
                            <?php endif ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->