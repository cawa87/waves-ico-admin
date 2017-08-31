(function () {

    var wWaves = $('.alert-waves'),
        wInput = wWaves.find('.waves-input');
    // wBtn = wWaves.find('.waves-btn'),
    // wOvwerlay = $('.waves-overlay');

    var wTip = wWaves.find('.waves-tip');


    $('.waves-form').on('submit', function (e) {
        e.preventDefault();

        if (wInput.val()) {

            var formSerialize = $(this).serialize();
            var request = $.ajax({
                    url: Routing.generate('attach_user_address'),
                    type: 'POST',
                    data: formSerialize,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,

                    success:

                        function (data) {
                            console.log(data);
                        }
                })
            ;

        }
    });

})();
//# sourceMappingURL=wave-auth.js.map
