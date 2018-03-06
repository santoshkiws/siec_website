jQuery.validator.addMethod( 'captchMatch', function(value, element) {
    
    // The two password inputs
    var cap = $("#captchatext");
    var valuess = cap.attr('value');
    var capt = $("#captha").val();
//alert(valuess);
    // Check for equality with the password inputs
    if (valuess != capt ) {
        return false;
    } else {
        return true;
    }

}, "Your Captcha not Match");

// Wait for the DOM to be ready Match
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration" form[name='registration']
  $("#registration").validate({ 
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
     username: "required",
     mobile: "required",
     captha:{
    	 required: true,
    	 captchMatch:true,
     },
	 
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
	  
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
     username: "Please enter your firstname",
     mobile: "Please enter mobile numbers",
     captha:{
    		required: "Please enter captcha",
    		captchMatch:'not match',
     },
	     
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});