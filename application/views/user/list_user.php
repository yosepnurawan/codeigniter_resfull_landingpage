<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Tingkat Akses
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div>
                    <a href="<?= base_url(); ?>user/adduser"><button type="button" class="btn btn-primary">Tambah User</button></a>
                </div>
                <?php
                if ($this->session->flashdata('info') == true) {
                    echo $this->session->flashdata('info');
                } else {
                ?>
                    <div>
                        &nbsp;
                    </div>
                <?php
                }
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Username</th>
                        <th>Tingkat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($data_user as $data) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $data->username; ?></td>
                            <td><?= $data->tingkat; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>user/edituser/<?= $data->id_user; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?= base_url(); ?>user/deleteuser/<?= $data->id_user; ?>" onclick="return confirm('Anda Yakin Ingin Hapus Data ?')" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
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