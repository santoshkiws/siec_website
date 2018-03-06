
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
              <h3 class="box-title">Add Aestimonial</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <!--   <form class="form-horizontal"> -->
            <?php  echo $this->Form->create($testimonials,['class'=>'form-horizontal','enctype'=>'multipart/form-data']); ?>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">University Name</label>
                  <div class="col-sm-10">
                  
                   <?php
                    echo $this->Form->control('university_name',['label'=>false,'div'=>false,'placeholder'=>'Enter your employee','class'=>'form-control','required'=>true]);
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Testimonials Detail</label>
                  <div class="col-sm-10">
                  
                   <?php
                    echo $this->Form->textarea('detail',['label'=>false,'div'=>false,'placeholder'=>'Enter your name','class'=>'form-control','required'=>true]);
                   ?>
                  
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Country Name</label>
                  <div class="col-sm-10">
                   <select class="form-control" name="country_id" id="country_id">
                              <option value="">Select Country</option>
                              <?php foreach ($countries as $countrie){?>
                              <option value="<?php echo $countrie['id']; ?>"><?php echo $countrie['countries_name']; ?></option>
                              <?php }?>
                   </select>
                    
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
                <?php echo $this->Form->button(__('Save Blog'),array('class'=>'btn btn-info pull-right'));?>
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
 
