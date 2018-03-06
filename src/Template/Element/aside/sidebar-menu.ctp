<?php use Cake\Core\Configure; ?>
<?php $controller = $this->request->params['controller'];?>
 <?php $action = $this->request->action;?>
<ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview menu-open <?php if(($controller=='Logins' && $action=='dashboard')){echo "active";}?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo $this->request->webroot . 'admin/logins/dashboard'?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
           </ul>
        </li>
      
       
     
       
      <li class="treeview <?php if(($controller=='Scholarships' && $action=='index')){echo "active";}?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Scholarships</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo $this->request->webroot . 'admin/scholarships/'?>"><i class="fa fa-circle-o"></i> News</a></li>
            <!-- <li><a href="<?php //echo $this->request->webroot . 'pages/forms/advanced.html'?>"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="<?php //echo $this->request->webroot . 'pages/forms/editors.html'?>"><i class="fa fa-circle-o"></i> Editors</a></li>  -->
          </ul>
        </li> 
        
        <li class="treeview <?php if(($controller=='Authors' && ($action=='add' || $action=='edit' || $action=='index')) || ($controller=='Blogs' && $action=='index') || ($controller=='Branchs' && $action=='index') || ($controller=='Testimonials' && $action=='index') || ($controller=='Testpreprations' && $action=='index') || ($controller=='Events' && $action=='index')){echo "active";}?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Siec Managements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(($controller=='Authors' && $action=='index') ||($controller=='Authors' && $action=='add') || ($controller=='Authors' && $action=='edit')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/authors/'?>"><i class="fa fa-circle-o"></i>Author</a></li>
             <li class="<?php if(($controller=='Blogs' && $action=='index')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/blogs/'?>"><i class="fa fa-circle-o"></i> Blogs</a></li>
              <li class="<?php if(($controller=='Events' && $action=='index')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/events/'?>"><i class="fa fa-circle-o"></i> Events</a></li>
             <li class="<?php if(($controller=='Testimonials' && $action=='index')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/testimonials/'?>"><i class="fa fa-circle-o"></i> Testimonials</a></li>
             <li class="<?php if(($controller=='Branchs' && $action=='index')){echo "active";}?>" ><a href="<?php echo $this->request->webroot . 'admin/branchs/'?>"><i class="fa fa-circle-o"></i>All Branch</a></li> 
             <li class="<?php if(($controller=='Testpreprations' && $action=='index')){echo "active";}?>" ><a href="<?php echo $this->request->webroot . 'admin/testpreprations/'?>"><i class="fa fa-circle-o"></i>Test Preprations</a></li> 
          </ul>
        </li>
        
         <li class="treeview <?php if(($controller=='Aboutus' && $action=='index') || ($controller=='Aboutus' && $action=='serviceindex')){echo "active";}?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>About Siec</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(($controller=='Aboutus' && $action=='index')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/aboutus'?>"><i class="fa fa-circle-o"></i> Mission/Vision </a></li>
             <li class="<?php if(($controller=='Aboutus' && $action=='serviceindex')){echo "active";}?>"><a href="<?php echo $this->request->webroot . 'admin/aboutus/serviceindex'?>"><i class="fa fa-circle-o"></i> Our Services</a></li>
            <!--<li><a href="<?php //echo $this->request->webroot . 'pages/forms/editors.html'?>"><i class="fa fa-circle-o"></i> Editors</a></li> -->
          </ul>
        </li>
        
        <!--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>