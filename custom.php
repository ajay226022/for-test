  <script type="text/javascript">
      jQuery(document).ready(function() {
          
        //   alert('ok')
              
              jQuery('#insert_form').submit(function(e) {
                // e.preventDefault();
                // console.log("sfdsg");
                //   alert('ok');
                  var link = "<?php echo admin_url('admin-ajax.php') ?>";
                  let formData = new FormData(this);
                //   console.log(formData);
                  formData.append("action", "show_data_forms");
                  jQuery.ajax({
                      url: link,
                      type: "POST",
                      data: formData,
                      processData: false,
                      contentType: false,
                      dataType: 'JSON',
                      success: function(result) {
                          if (result.code === 200) {}
                          console.log("sfdsg");
                      }
                  });
              });
          });
    //   });
  </script>