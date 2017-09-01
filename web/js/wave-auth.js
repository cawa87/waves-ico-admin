(function() {

    var wWaves = $('.alert-waves'),
        wInput = wWaves.find('.waves-input');
        wBtn = wWaves.find('.waves-btn'),
        wOvwerlay = $('.waves-overlay');

    var wTip = wWaves.find('.waves-tip');

    // Убираем лишние пробелы
    wInput.on('focusout', function() {
        var valueTrim = $(this).val().trim();
        $(this).val(valueTrim);
    });

    // Проверяем и отправляем адрес
    wBtn.on('click', function(e) {
        e.preventDefault();

        if ( wInput.val() ) {

            wTip.removeClass('show');

            var url = Routing.generate('attach_user_address');
            var formSerialize = $('.waves-form').serialize();

            $.post(url, formSerialize, function(response) {

                wInput.parent().fadeOut(600, function() {
                    wWaves.slideUp(800);
                    wOvwerlay.fadeOut(800);
                })

            }, 'JSON');
        }

        else {
            wTip.addClass('show');
        }

    });

})();
//# sourceMappingURL=wave-auth.js.map
