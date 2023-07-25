// Set up tags input, typeahead, and other plugins as needed
$(document).ready(function () {
  // $.ajax({
  //   url: 'fetch_sugestions.php',
  //   type: 'GET',
  //   dataType: 'JSON',
  //   success: function (data) {
  //     // var professions = data;
      
  //     $('#professions').tagsinput({
  //       typeaheadjs: {
  //         name: 'professions',
  //         source: new Bloodhound({
  //           datumTokenizer: Bloodhound.tokenizers.whitespace,
  //           queryTokenizer: Bloodhound.tokenizers.whitespace,
  //           local: data
  //         })
  //       },
  //       maxTags: 5
  //     });
  //   },
  //   error: function() {
  //     alert("Error fetching professions from the database.");
  //   }
  // }); 
  // function initBloodhound(professions) {
  //   return new Bloodhound({
  //     datumTokenizer: Bloodhound.tokenizers.whitespace,
  //     queryTokenizer: Bloodhound.tokenizers.whitespace,
  //     local: professions
  //   });
  // }
  // function initTagsInput(engine) {
  //   $('#professions').tagsinput({
  //     typeaheadjs: [
  //       {
  //         name: 'professions',
  //         source: engine.ttAdapter(),
  //         display: function(item) {
  //           return item;
  //         },
  //         templates: {
  //           suggestion: function(data) {
  //             return '<div class="tt-suggestion tt-selectable">' + data + '</div>';
  //           }
  //         }
  //       }
  //     ],
  //     maxTags: 5
  //   });
  // }
  
  // $.ajax({
  //   url: 'fetch_sugestions.php',
  //   method: 'GET',
  //   dataType: 'json',
  //   success: function (data) {
  //     console.log('Raw data:', data);
      
  //     var professionsBloodhound = initBloodhound(data);
  //     professionsBloodhound.initialize();
  //     initTagsInput(professionsBloodhound);
  //   },
  //   error: function (jqXHR, textStatus, errorThrown) {
  //     console.log('Error:', textStatus, errorThrown);
  //   }
  // });
       
  // $('#professions').tagsinput({
    //   typeaheadjs: {
    //     name: 'professions',
    //     source: new Bloodhound({
    //       datumTokenizer: Bloodhound.tokenizers.whitespace,
    //       queryTokenizer: Bloodhound.tokenizers.whitespace,
    //       local: [] // Add any relevant professions here
    //     })
    //   }, 
    //   maxTags: 5
    // });
  
    // $('#institutions').tagsinput({
    //   typeaheadjs: {
    //     name: 'institutions',
    //     source: new Bloodhound({
    //       datumTokenizer: Bloodhound.tokenizers.whitespace,
    //       queryTokenizer: Bloodhound.tokenizers.whitespace,
    //       local: ['qwert','zxcvbb'] // Add any relevant institutions here
    //     })
    //   },
    //   maxTags: 5
    // });
  
    // Update profile picture preview
    $('#profilePicture').on('change', function (e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          $('#profilePicturePreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });
  
  // Event listener for form submission
  document.getElementById('updateForm').addEventListener('submit', function (e) {
    e.preventDefault();
    $(".errormsg").remove();
var name=$("#name").val();
var professions=$("#professions-input").val();
var institutions=$("#institutions").val();
var Check=true;
  if(name.length<1){
    $("#name").after(`<div class="errormsg text-danger">Please enter your name</div>`)
    Check=false;
  }
  if(professions.length<1){
    $("#professions").after(`<div class="errormsg text-danger">Please enter your professions</div>`)
    Check=false;
  }
  if(institutions.length<1){
    $("#institutions").after(`<div class="errormsg text-danger">Please enter your institutions</div>`)
    Check=false;
  }
  if(Check){
    // Collect form data, including file inputs for profile picture
    const formData = new FormData(e.target);
  
    // AJAX POST request to server-side script (update_profile.php)
    fetch('update_profile.php', {
      method: 'POST',
      body: formData
    })
      .then((response) => response.json())
      .then((data) => {
        // Handle response: display success message or error message
        if (data.success) {
          $('.modal').modal('hide');
            Swal.fire({
                title: 'Success!',
                text: 'Your changes will be reviewed by site administrator.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            
          
        } else {
            Swal.fire({
                title: 'Opps!',
                text: 'An error occurred. Please try again.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 1500
            })
          
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Opps!',
            text: 'An error occurred. Please try again.',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        })
        
      });
    }
  });
  

  $(".update_profileimg").on('click', function() {
    $('#updateProfileImageModal').modal('show');
  });
  
  $("#image-form").on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $("#saveimgbtn").prop("disabled",true);
  
    $.ajax({
      url: 'upload_image.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        var data = JSON.parse(response);
        $("#saveimgbtn").prop("disabled",false);
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: 'Your changes will be reviewed by site administrator.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
          
          $('#updateProfileImageModal').modal('hide');
        } else {
            Swal.fire({
                title: 'Opps!',
                text: 'Failed to upload the image.!',
                icon: 'warning',
                showConfirmButton: false,
                timer: 1500
            })
          
        }
      }
    });
  });
  