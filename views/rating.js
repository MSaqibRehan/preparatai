$(document).ready(function () {
    $(".rate-btn").on("click", function () {
        $("#doctor_id").val($(this).data("doctor_id"));
        $("#ratingModal").modal("show");
    });

    $(".question-rating i").on("click", function () {
        const rating = $(this).data("rating");
        const question = $(this).parent().data("question");
        $(`#question${question}`).val(rating);
        $(this).parent().find("i").each(function (index) {
            if (index < rating) {
                $(this).removeClass("far").addClass("fas");
            } else {
                
                $(this).removeClass("fas").addClass("far");
            }
        });
    });

    $("#ratingForm").on("submit", function (e) {
        e.preventDefault();
        $(".errormsg").remove();
        let name = $("#input-ciname").val().trim();
        let email = $("#input-ciemail").val().trim();
        let questions = [1, 2, 3, 4, 5];
        let isRatingSelected = true;
        let isCheckboxChecked = $("#reviewterm").prop("checked");

        var valid=true;
        // Check if name and email are not empty
        if (name === "" || email === "") {
            $("#input-ciname").after("<div class='errormsg text-danger'>Name must not be empty.</div>");
            valid=false;
            
        }
        if (name === "") {
            $("#input-ciemail").after("<div class='errormsg text-danger'>Email must not be empty.</div>");
            valid=false;
            
        }

        // Check if all ratings are selected
        questions.forEach(question => {
            let rating = $(`#question${question}`).val();
            if (!rating) {
                isRatingSelected = false;
            }
        });

        if (!isRatingSelected) {
            $(".ratings").after("<div class='errormsg text-danger'>All ratings must be selected.</div>");
            valid=false;
            
        }

        // Check if the checkbox is checked
        if (!isCheckboxChecked) {
            
            $("#reviewterm").after("<div class='errormsg text-danger'>You must agree to the Terms & Services.</div>");
            valid=false;
            
        }

        if(valid){
        $.ajax({
            type: "POST",
            url: "submit_rating.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Thank you',
                        text: "Rating submitted successfully.",
                        icon: 'success',
                        showCancelButton: false,
                        
                      }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                      })


                    
                } else {
                    Swal.fire({
                        title: 'Oops!',
                        text: response.message,
                        icon: 'warning',
                        showConfirmButton: true,
                        timer: 1500
                    })
                    
                }
            },
            error: function () {
                Swal.fire({
                    title: 'Oops!',
                    text: "Error: Could not submit rating.",
                    icon: 'warning',
                    showConfirmButton: true,
                    timer: 1500
                })
                
            },
        });
    }
    });
});