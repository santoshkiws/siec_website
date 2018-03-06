<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'user-panel.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<div class="user-panel">
    <div class="pull-left image">
        <?php   if(!empty($loggedUser['user_image'])){?>
          <img src="<?php echo $this->request->webroot . 'img/admin/'. $loggedUser['user_image'];?>" class="img-circle" alt="User Image">
          <?php } ?>
    </div>
    <div class="pull-left info">
        <p><?php if(!empty($loggedUser)){
              echo ucfirst($loggedUser['first_name'])." ".($loggedUser['last_name']);
              }
              ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<?php } ?>
