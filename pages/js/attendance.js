$(function() {

    
    $(".nav-link-attendance").addClass("active");

    var tbl_1 = "";
    
    var table = $('#tbl_1').DataTable( {
            
        'ajax': {
            'method' : 'POST',
            'url'    :'attendance_act.php',
            'data'   : {
                            tbl_1
                        },
        },
        "initComplete":function( settings, json){
            $('#cover-spin').hide(0);
        },
        'columns': [
            { data: 'row1'},
            { data: 'row2'},
            { data: 'row3'},

        ],
        'order'  :   [[ 0, 'desc']],
    });
   




});

