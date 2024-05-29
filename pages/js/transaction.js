$(function() {
    $(".nav-link-transaction").addClass("active");
    let view_transaction = "";

    
    
    $(document).on("click",".cls_decre", function(e) {
        e.preventDefault();
        let transactionid = $(this).data("transactionid");
        var value = parseInt($(`#txt_quantity${transactionid}`).val());

        if(value <= 1) {
            alert("unable to decrease quantity to 0");
        }else {
            $(`#txt_quantity${transactionid}`).val(value - 1);
            let incredecree = value - 1
            let product_id = "";


            $.ajax({
                url : "transaction_act.php",
                method : "post",
                dataType : "json",
                data : {
                    view_transaction, product_id, incredecree, transactionid
                },
                success : function(response) {
                    $(".result_transaction").html(response);
                    $("#text_products").val("").trigger('change');
                }
            
            });
        }
    });

    $(document).on("click",".cls_incre", function(e) {
        e.preventDefault();

    
        let transactionid = $(this).data("transactionid");
        var value = parseInt($(`#txt_quantity${transactionid}`).val());

        $(`#txt_quantity${transactionid}`).val(value + 1);
        let incredecree = value + 1

        let product_id = "";

        $.ajax({
            url : "transaction_act.php",
            method : "post",
            dataType : "json",
            data : {
                view_transaction, product_id, incredecree, transactionid
            },
            success : function(response) {
                $(".result_transaction").html(response);
                $("#text_products").val("").trigger('change');
    
            }
        
        });
     
    });

    $(document).on("click",".btnDelete", function() {
        let delete_item = "";
        let trans_id = $(this).data("id");
        let incredecree ="";
        let transactionid = "";
        $.ajax({
            url : "transaction_act.php",
            method : "post",
            dataType : "json",
            data : {
                delete_item, trans_id
            },
            success : function (response) {

                let product_id = "";
                $.ajax({
                    url : "transaction_act.php",
                    method : "post",
                    dataType : "json",
                    data : {
                        view_transaction, product_id, incredecree, transactionid
                    },
                    success : function(response) {
                        $(".result_transaction").html(response);
                        $("#text_products").val("").trigger('change');
                    }
                
                });
            }

        });
    });

    $("#text_products").select2({
        ajax: {
            url: "transaction_act.php",
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'product_search'
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };

             
            }
        },
        cache: true,
        placeholder: 'Search for product',
        // minimumInputLength: 1
    });


    $('#text_products').on('change', function() {
        let product_id = this.value;
        let incredecree = "";
        let transactionid = "";
        $.ajax({
            url : "transaction_act.php",
            method : "post",
            dataType : "json",
            data : {
                view_transaction, product_id, incredecree, transactionid
            },
            success : function(response) {
                $(".result_transaction").html(response);
                $("#div_amount_received").removeClass("d-none");
            }
        });
    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });


    var inputEnter = document.getElementById("txt_amount_received");
    inputEnter.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            var txt_amount_received = $("#txt_amount_received").val();
            var total =  $("#hden_total").val();
            var subtotal = parseFloat(txt_amount_received) - parseFloat(total);
            var formattedAmount = subtotal.toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP' // Philippine Peso
            });
            if(txt_amount_received == "") {
                notifToast("danger", "Amount recieved is Required", "Please Enter Amount Received.", "none", "none", "none");
            }else {
                if(txt_amount_received <= 0) {
                    notifToast("danger", "Invalid Amount", "Amount should be greater than 0", "none", "none", "none"); 
                }else {
    
                    $("#text_changes").val(subtotal);
                    $(".div_changes").html(`<h3>Changes: ${formattedAmount}</h3>`);
                    $("#btnTransact").removeClass("d-none");
    
                }
    
            }
        }
    });


    $(document).on("click","#btnEnter", function() {
        var txt_amount_received = $("#txt_amount_received").val();
        var total =  $("#hden_total").val();
        var subtotal = parseFloat(txt_amount_received) - parseFloat(total);
        var formattedAmount = subtotal.toLocaleString('en-PH', {
            style: 'currency',
            currency: 'PHP' // Philippine Peso
        });

        if(txt_amount_received == "") {
            notifToast("danger", "Amount recieved is Required", "Please Enter Amount Received.", "none", "none", "none");
        }else {
            if(txt_amount_received <= 0) {
                notifToast("danger", "Invalid Amount", "Amount should be greater than 0","none", "none", "none"); 
            }else {

                $("#text_changes").val(subtotal);
                $(".div_changes").html(`<h3>Changes: ${formattedAmount}</h3>`);
                $("#btnTransact").removeClass("d-none");

            }

        }
 


   
    });

    $(document).on("click","#btnTransact", function() {
        $("#btnEnter").trigger("click");
        let transact = "";
        let changes = $("#text_changes").val();
       
        if(changes <0) {
            notifToast("danger", "Insufficient Amount Recieved", "Unable to proceed Transaction.","none", "none", "none"); 
        }else {
            $.ajax({
                url : "transaction_act.php",
                method : "post",
                dataType : "json",
                data : {
                    transact
                },
                success : function (response) {
                    notifToast(response[0], response[1], response[2],"none", "none", "none"); 

                    if(response[0] =="success") {
                        $("#btnTransact").remove();
                        setTimeout(function(){ location.reload(); }, 2000);
                    }
                }

            });
      
        }

    });
    

    cleartmp();








    var frm_action = "";
    var frm_action_id= "";
    var tbl_products = "";

















































    
    $(document).on("click","#btn_create", function() {
        frm_action = "add";
        frm_action_id = "";
        $("#mdl_1").modal("show");
    });

    $('#mdl_1').on('shown.bs.modal', function () {
        $('#text_1').focus();
    });

    $("#text_2, #text_3, #text_10").blur(function() {
        calculateDivision();
    });


    // var table = $('#tbl_products').DataTable( {
            
    //     'ajax': {
    //         'method' : 'POST',
    //         'url'    :'products_act.php',
    //         'data'   : {
    //                         tbl_products
    //                     },
    //     },
    //     "initComplete":function( settings, json){
    //         $('#cover-spin').hide(0);
    //     },
    //     'columns': [
    //         { data: 'row1', visible :false},
    //         { data: 'row2'},
    //         { data: 'row3', render: function(data, type, row) {
           
    //                 if(data === null) {
    //                     return `<img src='../images/products/no_image_available.jpg' style='max-width:50px; max-height:50px;'>`;
    //                 }else {
    //                     return `<img src="../images/products/${data}" style="max-width:50px; max-height:50px;" onerror="this.onerror=null;this.src='../images/products/no_image_available.jpg'">`;
                    
    //                 }
    //             }
    //         },
    //         { data: 'row4', "className": "color-ffffcc"},
    //         { data: 'row5', "className": "color-ffffcc"},
    //         { data: 'row6', "className": "color-ffffcc"},
    //         { data: 'row12', "className": "color-e2efda"},
    //         { data: 'row7', "className": "color-e2efda", visible :false },
    //         { data: 'row8', "className": "color-e2efda" },
    //         { data: 'row9', "className": "color-e2efda" },
    //         { data: 'row10', "className": "color-fff2cc"  },
    //         { data: 'row11' },

    //         { data: 'row1', render: function(data, type, row) {

             
    //                 return `<a href='products_details.php?${generateRandomTextAndNumber(70)}=${generateRandomTextAndNumber(70)}&&UETKyt5GSVBygekTdctU958msmYMl1=${data}&&${generateRandomTextAndNumber(30)}=${generateRandomTextAndNumber(25)} ' class='btn btn-primary'>View Product</a>`
                
    //             }
    //         },


    //     ],
    //     'order'  :   [[ 0, 'desc']],
    // });
    // $('#tbl_products tbody').on( 'click', '.edit_btn', function () {
    //     $('#cover-spin').show(0);
  
    //     $('#cover-spin').hide(0);
    // } );


    $('form#frm_1').validate({
        rules: {
            text_1: {
                required: true,
            },
            text_10  :{
                required: true,
            }
        },
        messages: {
            text_1: {
                required    : "Please Enter Item Name",
            },
            text_10: {
                required    : "Please Enter Profit Percentage",
            },
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }, 
        submitHandler: function(form) {
            var formData = new FormData(form);
            formData.append("action", frm_action);
            formData.append("action_id", frm_action_id);
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

                    notifToast(response[0], response[1], response[2],"none", "mdl_1", "tbl_products");  
                },
            });
        
        }
    });
})

let cleartmp = () => {
    let clearTransaction = "";
    $.ajax({
        url : "transaction_act.php",
        method : "post",
        dataType : "json",
        data : {    
            clearTransaction
        }

    });

}