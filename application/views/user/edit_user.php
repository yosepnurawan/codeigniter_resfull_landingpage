<?php
foreach ($detail_user as $data) {
    $id_user     = $data->id_user;
    $username     = $data->username;
    $id_tingkat   = $data->id_tingkat;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit User
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Edit User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <!-- form start -->
            <form role="form" action="<?= base_url() ?>user/edituser/<?= $id_user; ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tingkat</label>
                        <select id="tingkat_user" name="tingkat_user" class="form-control">
                            <?php
                            foreach ($data_tingkat as $data) {
                                $slc_tingkat = ($data->id_tingkat == $id_tingkat) ? 'selected' : '';
                            ?>
                                <option value="<?= $data->id_tingkat; ?>"<?= $slc_tingkat; ?>><?= $data->tingkat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url(); ?>user"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->