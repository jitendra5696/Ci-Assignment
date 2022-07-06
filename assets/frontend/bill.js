$("#bill_calculate").click(function(){

    $('#electricity_bill').validate({

        rules:{

            units:{
                required: true,
                number:true
            }

        },
        messages:{

            units:{
                required: 'Please enter Units'

            }

        },
         submitHandler:function(form){

             var details = $('#electricity_bill').serialize();

             $.ajax({
                 url:_base_url + 'Bill/Bill_Generate',
                 type:'POST',
                 data:details,
                  success:function(data){
                   //console.log(data.error);
                     if(typeof data.error !== 'undefined' && data.error ) {
                         $('#error').html(data.error);
                         $('#total_bill').val('');
                    }else{
                        $('#total_bill').val(data.bill);
                        $('#error').html('');
                    }
                     display_bill();
             }

             });
          }

    });

});

function display_bill(){
    $.getJSON(
        _base_url + 'Bill/DisplayData',
        function(data){
            $("#display_result table tbody").html('');
            $.each(data, function(key,value){
                var displayHtml = '<tr><td>'+value.bill_id+'</td><td>'+value.units+'</td><td>'+value.bill+'</td></tr>';
                $("#display_result table tbody").append(displayHtml);
              });

        }
);
}
