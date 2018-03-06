<?php
/*
 * Developer - jai singh
 * Date : 9 march, 2017
 * Project :tdatc
 * File Name : forgetpassword.ctp
 */
?>
<div class="container">
<form class="form-login forgot" method="post">
  <?= $this->Flash->render() ?> 
  <div class="row">
     <div class="col-md-3"> 
        <legend>
           Forgot Password
        </legend>
        <p>
      Enter your e-mail address below to reset your password.
      </p>
          <div class="form-group">
      <span class="input-icon">
      
        <input type="email" class="form-control" placeholder="Email" name="email" required="">
        
    </div>  
      <div class="form-actions">
      
      <button type="submit" class="btn btn-primary pull-right">
        Submit<i class="fa fa-arrow-circle-right"></i>
      </button>
    </div>
      </div>
    </div>  
</form>
</div>