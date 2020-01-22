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
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Tingkat</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($data_tingkat as $data) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $data->tingkat; ?></td>
                            <td><?= $data->keterangan; ?></td>
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