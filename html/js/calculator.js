'use strict';


(function() {

    var $itemCurrency = $('.drop-menu-currency .curr-item');

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

})();






//# sourceMappingURL=calculator.js.map
