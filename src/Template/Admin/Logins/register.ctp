<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="register-box register-page">
  <div class="register-logo">
    <a href="#"><b>Admin</b>Siec</a>
  </div>
  
   <div class="register-box-body">
    <p class="login-box-msg">Register a new admin</p>
    <?= $this->Form->create($user) ?>
     <div class="form-group has-feedback">
        <?php
        echo $this->Form->control('username',['label'=>false,'div'=>false,'placeholder'=>'Username','class'=>'form-control','required'=>true]);
            ?>
             <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            
             <div class="form-group has-feedback">
             <?php
             echo $this->Form->control('email',['type'=>'email','label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'form-control','required'=>true]);
            ?>
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            
            
             <div class="form-group has-feedback">
             <?php
             echo $this->Form->control('mobile',['label'=>false,'div'=>false,'placeholder'=>'Mobile number','class'=>'form-control','required'=>true]);
            ?>
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
              <div class="form-group has-feedback">
             <?php
             echo $this->Form->control('password',['label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control','required'=>true]);
            ?>
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <?php //echo $this->Form->control('crdt');?>
            <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label class="">
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
         <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-block btn-flat']) ?>
          
        </div>
        <!-- /.col -->
      </div>
   
    <?= $this->Form->end() ?>
<a href="<?php echo $this->request->webroot .'admin'?>" class="text-center">I already have a membership</a>
  </div>

</div>
