<script>
    $(document).ready(function() {
      $('#userTable').DataTable();
      
    if(window.location.hash == "#sign-in"){
      $(".click-button").hide();
      $("#sign-in-form").removeClass("d-none");
    }
    
    if(window.location.hash == "#sign-up"){
      $(".click-button").hide();
      $("#sign-up-form").removeClass("d-none");
    }

    $(".click-button").click(function(){
        var btn = $(this).attr("id");
        $(".click-button").hide();

        if(btn == "sign-in"){
          $("#sign-in-form").removeClass("d-none");
          window.location.hash = "sign-in";
        }

        if(btn == "sign-up"){
          $("#sign-up-form").removeClass("d-none");
          window.location.hash = "sign-up";
        }
    });
    });

    $('.update-btn').on('click', function() {
      console.log("click");
                var firstName = $(this).data('firstname');
                var lastName = $(this).data('lastname');
                var email = $(this).data('email');
                var password = $(this).data('password');
                var userId = $(this).data('userid');
                
                // Populate the modal fields with the current data
                $('#firstname').val(firstName);
                $('#lastname').val(lastName);
                $('#email').val(email);
                $('#password').val(password);
                $('#userid').val(userId);
            });


    $("#sign-in-form-validation").validate({
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email"
                    },
                    password: {
                        required: "Please provide a password"
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form when valid
                }
            });

    $("#sign-up-form-validation").validate({
                rules: {
                    'firstname': {
                        required: true
                    },
                    'lastname': {
                        required: true
                    },
                    'email': {
                        required: true
                    },
                    'password': {
                        required: true
                    }
                },
                messages: {
                    'firstname': {
                        required: "Please enter your first name"
                    },
                    'lastname': {
                        required: "Please enter your last name"
                    },
                    'email': {
                        required: "Please enter your email"
                    },
                    'password': {
                        required: "Please provide a password"
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form when valid
                }
            });
        
  </script>