$("#operand").click(function() {

    $('#calculator').validate({

        rules: {

            num1: {
                required: true,
                number: true

            },
            num2: {
                required: true,
                number: true


            }

        },
        messages: {

            num1: {
                required: 'Please enter a Value'

            },
            num2: {
                required: 'Please enter a Value'
            }

        },

        submitHandler: function(form) {
          alert('Test');

            var formdata = $('#calculator').serialize();
            $.ajax({

                url: _base_url + 'calculation/Calculator',
                type: 'post',
                data: formdata,
                success: function(data) {
                    if (typeof data.error !== 'undefined' && data.error) {
                        $('#error').html(data.error);
                        $('#result').val('');
                    } else {
                        $('#result').val(data.result);
                        $('#error').html('');

                    }
                    display_calculation();

                }
            });




        }



    });



});

function display_calculation() {
    $.getJSON(
      _base_url + 'calculation/DisplayData',
        function(data) {
            $("#display_result table tbody").html('');
            $.each(data, function(key, value) {
                var displayHtml = '<tr class="text-center"><td class="data_id">' + value.data_id + '</td><td class="quantity_1">' + value.num1 + '</td><td class="quantity_2">' + value.num2 + '</td><td class="operation">' + value.operator + '</td><td class="output">' + value.result + '</td></tr>';
                $("#display_result table tbody").append(displayHtml);
            });


        }
    );
}
