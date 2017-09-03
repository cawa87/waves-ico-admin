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
            $input.val( parseFloat( $input.val() ) + 1 );
            $input.change();
            return false;
        })

        $minus.on('click', function() {
            $input.val( Math.max( parseFloat($input.val()) - 1 , 0 ));
            $input.change();
            return false;
        })
    };

    calc();


    $('.input-amount').on('input', function() {

        var date = {
            currency: $('.select-currency .currency').text(),
            value: $('.input-amount').val(),
        }

        $.ajax({
            url: Routing.generate('invest_estimation', date),
            success: function(data) {
                console.log(data);
                resultAmount.find('span').text( data.amount );
                resultBonus.find('span').text( data.bonus );
                resultTotal.find('span').text( data.amount + data.bonus );
            }
        });
        
    })

})();






//# sourceMappingURL=calculator.js.map
