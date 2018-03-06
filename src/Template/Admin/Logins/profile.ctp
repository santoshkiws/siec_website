
   <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <section class="content">
<div class="row" style="center;">
<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Profile setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="" method="post" enctype="multipart/form-data" action="<?= $this->request->webroot ?>admin/logins/profile">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">
                    <img src="<?php echo $this->request->webroot .'img/admin/'. $user['user_image']; ?> "  width="70px" /> 
                  </label>
                        <input type="hidden" name="status" class="form-control" id="status" value="1">
                  <div class="col-sm-5"><?php //pr($user);?>
                    <input type="file" name="user_image" class="" id="user_image" placeholder="">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Profile name</label>
                   <div class="col-sm-5">
                    <input type="text" readonly name="username" class="form-control" id="username" value="<?php echo $user['username'];?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email Id</label>
                   <div class="col-sm-5">
                    <input type="text" readonly name="email" class="form-control" id="email" value="<?php echo $user['email'];?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">First Name</label>
                   <div class="col-sm-5">
                    <input type="text"  name="first_name" class="form-control" id="first_name" value="<?php echo $user['first_name'];?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Last Name</label>
                   <div class="col-sm-5">
                    <input type="text"  name="last_name" class="form-control" id="last_name" value="<?php echo $user['last_name'];?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Old Password</label>
                   <div class="col-sm-5">
                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="User old password">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">New Password</label>
                   <div class="col-sm-5">
                    <input type="password" name="new_password" class="form-control" id="password" placeholder="User passwrod">
                  </div>
                </div>
               
               
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" id="bttn" class="btn btn-info" style="margin-left:470px;">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          
          <!-- /.box -->
        </div>
        </div>
    </section>
    
  
    
    