<?php
$data_login = $this->session->userdata();
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>assets/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $data_login['username']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li><a href="<?= base_url(); ?>home/index"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li><a href="<?= base_url(); ?>about/index"><i class="fa fa-pencil"></i> <span>About Us</span></a></li>
            <?php if ($data_login['id_tingkat'] == "1") : ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gear"></i> <span>User Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url(); ?>user/index"><i class="fa fa-check"></i> List User</a></li>
                        <li><a href="<?= base_url(); ?>user/tingkat"><i class="fa fa-check"></i> Tingkat User</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($data_login['id_tingkat'] == "1" || $data_login['id_tingkat'] == "2") : ?>
                <li><a href="<?= base_url(); ?>blank/index"><i class="fa fa-files-o"></i> <span>Blank Page</span></a></li>
            <?php endif; ?>
            <li><a href="<?= base_url(); ?>pegawai/index"><i class="fa fa-sign-out"></i> <span>Data Api Pegawai</span></a></li>
            <li><a href="<?= base_url(); ?>login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>