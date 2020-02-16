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
            if (response.status === 201) {
              $("#message").text('Save Successfully!');
              $("#dataForm")[0].reset();
            } else if (response.status === "failed") {
              console.log(response);
              var html = '<ul>';
              $.each(response.errors, function(i, v) {
                html += '<li>' + v + '</li>';
              });
              html += '</ul>';
              $("#message").html(html);
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