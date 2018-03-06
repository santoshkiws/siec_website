<div class="wrapper">
 <?= $this->element('adminheader') ?>
 
  <?= $this->element('aside/leftsidebar') ?>
  <div class="content-wrapper" style="min-height: 482.781px;">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Scholarship
        <small>Control panel</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo $this->request->webroot . 'admin/scholarships/add'?>"><i class="fa fa-dashboard"></i>Scholarship Add</a></li>
        <!-- <li class="active">Dashboard</li>-->
      </ol> 
    </section>

   
   <section class="content">
   <div class="job_inner">
           
            <div class="row">
               <form action="<?php echo $this->request->webroot?>admin/scholarships/" method="post" class="h_form">
                
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="jlocation">Name</label>
                    <input type="text" class="form-control" id="jlocation" value="<?php if(!empty($job_location)){echo $job_location;}; ?>" name='title'>
                   </div>
                </div><!--col-md-3-->
                <div class="col-md-3 text-right">
                  <button type="submit" class="btn sub">Search</button>
                </div><!--col-md-3-->
              </form>
            </div><!--row-->
          </div><!--job_inner-->
          <div class="clearfix"></div>
    <div class="box">
            <div class="box-header">
            <?= $this->Flash->render() ?> 
              <h3 class="box-title">Scholarship</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
          <div class="row">
        <?php if(!empty($job_location)){
          echo "<h2>Search Results:</h2>";
          }
          else
          {
             echo "<h2>All Data:</h2>";
          } 
          ?>
        
      <?php if(!empty($scholarships)){
       $i=1;
       foreach($scholarships as $scholarship){?>
        <div class="search_result">
          <h3><?php //echo $i;?><a  data-toggle="modal" data-target="#viewpopup<?php echo $i;?>"><?php echo $scholarship['title'];?></a></h3>
          
          <div class="search_list">
            <ul>
              <li>title :<span><?php echo $scholarship['title'] ?></span></li>
              <li>message_detail : <span><?php echo $scholarship['message_detail'];?></span></li>
              
            </ul>
           
            <div class="clearfix"></div>
          </div><!--search_list-->
        </div><!--search_result-->
        <?php $i++; }
        }
        else{ ?>
         <div class="booking-item">
              <div class="bookingLeft">
                 No Records found.
              </div>
      </div>
        <?php } ?>
      </div><!--row-->
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
   
   </section>
    <!-- /.content -->
  </div>
   <?= $this->element('adminfooter') ?>
   <?php //= $this->element('aside/sidebar') ?>
</div>


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
			
			</script>
