<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>Siec</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter your register email</p>

 <form action="<?= $this->request->webroot ?>admin/logins/forgotpassword" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">send</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
      <!-- /.social-auth-links -->

    <a href="<?php echo $this->request->webroot .'admin/'?>" class="text-center">login</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

