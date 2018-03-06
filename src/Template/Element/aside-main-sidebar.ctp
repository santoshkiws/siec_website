<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside-main-sidebar.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
     <?php echo $this->element('aside/user-panel'); ?>

      <!-- search form (Optional) -->
      
       <?php echo $this->element('aside/form'); ?>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
    
      
      <?php echo $this->element('aside/sidebar-menu'); ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
<?php } ?>
