$(document).ready(function () {
    $("button").click(function() {        
        if ($(this).hasClass("clear")) {
            $("#value_one").val("");
            $("#value_two").val("");
            $("#operand").val("");
            $("#to_calculate").val("");
            $("#calculation").val("");    

            $('.operand').each(function() {
                $(this).prop("disabled", true);
            });
    
            $('.clear').each(function() {
                $(this).prop("disabled", true);
            });

            $('.result').each(function() {
                $(this).prop("disabled", true);
            });
        }

        valueOne = $("#value_one").val();
        valueTwo = $("#value_two").val();
        valueOperand = $("#operand").val();

        if ($(this).hasClass("operand")) {
            $("#operand").val($(this).val());
        }

        if ($(this).hasClass("value")) {
            $('.clear').each(function() {
                $(this).prop("disabled", false);
            });

            if (valueOperand == "") {
                $('.operand').each(function() {
                    $(this).prop("disabled", false);
                });
    
                $("#value_one").val(valueOne+this.value);
            } else {
                $('.operand').each(function() {
                    $(this).prop("disabled", true);
                });
    
                $("#value_two").val(valueTwo+this.value);
                $('.result').each(function() {
                    $(this).prop("disabled", false);
                });
            }
        }

        if (!$(this).hasClass("clear")) {
            valueOrig = $("#to_calculate").val();
            valueDisplay = $(this).val();

            if ($(this).hasClass("operand")) {
                valueDisplay = $(this).html();
            }

            $("#to_calculate").val(valueOrig+valueDisplay);
            $("#calculation").val($("#to_calculate").val());    
        }
    });
});