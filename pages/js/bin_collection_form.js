$(function() {
    $(".nav-link-bincollectionform").addClass("active");
    // let view_transaction = "";
    // let frm_action = "";
    // let frm_action_id ="";


    // frm_action ="add";

    $('form#frm_1').validate({
        rules: {
            txt_date: {
                required: true,
                date: true

            },
            txt_floor  :{
                required: true,
            },
            txt_area: {
                required: true,
            },
            txt_status : {
                required: true,
            }


        },
        messages: {
            txt_date: {
                required    : "Date is Required.",
                date : "Invalid Date Format."
            },
            txt_floor: {
                required    : "Floor is Required.",
            },
            txt_area: {
                required: "Area is Required."
            },
            txt_status: {
                required: "Status is Required."
            }
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.col-sm-10').append(error);
        },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }, 
        submitHandler: function(form) {
      
            var formData = new FormData(form);
            // formData.append("action", frm_action);
            // formData.append("action_id", frm_action_id);

            $.ajax({
                url     : form.action,
                type    : form.method,
                data    : $(form).serialize(),
                dataType: "json",
                beforeSend : function() {
                    $("#btn_changes").addClass("hidden");
                },
                success: function(response) {
                    $("#btn_changes").removeClass("hidden");

                    notifToast(response[0], response[1], response[2], "frm_1", "mdl_1", "tbl_products");  


                },
            });
        
        }
    });


});