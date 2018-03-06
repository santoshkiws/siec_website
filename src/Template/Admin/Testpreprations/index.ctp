
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Testimonials
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/Testpreprations/add'?>"><i class="fa fa-dashboard"></i>Test Preprations Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>

    
     <?php echo $this->Flash->render(); ?>
   <section class="content">
    <div class="box">
            <div class="box-header">
          
              <h3 class="box-title">Test Preprations Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>S.no</th>
                  <th>Name</th>
                   <th>Test Details</th>
                   <th>Image</th>
                   <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <?php if(!empty($testpreprations)){ ?>
                
                <tbody>
                <?php  $i=1;   foreach ($testpreprations as $testprepration){
                    ?>
                <tr>
                <td><?php echo $i; ?></td>
                  <td><?php echo $testprepration['name']; ?></td>
                   <td><?php echo $testprepration['message_detail']; ?></td>
                   <td><img src="<?php echo $this->request->webroot .'img/testpreprations/'. $testprepration['image'];?>" class="user-image" style="height: 50px; width:100px;" alt="blog Image"></td>
                <td> <?php if($testprepration['status']==1){
                      echo "active";
                  }else {
                  echo  "Inactive";
                  }?></td>
                  <td><?php $id = $testprepration['id'] ; ?>
                   <?php // $this->Html->link('<i class="fa fa-eye"></i>    ',['controller' => 'Testimonials','action' => 'view', $testprepration['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'View']); ?>
                   <?= $this->Html->link('<i class="fa fa-edit"></i>    ',['controller' => 'Testpreprations','action' => 'edit', $testprepration['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'Edit']); ?>
                   <?php if($testprepration['status']==1){
				    echo "<a title='Deactivate' href='#' onclick='disable($id)' class='btn btn-sm'><i  class='fa fa-check-circle-o fa-1'></i></a>";?>
                   <?php } else{
					echo "<a title='Activate' href='#' onclick='enable($id)' class='btn btn-sm'><i  class='fa fa-ban'></i></a>";?>
                   <?php }?>
                    <?php 
					echo "<a title='Delete' href='#' onclick='deleteArticle($id)' class='btn btn-sm'><i  class='fa fa-trash-o'></i></a>";?>
					</td>
                </tr>
                 
               <?php $i++;}?>
                </tbody>
                <?php }?>
                <tfoot>
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
                          text: "You want to disable testpreprations",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testpreprations/disable/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
    
    function enable(e1)
                { 
                          swal({
                          title: "Are you sure?",
                          text: "You want to enable testpreprations",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testpreprations/enable/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
    
    
         function deleteArticle(e1)
                { 
                          swal({
                          title: "Are you sure?",
                          text: "You want to delete testpreprations",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#007AFF",
                          confirmButtonText: "Yes, Change It !",
                          closeOnConfirm: false
                        }, function() {
                            window.location = '<?php echo $this->request->webroot;?>admin/testpreprations/delete/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
			
			</script>
