let transaction_message = (transaction_type, transaction_title, transaction_message) => {
    let icon = "";

    if(transaction_type == "success") {
        icon = "<i class='icon fas fa-check'></i>";
    }else if(transaction_type == "danger") {
        icon = "<i class='icon fas fa-ban'></i>";
    }else {
        icon = "<i class='icon fas fa-exclamation-triangle'></i>";
    }


    // return `<div class="alert alert-${transaction_type} alert-dismissible">
    //             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //             <h5>${icon} ${transaction_title}!</h5>
    //             ${transaction_message}
    //         </div>`;


    return `<div class="alert alert-${transaction_type} alert-dismissible">
            ${transaction_message}
        </div>`;
}
$('.cls_amnt_default_zero').blur(function(){
    if($(this).val() === '') {
        $(this).val('0');
    }
});

$('.cls_amnt_default_decimal').on('input', function(){
    // Remove non-numeric characters except for '.' and ',' (for decimal and comma)
    $(this).val($(this).val().replace(/[^0-9.,]/g, ''));
    
    // Replace multiple dots with a single dot
    $(this).val($(this).val().replace(/(\..*)\./g, '$1'));
    
    // Format the number with commas while typing
    var value = $(this).val();
    value = value.replace(/,/g, ''); // Remove existing commas
    var parts = value.toString().split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $(this).val(parts.join('.'));
});

let roundToTwoDecimals = (num) => {
    return Math.round(num * 100) / 100;
}

let calculateDivision = () => {
    var numeratorStr = document.getElementById('text_2').value;
    var denominatorStr = document.getElementById('text_3').value;
    
    // Remove commas from the input strings
    var numerator = parseFloat(numeratorStr.replace(/,/g, ''));
    var denominator = parseFloat(denominatorStr.replace(/,/g, ''));
    
    // Check if the input is valid numbers
    if (isNaN(numerator) || isNaN(denominator) || denominator === 0) {
        $(".text_srp").text("SRP / Kg: ₱ 0.00");
        $("#text_4").val("0.00");

        $(".text_profit").text("Profit 10%: ₱ 0.00");
        $("#text_5").val("0.00");
        
        $(".text_profit_round").text("Profit 10% Round: ₱ 0.00");
        $("#text_6").val("0.00");
        
        $(".text_est_perkg").text("Est. per Kg: ₱ 0.00");
        $("#text_7").val("0.00");

        $(".text_actual_srp").text("Actual Srp: ₱ 0.00");
        $("#text_8").val("0.00");

        $(".text_profit_per_kg").text("Profit / Kg: ₱ 0.00");
        $("#text_9").val("0.00");
        

        return;
    }
    
    // Calculate the division
    var result = numerator / denominator;
    
    // Format the result with commas and display it
    var formattedResult = result.toLocaleString(undefined, { maximumFractionDigits: 6 }); // Adjust maximumFractionDigits as needed
    $(".text_srp").text("SRP / Kg: ₱ " + roundToTwoDecimals(formattedResult))
    $("#text_4").val(roundToTwoDecimals(formattedResult));

    var percentwant = $("#text_10").val()+"%";

    var profit10percent =  roundToTwoDecimals(roundToTwoDecimals(formattedResult) * parseFloat(percentwant) / 100);
    $(".text_profit").text(`Profit ${percentwant}: ₱ ` + profit10percent);
    $("#text_5").val(profit10percent);

    $(".text_profit_round").text(`Profit ${percentwant} Round: ₱ ` + Math.ceil(profit10percent).toFixed(2));
    $("#text_6").val(Math.ceil(profit10percent).toFixed(2));


    var est_per_kg =   parseFloat(formattedResult.replace(',', '.'))  + parseFloat(Math.ceil(profit10percent).toFixed(2).replace(',', '.'));


    $(".text_est_perkg").text("Est. per Kg: ₱ " + Number(est_per_kg).toFixed(2));
    $("#text_7").val(Number(est_per_kg).toFixed(2));

    var acutal_srp = est_per_kg ;

    $(".text_actual_srp").text("Actual Srp: ₱ " + Math.round(acutal_srp));
    $("#text_8").val(Math.round(acutal_srp));

    var profit_per_kg =  Math.round(acutal_srp) - roundToTwoDecimals(formattedResult) ;


    $(".text_profit_per_kg").text("Profit / Kg: ₱ " + Number(profit_per_kg.toFixed(2)) );
    $("#text_9").val(Number(profit_per_kg.toFixed(2)));


    // document.getElementById('text_4').innerText = "Result: " + formattedResult;
}


let notifToast = (type, title, message, formclass, modalclass, datatableclass) => {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      if(type == "success") {
        toastr["success"](message, title);
        $(`.${formclass}`).trigger("reset");
        $(`.${modalclass}`).modal("hide");
        $(`.${datatableclass}`).DataTable().ajax.reload(null, false);
      }else if(type == "danger") {
        toastr["error"](message, title);
      }else if(type == "warning") {
        toastr["warning"](message, title);
      }



}
function generateRandomTextAndNumber(length) {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var result = '';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  


// $(".cls_amnt").focusout(function(){
    
//     if($(this).val() === '') {
//         $(this).val('0');
//     }
// });

// var inputAmount = $('.cls_input_amount');

// // Add event listener for input event
// inputAmount.on('input', function() {
//     // Get the current value of the input field
//     var value = $(this).val();

//     // Remove any non-numeric characters except decimal point
//     value = value.replace(/[^\d.]/g, '');

//     // Format the number with commas and two decimal places
//     var parts = value.split('.');
//     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

//     // Concatenate the parts and set the value back to the input field
//     $(this).val(parts.join('.'));
// });

