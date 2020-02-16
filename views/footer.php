<script>
  $(document).ready(function() {


    $("#dataForm").validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
      },
      messages: {
        email: {
          required: "Email is requried!",
          email: "Please Enter a Valid E-Mail Address!",
        }
      },
      submitHandler: function() {

        $("#message").text('Loading...');
        var data = $("#dataForm").serialize();
        $.ajax({
          url: '../index.php?page=create',
          type: 'post',
          data: data,
          dataType: 'json',
          success: function(response) {
            $("#dataForm")[0].reset();
            if (response.status === 201) {
              $("#message").text('Save Successfully!');
            } else {
              $("#message").text(response.message);
            }

          },
          complete: function() {
            setTimeout(function() {
              $("#message").text('');
            }, 5000);
          },

        });
        return false;


      }
    });


  });
</script>

</body>

</html>