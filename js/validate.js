// registration validation 
$(function(){
    $("form[name='register']").validate({
        // Specify validation rules
        rules: {
          username: {
            minlength: 3,
                        maxlength: 30,
                        pattern: "^[a-zA-Z_]*$",
                        required: true
          },
          password: {
            required: true,
            minlength: 6,
          },
          cpassword: {
            required: true,
            minlength: 6,
            equalTo: "#password"
          },
        },
        // Specify validation error messages
        messages: {
            username:{
                minlength: "minimum length 3",
                maxlength: "maximum length 30",
                pattern: "Please Provide Valid Username",
                required: "Please Provide Username",
            },
            password: {
                required: "Please Provide Password",
                minlength: "minimum length 3",
              },
            cpassword: {
                required: "Please Provide Confirm Password",
                minlength: "minimum length 3",
                equalTo: "Confirm Password Should Match Password"
              },
        },
        submitHandler: function(form) {
            alert("submitted")
        }
    })
});

// Login validation 
$(function(){
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
          username: {
            minlength: 3,
                        maxlength: 30,
                        pattern: "^[a-zA-Z_]*$",
                        required: true
          },
          password: {
            required: true,
            minlength: 6
          },
        },
        // Specify validation error messages
        messages: {
            username:{
                minlength: "minimum length 3",
                maxlength: "maximum length 30",
                pattern: "Please Provide Valid Username",
                required: "Please Provide Username",
            },
            password: {
                required: "Please Provide Password",
                minlength: "minimum length 3",
              },
        },
        submitHandler: function(form) {
            alert("submitted")
        }
    })
})