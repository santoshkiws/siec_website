<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php 
              if(!empty($loggedUser['user_image'])){?>
              <img src="<?php echo $this->request->webroot .'img/admin/'. $loggedUser['user_image'];?>" class="user-image" alt="User Image">
            <?php   }?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php 
              if(!empty($loggedUser)){
                  echo ucfirst($loggedUser['username']);
              }?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                 <?php 
              if(!empty($loggedUser['user_image'])){?>
                <img src="<?php echo $this->request->webroot . 'img/admin/'. $loggedUser['user_image'];?>" class="img-circle" alt="User Image">
				<?php }?>

                <p>
                  <?php 
                if(!empty($loggedUser)){
                    echo ucfirst($loggedUser['first_name'])." ".ucfirst($loggedUser['last_name']);
                }
                ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $this->Url->build(["controller" => "Logins", "action" => "profile"]);?>" class="btn btn-default btn-flat">Setting</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $this->Url->build(["controller" => "Logins", "action" => "logout"]);?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
<?php
}
?>
