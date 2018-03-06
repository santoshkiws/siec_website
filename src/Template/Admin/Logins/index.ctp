<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>Siec</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

 <form action="<?= $this->request->webroot ?>admin/logins" method="post">
      <div class="form-group has-feedback">
       <input type="text" class="form-control"  name="username" placeholder="User Name" required>
       <!--   <input type="email" class="form-control" placeholder="Email"> -->
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
      <!-- /.social-auth-links -->
    <!-- <a href="">Login with facebook</a><br/> -->
    <a href="<?php echo $this->request->webroot .'admin/logins/forgotpassword'?>">I forgot my password</a><br>
    <a href="<?php echo $this->request->webroot .'admin/logins/register'?>" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

