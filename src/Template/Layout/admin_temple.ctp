<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html lang="en">
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Siec </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/bower_components/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/bower_components/Ionicons/css/ionicons.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/dist/css/skins/skin-blue.min.css'?>">
  <link rel="stylesheet" href="<?php echo $this->request->webroot. 'adminlte/dist/css/skins/_all-skins.min.css';?>">
  
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'adminlte/bower_components/jvectormap/jquery-jvectormap.css';?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';?>">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $this->request->webroot . 'adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'?>">
  
 
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'css/comman/sweet-alert.css';?>">
  <link rel="stylesheet" href="<?php echo $this->request->webroot.'css/comman/alert.css'?>"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<script>
  //$.widget.bridge('uibutton', $.ui.button);
</script>
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $this->request->webroot . 'admin/logins/dashboard'?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>ice</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Siec</span>
    </a>

    <!-- Header Navbar -->
      <?php echo $this->element('nav-top'); ?>
  </header>
  
  
  <!-- Left side column. contains the logo and sidebar -->
   <?php echo $this->element('aside-main-sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <?php echo $this->fetch('content'); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php echo $this->element('footer'); ?>

  <!-- Control Sidebar -->
   <?php echo $this->element('aside-control-sidebar'); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/jquery/dist/jquery.min.js'?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->request->webroot . 'adminlte/dist/js/adminlte.min.js'?>"></script>

 <!-- DataTables -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
     <!-- CK Editor -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/ckeditor/ckeditor.js'?>"></script>

<!-- swit alert -->
<script src="<?php echo $this->request->webroot . 'js/commanjs/sweet-alert.min.js'?>"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'?>"></script>
<!-- Slimscroll -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo $this->request->webroot . 'adminlte/bower_components/fastclick/lib/fastclick.js'?>"></script>
</body>
</html>