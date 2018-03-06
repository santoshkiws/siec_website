    <!-- Main content -->
    <section class="content">
   
      <div class="row">
       <section class="content-header">
      <h1>
        Add Author
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/authors/add'?>"><i class="fa fa-dashboard"></i>Author Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Author Details</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S.no</th>
                  <th>Name</th>
                  <th>Employee</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 <?php if(!empty($authors)){
                     $i=1;   foreach ($authors as $author){
                    ?>
                <tr>
                <td><?php echo $i; ?></td>
                  <td><?php echo $author['author_name']; ?></td>
                  <td><?php echo $author['employee_name']; ?></td>
                  <td><img src="<?php echo $this->request->webroot .'img/authors/'. $author['image'];?>" class="user-image" style="height: 50px; width:100px;" alt="blog Image"></td>
                  <td><?php if($author['status']==1){
                      echo "active";
                  }else {
                  echo  "Inactive";
                  }?></td>
                  <td><?php $id = $author['id'] ; ?>
                   <?php //= $this->Html->link('<i class="fa fa-eye"></i>    ',['controller' => 'Blogs','action' => 'view', $blog['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'View']); ?>
                   <?= $this->Html->link('<i class="fa fa-edit"></i>    ',['controller' => 'Authors','action' => 'edit', $author['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'Edit']); ?>
                   <?php if($author['status']==1){
				    echo "<a title='Deactivate' href='#' onclick='disable($id)' class='btn btn-sm'><i  class='fa fa-check-circle-o fa-1'></i></a>";?>
                   <?php } else{
					echo "<a title='Activate' href='#' onclick='enable($id)' class='btn btn-sm'><i  class='fa fa-ban'></i></a>";?>
                   <?php }?>
                    <?php 
					echo "<a title='Delete' href='#' onclick='deleteArticle($id)' class='btn btn-sm'><i  class='fa fa-trash-o'></i></a>";?>
					</td>
                </tr>
               <?php $i++;
                     }
                 }
                 ?>
               </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="control-sidebar-bg"></div>
  
<!-- ./wrapper -->
<script src="<?php echo $this->request->webroot . 'js/commanjs/jquery.min.js'?>"></script>
<script src="<?php echo $this->request->webroot . 'js/commanjs/custom.js'?>"></script>
<!-- page script -->
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
                            window.location = '<?php echo $this->request->webroot;?>admin/authors/disable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/authors/enable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/authors/delete/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
			
			</script>
