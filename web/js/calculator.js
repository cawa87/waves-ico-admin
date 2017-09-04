'use strict';


(function() {

    var $itemCurrency = $('.drop-menu-currency .curr-item');

    var resultAmount = $('.result-list .result'),
        resultBonus = $('.result-list .bonus'),
        resultTotal = $('.result-list .total-result');

    $itemCurrency.on('click', function() {
        $('.select-currency .currency').text( $(this).text() );
        $(this).parent()
               .removeClass('active');
    });



    function calc() {
        var $input = $('.input-amount'),
            $plus = $('.action-amount .plus'),
            $minus = $('.action-amount .minus');

        $plus.on('click', function() {

            if ( !($input.val()) ) { $input.val('0') }

            $input.val( parseFloat( $input.val() ) + 1 );
            $input.change();

            $('.input-amount').trigger('input');
            return false;
        })

        $minus.on('click', function() {
            $input.val( Math.max( parseFloat($input.val()) - 1 , 0 ));
            $input.change();

            $('.input-amount').trigger('input');
            return false;
        })
    };

    calc();


    $('.input-amount').on('input', function() {

        var preg = $(this).val().replace(/[^.\d]+/g,"").replace( /^([^\.]*\.)|\./g, '$1' );
        var date = {};

        $(this).val(preg);

        date = {
            currency: $('.select-currency .currency').text(),
            value: $('.input-amount').val(),
        }

        if ( $(this).val() ) {

            $.ajax({
                url: Routing.generate('invest_estimation', date),
                success: function(data) {
                    console.log(data);
                    resultAmount.find('span').text( data.amount );
                    resultBonus.find('span').text( data.bonus );
                    resultTotal.find('span').text( data.amount + data.bonus );
                }
            });
        }
    });

})();






//# sourceMappingURL=calculator.js.map
