
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Testimonials
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/Testimonials/add'?>"><i class="fa fa-dashboard"></i>Testimonials Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>

    
     <?php echo $this->Flash->render(); ?>
   <section class="content">
    <div class="box">
            <div class="box-header">
          
              <h3 class="box-title">Testimonials Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>S.no</th>
                  <th>Name</th>
                   <th>University Name</th>
                   <th>Image</th>
                   <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <?php if(!empty($testimonials)){ ?>
                 
                <tbody>
                <?php $i=1; 
                foreach ($testimonials as $testimonial){
                    ?>
                <tr>
                <td><?php echo $i; ?></td>
                  <td><?php echo $testimonial['name']; ?></td>
                   <td><?php echo $testimonial['university_name']; ?></td>
                   <td><img src="<?php echo $this->request->webroot .'img/testimonials/'. $testimonial['image'];?>" class="user-image" style="height: 50px; width:100px;" alt="blog Image"></td>
                <td> <?php if($testimonial['status']==1){
                      echo "active";
                  }else {
                  echo  "Inactive";
                  }?></td>
                  <td><?php $id = $testimonial['id'] ; ?>
                   <?= $this->Html->link('<i class="fa fa-eye"></i>    ',['controller' => 'Testimonials','action' => 'view', $testimonial['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'View']); ?>
                   <?= $this->Html->link('<i class="fa fa-edit"></i>    ',['controller' => 'Testimonials','action' => 'edit', $testimonial['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'Edit']); ?>
                   <?php if($testimonial['status']==1){
				    echo "<a title='Deactivate' href='#' onclick='disable($id)' class='btn btn-sm'><i  class='fa fa-check-circle-o fa-1'></i></a>";?>
                   <?php } else{
					echo "<a title='Activate' href='#' onclick='enable($id)' class='btn btn-sm'><i  class='fa fa-ban'></i></a>";?>
                   <?php }?>
                    <?php 
					echo "<a title='Delete' href='#' onclick='deleteArticle($id)' class='btn btn-sm'><i  class='fa fa-trash-o'></i></a>";?>
					</td>
                </tr>
                 <?php $i++;} ?>
               
                </tbody>
                <?php }?>
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
   
   </section>
    <!-- /.content -->
  

<script src="<?php echo $this->request->webroot . 'js/commanjs/jquery.min.js'?>"></script>
<script src="<?php echo $this->request->webroot . 'js/commanjs/custom.js'?>"></script>
 <!-- jquery custom -->

<script>

			function disable(e1)
                { 
                          swal({
                          title: "Are you sure?",
                          text: "You want to disable Blog",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testimonial/disable/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
    
    function enable(e1)
                { 
                          swal({
                          title: "Are you sure?",
                          text: "You want to enable Blog",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testimonial/enable/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
    
    
         function deleteArticle(e1)
                { 
                          swal({
                          title: "Are you sure?",
                          text: "You want to delete Blog",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testimonial/delete/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
			
			</script>
