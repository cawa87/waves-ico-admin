(function() {

    var wWaves = $('.alert-waves'),
        wInput = wWaves.find('.waves-input');
        wBtn = wWaves.find('.waves-btn');
        // wOvwerlay = $('.waves-overlay');

    var wTip = wWaves.find('.waves-tip');


    wBtn.on('click', function(e) {
        e.preventDefault();

        var url = Routing.generate('attach_user_address');
        var formSerialize = $('.waves-form').serialize();

        $.post(url, formSerialize, function(response) {
            //your callback here
            console.log(response);
        }, 'JSON');

    });

})();
//# sourceMappingURL=wave-auth.js.map
