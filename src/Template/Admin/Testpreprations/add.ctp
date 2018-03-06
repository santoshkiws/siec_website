
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Test Prepration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <!--   <form class="form-horizontal"> -->
            <?php  echo $this->Form->create($testpreprations,['class'=>'form-horizontal','enctype'=>'multipart/form-data']); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                  
                   <?php
                    echo $this->Form->control('name',['label'=>false,'div'=>false,'placeholder'=>'Enter your name','class'=>'form-control','required'=>true]);
                   ?>
                  
                  </div>
                </div>
                
              
                
                
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                  <?php
                   echo $this->Form->control('image',['type'=>'file','label'=>false,'div'=>false,'class'=>'form-control']);
                     ?>
                   
                  </div>
                </div>
                
                
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Test Detail</label>
                  <div class="col-sm-10">
                  
                   <?php
                    echo $this->Form->textarea('message_detail',['id'=>'editor1','label'=>false,'div'=>false,'placeholder'=>'Enter your name','class'=>'form-control','required'=>true]);
                   ?>
                  
                  </div>
                </div>
                
             
                
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                   <select class="form-control" name="status" id="status">
                              <option value="">Select</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                   </select>
                    
                  </div>
                </div>
                
              </div>
              
              
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <?php echo $this->Form->button(__('Save Text'),array('class'=>'btn btn-info pull-right'));?>
                <!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
              </div>
              <!-- /.box-footer -->
              <?php echo $this->Form->end(); ?>
          <!--  </form> --> 
          </div>
          <!-- /.box -->
          
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 


  
    <?= $this->element('adminfooter') ?>
   <script src="<?php echo $this->request->webroot . 'adminlte/bower_components/jquery/dist/jquery.min.js'?>"></script>
   <script src="<?php echo $this->request->webroot . 'js/commanjs/custemdatatable.js'?>"></script>
   

