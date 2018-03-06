<html>
<head>
<style type="text/css">
h3{
  font-family: Calibri; 
  font-size: 25pt;         
  font-style: normal; 
  font-weight: bold; 
  color:SlateBlue;
  text-align: center; 
  text-decoration: underline
}

table{
  font-family: Calibri; 
  color:white; 
  font-size: 11pt; 
  font-style: normal;
  font-weight: bold;
  text-align:; 
  background-color: SlateBlue; 
  border-collapse: collapse; 
  border: 2px solid navy;
  table-layout:auto;
  width:40%;
}
table.inner{
  border: 1px;
}
</style>
<title>Siec Registration Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
 
<body>
<script type="text/javascript">
$(document).ready(function(){ //alert('hi');
	/* $('#inputfile').bind('change', function() {
	    var a=(this.files[0].size);
	   // alert(a);
	    if(a >= 2097152) {
	        alert('File too large. File must be less than 2 megabytes');
	$("#inputfile".val('');
	  };
	});*/
	$("#captha").blur(function(){
       // $(this).css("background-color", "#ffffff");
     var bla = $('#captha').val();
	 var get= <?php  echo $string; ?>
	   if(bla == get){
           alert('currect');
	   }
    
	 });
});
</script>
<h3>SIEC REGISTRATION</h3>

<?php  echo $this->Form->create('null',array('url'=>array('action'=>'check')));?>
<table align="center" cellpadding = "10">
 <!----- First Name ---------------------------------------------------------->
<tr>
<td>NAME</td>
<td><input type="text" name="username" maxlength="30"/>
</td>
</tr>
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="mobile" maxlength="10" />
<input type="hidden" name="users_type" value="2"/>
</td>
</tr>
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID</td>
<td><input type="text" name="email" maxlength="100" /></td>
</tr>
<!----- Gender ----------------------------------------------------------->
<tr>
<td>Type of enquiry</td>
<td>
Study Abroad <input type="radio" name="test_pre_id" value="1" />
Test Preparation <input type="radio" name="test_pre_id" value="2" />
Migration<input type="radio" name="test_pre_id" value="3" />
Visa <input type="radio" name="test_pre_id" value="4" />
</td>
</tr>
<tr><td>Captcha</td>
<td><?php echo "<span style='color:red;'><b/>".$string."</span>";?><input type="text" name="captha" id="captha" size="10"></b></td>
</tr>
 
 
<!----- Country ---------------------------------------------------------->
<tr>
<td>Brach Name</td>
<td>
<select name="branch_id" >
  <option value="">Select branch</option>
  <?php foreach ($masterbranchs as $masterbranch){?>
  <option value="<?php echo $masterbranch['id']; ?>"><?php echo $masterbranch['branch_name']; ?></option>
  <?php }?>
</select>

</tr>
 
<!----- Submit and Reset ------------------------------------------------->

<tr>
<td colspan="2" style="text-align:center;">
<?php //echo $this->Form->button(__('Save')); ?>
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 
<?php   echo $this->Form->end(); ?>
 
</body>
</html>