<!DOCTYPE html>
<html lang="en" >


<head>
<meta charset="UTF-8">
  <title>Validation</title>
<link  href="<?php echo $this->request->webroot . 'css/style.css'?>" rel="stylesheet"/>
<style>

</style>

</head>
<body>
<div class="container">
  <h2>Siec Registration</h2>
  <!-- <form action="" name="registration"> --><!-- 'url'=>array('action'=>'check'), -->
  <?php  echo $this->Form->create($user,['id'=>'registration']);?>

    <label for="firstname">NAME</label>
    <input type="text" name="username" id="username" placeholder="John">

    <label for="lastname">MOBILE NUMBER</label>
    <input type="text" name="mobile" id="mobile" placeholder="Doe">
    <input type="hidden" name="users_type" value="2"/>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="john@doe.com">
    
     <label for="captha" id="captchatext" value="<?php echo $string; ?>" >Captcha <?php echo "<span style='color:red;'><b/>".$string."</span>";?></label>
   
     <!-- <input type="text" name="captchatext" id="captchatext" value="<?php //echo $string; ?>" size="4" readonly> -->
    <input type="text" name="captha" id="captha" placeholder="Enter the same captcha">

    <label for="password">Type of enquiry</label>
    Study Abroad <input type="radio" name="test_pre_id" value="1" />
	Test Preparation <input type="radio" name="test_pre_id" value="2" />
	Migration<input type="radio" name="test_pre_id" value="3" />
	Visa <input type="radio" name="test_pre_id" value="4" />
	
	
	 <label for="email">Brach Name </label>
	 <select name="branch_id" >
      <option value="">Select branch</option>
      <?php foreach ($masterbranchs as $masterbranch){?>
         <option value="<?php echo $masterbranch['id']; ?>"><?php echo $masterbranch['branch_name']; ?></option>
      <?php }?>
    </select>
    
	
	
	<input type="hidden" name="status" id="status" value="1">

    <!--  <button type="submit">Register</button>--> <input type="submit" value="Submit">
  <?php   echo $this->Form->end(); ?>

</div>

<script src="<?php echo $this->request->webroot . 'js/commanjs/jquery.min.js'?>"></script>
<script src="<?php echo $this->request->webroot . 'js/commanjs/jquery.validate.min.js'?>"></script>
<!--<script src="js/jquery-ui.min.js"></script>-->
<script src="<?php echo $this->request->webroot . 'js/commanjs/index.js'?>"></script>
</body>
</html>