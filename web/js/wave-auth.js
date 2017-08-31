(function() {

    var wWaves = $('.alert-waves'),
        wInput = wWaves.find('.waves-input');
        // wBtn = wWaves.find('.waves-btn'),
        // wOvwerlay = $('.waves-overlay');

    var wTip = wWaves.find('.waves-tip');


    $('.waves-form').on('submit', function(e) {
        e.preventDefault();

        if ( wInput.val() ) {

            var request = $.ajax({
                url: Routing.generate('attach_user_address'),
                type: 'POST',
                data: {'address': wInput.val()},

                success: function(data) {
                    console.log(data);
                }
            });

        }
    });

})();
//# sourceMappingURL=wave-auth.js.map
