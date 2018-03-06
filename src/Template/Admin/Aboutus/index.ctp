
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Mission/Vision
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/aboutus/add'?>"><i class="fa fa-dashboard"></i>Mission/Vision Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>

   
   <section class="content">
    <div class="box">
            <div class="box-header">
            <?= $this->Flash->render() ?> 
              <h3 class="box-title">Our Mission/Vision</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>S.no</th>
                  <th>Mission Title</th>
                   <th>Vision Title</th>
                   <th>Message Title</th> 
                   <th>Message Detail</th>
                   <th>Image</th>
                   <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <?php if(!empty($aboutus)){?>
                <tbody>
                <?php $i=1;
                    foreach ($aboutus as $about){
                    ?>
                <tr>
                 <td><?php echo $i; ?></td>
                  <td><?php echo $about['mission_title']; ?></td>
                   <td><?php echo $about['vision_title']; ?></td>
                   <td><?php echo $about['message_title']; ?></td>
                    <td><?php echo $about['message_detail']; ?></td>
                   <td><img src="<?php echo $this->request->webroot .'img/aboutus/'. $about['imgaes'];?>" class="user-image" style="height: 50px; width:100px;" alt="blog Image"></td>
                <td> <?php if($about['status']==1){
                      echo "active";
                  }else {
                  echo  "Inactive";
                  }?></td>
                  <td><?php $id = $about['id'] ; ?>
                   <?php //= $this->Html->link('<i class="fa fa-eye"></i>    ',['controller' => 'Blogs','action' => 'view', $blog['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'View']); ?>
                   <?= $this->Html->link('<i class="fa fa-edit"></i>    ',['controller' => 'Aboutus','action' => 'edit', $about['id']],['escape' => false,'class'=>'btn btn-sm','title'=>'Edit']); ?>
                   <?php if($about['status']==1){
				    echo "<a title='Deactivate' href='#' onclick='disable($id)' class='btn btn-sm'><i  class='fa fa-check-circle-o fa-1'></i></a>";?>
                   <?php } else{
					echo "<a title='Activate' href='#' onclick='enable($id)' class='btn btn-sm'><i  class='fa fa-ban'></i></a>";?>
                   <?php }?>
                    <?php 
					echo "<a title='Delete' href='#' onclick='deleteArticle($id)' class='btn btn-sm'><i  class='fa fa-trash-o'></i></a>";?>
					</td>
                </tr>
                 
                 <?php $i++; }?>
                </tbody>
              
              <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   </section>

<script src="<?php echo $this->request->webroot . 'js/commanjs/jquery.min.js'?>"></script>
<script src="<?php echo $this->request->webroot . 'js/commanjs/custom.js'?>"></script>

 <!-- jquery custom -->

<script>
$(document).ready(function(){
	
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
                            window.location = '<?php echo $this->request->webroot;?>admin/aboutus/disable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/aboutus/enable/'+e1;
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
                            window.location = '<?php echo $this->request->webroot;?>admin/aboutus/delete/'+e1;
                                    swal("Redirecting...!");
                        });
                e1.preventDefault  
               }
});
			</script>
