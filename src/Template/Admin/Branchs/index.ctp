
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Branch
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/branchs/add'?>"><i class="fa fa-dashboard"></i>Branch Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>

   
   <section class="content">
    <div class="box">
            <div class="box-header">
            <?= $this->Flash->render() ?> 
              <h3 class="box-title">Branchs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>S.No</th>
                  <th>Branch Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <?php if(!empty($branchs)){?>
                <tbody>
                   <?php $i=1;  foreach ($branchs as $branch){ ?>
                                  
                <tr>
                <td><?php echo $i; ?></td>
                  <td><?php echo $branch['branch_name']; ?></td>
                   
                <td> <?php if($branch['status']==1){
                      echo "active";
                  }else {
                  echo  "Inactive";
                  }?></td>
                  <td><?php $id = $branch['id'] ; ?>
                   <?php //= $this->Html->link('<i class="fa fa-eye"></i>    ',['controller' => 'Blogs','action' => 'view', $blog['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'View']); ?>
                   <?= $this->Html->link('<i class="fa fa-edit"></i>    ',['controller' => 'Branchs','action' => 'edit', $branch['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'Edit']); ?>
                   <?php if($branch['status']==1){
				    echo "<a title='Deactivate' href='#' onclick='disable($id)' class='btn btn-sm'><i  class='fa fa-check-circle-o fa-1'></i></a>";?>
                   <?php } else{
					echo "<a title='Activate' href='#' onclick='enable($id)' class='btn btn-sm'><i  class='fa fa-ban'></i></a>";?>
                   <?php }?>
                    <?php 
					echo "<a title='Delete' href='#' onclick='deleteArticle($id)' class='btn btn-sm'><i  class='fa fa-trash-o'></i></a>";?>
					</td>
                </tr>
                 <?php $i++; } ?>
               
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
                            window.location = '<?php echo $this->request->webroot;?>admin/branchs/disable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/branchs/enable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/branchs/delete/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
			
			</script>
