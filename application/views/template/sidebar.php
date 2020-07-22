  <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('assets/image/') ?>rexita.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Bragas Rexita Ecos F.</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <!-- <li class="header">MAIN NAVIGATION</li> -->
    <li>
      <a href="<?=base_url()?>dashboard">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder-open-o"></i>
        <span>Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" style="background-color: #f4f4f4">
        <li style="margin-left: 10px;"><a href="<?=base_url()?>master/pelanggan"><i class="fa fa-user"></i>Pelanggan</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-money"></i>
        <span>Pembayaran</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" style="background-color: #f4f4f4">
        <li style="margin-left: 10px;"><a href="<?=base_url()?>pembayaran/hotspot"><i class="fa fa-feed"></i>Internet Hotspot</a></li>
      </ul>
    </li>
  </ul>
</section>
<!-- /.sidebar -->