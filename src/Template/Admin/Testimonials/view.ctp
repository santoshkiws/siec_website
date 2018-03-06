
  
 <section class="content-header">
      <h1>
       Testimonial details
        <small>it all starts here</small>
      </h1>
     <ol class="breadcrumb">
    <li><a href="<?php echo $this->request->webroot . 'admin/Testimonials/'?>"><i class="fa fa-dashboard"></i> Back</a></li>
            <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol> 
    </section>
    
    <section class="content">

      <!-- Default box -->
      
       <div class="box-body">
          
      <div class="box">
        <div class="box-header with-border text-center">
          <h3 class="box-title"><b><?php echo $testimonials['name'];?></b></h3>
             <div class="container">
             <?php if(!empty($testimonials['image'])){?>
                 <img src="<?php echo $this->request->webroot .'img/testimonials/'. $testimonials['image'];?>" class="img-fluid rounded-circle" width="304" height="236" alt="testimonials"> <br/>        
                 <?php } ?>
                 
                 <b> Message:</b>     <span class="text-center"><?php echo $testimonials['detail']; ?>.</span><br/>
                 <b>Country:</b>      <span class="text-center"><?php echo $testimonials['country']['countries_name']; ?></span><br/>
                 <b>University:</b>   <span class="text-center"><?php echo $testimonials['university_name']; ?></span><br/>
                 <b>Status:</b>      <span class="text-center"><?php if($testimonials['status']==1){ echo "Active";}else{echo "Inactive";}?></span><br/>
              </div>
        </div>
       
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
     
        </div>

    </section>
    
   